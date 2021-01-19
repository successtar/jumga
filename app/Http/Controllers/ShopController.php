<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShopController extends Controller
{

    private $shop;

    /**
     * Get Shop Model (User)
     *
     * @param string $slug
     * @return $shop
     */
    private static function get_shop($slug){

        $shop = User::where('slug', $slug)->first();

        if (!$shop){
            abort(404); // Shop not found
        }

        return $shop;
    }

    /**
     * Check User Selected Items for existence
     *
     * @return string message
     */
    private static function check_items($items){


        if ($items == null || !is_array($items) || count($items) === 0){
            return "Order Items not found";
        }

        foreach($items as $item){
            $product = Product::where("id", $item['id'])->where('available', '>=', $item['unit'])->first();
            if ($product === null){
                return $item['name'].' Not Available';
            }
        }

        if (self::total_cost($items) > 1000){
            return 'Sorry, The maximum order you can make at a time is $1000';
        }

        return null;
    }

    /**
     * Sum payment
     *
     * @return number amount with dispatch inclusive
     */
    private static function total_cost($items){

        $total = array_reduce($items, function($acc, $val){
                        return $acc + ($val['price'] * $val['unit']);
                    }, 20); // $20 for dispatch

        return $total;
    }

    /**
     * Show user selected product list
     *
     * @param string $slug
     */
    public function cart($slug){

        $shop = $this::get_shop($slug);

        return view('shop.cart', ['shop' => $shop]);
    }

    /**
     * Show user Checkout
     *
     * @param string $slug
     */
    public function checkout(Request $req, $slug){

        $shop = $this::get_shop($slug);

        $items = $req->input('items');

        $message = $this::check_items($items);
        if ($message !== null){
            return redirect()->route('cart', ['slug' => $shop->slug])->with('message', $message);
        }

        return view('shop.checkout', ['shop' => $shop]);
    }

    /**
     * Place an Order
     *
     * @param string $slug
     */
    public function order(Request $req, $slug){

        $shop = $this::get_shop($slug);

        $req->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:255',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'country' => 'required|max:255',
            'state' => 'required|max:255',
            'zip' => 'max:255',
            '_token' => 'required|max:255'
        ]);

        $message = $this::check_items($req->input('items'));
        if ($message !== null){
            return response()->json(['status' => 'error', 'message' => $message]);
        }

        /* Add Record to transaction Table */

        $data = $req->all();
        $tranx = new Transaction;
        $tranx->id = Str::uuid();
        $tranx->amount = $this::total_cost($data['items']);
        $tranx->gateway_ref =  Str::uuid();
        $tranx->user_id = $shop->id;
        $tranx->category = 'INCOMING';
        $tranx->type = 'ORDER';
        $tranx->meta = json_encode($data);
        $tranx->email = $data['email'];
        $tranx->save();

        $data['gatewayRef'] = $tranx->gateway_ref;
        $data['amount'] = $tranx->amount;
        $data['currency'] = 'USD';
        $data['shop'] = $shop->shop_name;
        $data['description'] = $shop->shop_description;
        $data['publicKey'] = env('FW_PUBKEY');

        return response()->json(['status' => 'success', 'message' => 'Transaction created', 'data' => $data]);
    }

    /**
     * Activate Shop
     */
    public function activate($slug){

        $shop = $this::get_shop($slug);

        // Prevent Duplicate Payment
        if ($shop->status != 'PENDING'){
            return response()->json(['status' => 'error', 'message' => 'Account Already Activated']);
        }

        $tranx = new Transaction;
        $tranx->id = Str::uuid();
        $tranx->amount = env('J_ACTIVATION');
        $tranx->gateway_ref =  Str::uuid();
        $tranx->user_id = $shop->id;
        $tranx->category = 'INCOMING';
        $tranx->type = 'SHOP_FEE';
        $tranx->email = $shop->email;
        $tranx->save();

        $data['gatewayRef'] = $tranx->gateway_ref;
        $data['amount'] = $tranx->amount;
        $data['currency'] = 'USD';
        $data['first_name'] = $shop->last_name;
        $data['last_name'] = $shop->first_name;
        $data['phone'] = $shop->phone;
        $data['email'] = $shop->email;
        $data['country'] = $shop->country;
        $data['description'] = $shop->shop_description;
        $data['publicKey'] = env('FW_PUBKEY');

        return response()->json(['status' => 'success', 'message' => 'Transaction created', 'data' => $data]);

    }

    public function index($slug)
    {

        $shop = $this::get_shop($slug);
        $products = Product::where('user_id', $shop->id)
                            ->where('available', '>', 0)
                            ->orderByDesc('created_at')
                            ->paginate(9);



        return view('shop.home', ['shop' => $shop, 'products' => $products]);

    }
}
