<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    //

    /**
     * Delete Merchant Products
     */
    public function delete(Request $req){

        $req->validate([
            'id' => 'required|size:36',
            ]);

        Product::where('id', $req->input('id'))->delete();
        return redirect()->route('merchant.product')->with('message', 'Product Deleted Successfully');
    }

    /**
     * Create Merchant Products
     */
    public function create(Request $req){

        $req->validate([
            'name' => 'required|min:4|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric|integer',
            'description' => 'required|min:20|max:255',
            'image' => 'required|mimes:jpg,png,jpeg|max:2048'
            ]);

        $path = '/file/'.$req->file('image')->store('product_image', ['disk' => 'public']);

        $prod = new Product;
        $prod->id = Str::uuid();
        $prod->name = $req->input('name');
        $prod->description = $req->input('description');
        $prod->currency = 'USD';
        $prod->price = $req->input('price');
        $prod->unit = $req->input('quantity');
        $prod->available = $req->input('quantity');
        $prod->image_path = $path;
        $prod->user_id = Auth::user()->id;
        $prod->save();

        return redirect()->route('merchant.product')->with('message', 'Product Added Successfully');
    }

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