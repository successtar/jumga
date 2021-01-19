<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    //

    /**
     * Webhook Confirmation
     *
     * @param string $slug
     */
    public function webhook(Request $req){

        $res = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer '.env('FW_SECKEY')
        ])->get('https://api.flutterwave.com/v3/transactions/'.$req->input('data.id').'/verify');

        if ($res->ok() && $res->successful()){

            $response = $res->json();
            $data = $response['data'];
            $tranx = Transaction::where('gateway_ref', $data['tx_ref'])->where('status', 'PENDING')->first();
            if ($tranx && $tranx->amount <= $data['amount'] && $tranx->currency <= $data['currency'] && $data['status'] === 'successful'){

                // Update Transaction
                $tranx->status = 'COMPLETED';
                $tranx->log = json_encode($response);
                $tranx->save();

                if ($tranx->type == 'ORDER'){
                    // Fee caculation for Jumga, Merchant and Dispatcher
                    $dispatch = env('J_DISPATCH');
                    $jumga_fee = ($tranx->amount - $dispatch) * (env('J_MERCH_COM')/100);
                    $merchant_fee = ($tranx->amount - $dispatch) - $jumga_fee;
                    $dispatch_fee = $dispatch - ($dispatch * (env('J_DISP_COM')/100));
                    $jumga_total_fee = $jumga_fee + ($dispatch - $dispatch_fee);     // Jumga total income commission from merchant and dispatch

                    User::where('role', 'admin')->increment('account_balance', $jumga_total_fee);
                    $merchant = User::where('id', $tranx->user_id);
                    $merchant->increment('account_balance', $merchant_fee);
                    $merchant->increment('dispatch_balance', $dispatch_fee);

                    $order_data = json_decode($tranx->meta, true);

                    // Update product remaining
                    foreach($order_data['items'] as $item){
                        $prod = Product::where('id', $item['id']);
                        $prod->increment('sold', $item['unit']);
                        $prod->decrement('available', $item['unit']);
                    }

                    // Create Order
                    $order = new Order;
                    $order->id = Str::uuid();
                    $order->first_name = $order_data['first_name'];
                    $order->last_name = $order_data['last_name'];
                    $order->email = $order_data['email'];
                    $order->phone = $order_data['phone'];
                    $order->user_id = $tranx->user_id;
                    $order->transaction_id = $tranx->id;
                    $order->currency = $tranx->currency;
                    $order->amount = $merchant_fee;
                    $order->jumga_fee = $jumga_fee;
                    $order->dispatch = $dispatch;
                    $order->total = $tranx->amount;
                    $order->address = $order_data['address'];
                    $order->city = $order_data['city'];
                    $order->state = $order_data['state'];
                    $order->country = $order_data['country'];
                    $order->zip = $order_data['zip'];
                    $order->items = json_encode($order_data['items']);
                    $order->save();
                }
                elseif ($tranx->type == 'SHOP_FEE'){
                    // Confirm User Shop Fee
                    User::where('role', 'admin')->increment('account_balance', $tranx->amount);
                    User::where('id', $tranx->user_id)->update(['status' => 'ACTIVE']);
                }
            }
        }

        return response()->json(['status' => 'success', 'message' => 'Received Successfully']);
    }

    /**
     * See All Transactions
     */

     public function transaction(){

        $transactions = Transaction::paginate(8);

        return view('admin.transaction', ['transactions' => $transactions]);
     }
}
