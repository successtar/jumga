<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //
    public function order(){

        $shop = Auth::user();
        $orders = Order::where('user_id', $shop->id)
                            ->orderByDesc('created_at')
                            ->paginate(8);

        return view('merchant.order', ['shop' => $shop, 'orders' => $orders]);
    }
}
