<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Get Merchant Orders
     */
    public function merchant_order(){

        $shop = Auth::user();
        $orders = Order::where('user_id', $shop->id)
                        ->orderByDesc('created_at')
                        ->paginate(8);

        return view('merchant.order', ['shop' => $shop, 'orders' => $orders]);
    }

    /**
     * Admin Viewing all Orders
     */
    public function admin_order(){

        $orders = Order::orderByDesc('created_at')
                        ->paginate(8);

        return view('admin.order', ['orders' => $orders]);
    }
}
