<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * View Admin Dashboard
     */
    public function admin_dashboard(){

        $data['account_balance'] = Auth::user()->account_balance;
        $data['merchant'] = User::where('role', 'merchant')->count();
        $data['product'] = Product::count();
        $data['order'] = Order::count();
        $data['transaction'] = Transaction::count();
        $data['fee'] = Transaction::where('type', 'SHOP_FEE')->count();

        return view('admin.dashboard', ['data' => $data]);
    }

    /**
     * Merchant Dashboard
     */
    public function merchant_dashboard(){

        $shop = Auth::user();
        $data['product'] = Product::where('user_id', $shop->id)->count();
        $data['order'] = Order::where('user_id', $shop->id)->count();

        return view('merchant.dashboard', ['shop' => $shop, 'data' => $data]);
    }
}
