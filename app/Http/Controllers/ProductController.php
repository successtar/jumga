<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //

    /**
     * Get Merchant Products
     */
    public function product(){

        $shop = Auth::user();
        $products = Product::where('user_id', $shop->id)
                            ->orderByDesc('created_at')
                            ->paginate(8);

        return view('merchant.product', ['shop' => $shop, 'products' => $products]);

    }
}
