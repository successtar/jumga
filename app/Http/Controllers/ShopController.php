<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

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
            $product = Product::where("product_id", $item['id'])->where('available', '>=', $item['unit'])->first();
            if ($product === null){
                return $item['name'].' Not Available';
            }
        }

        return null;
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


        return response()->json(['status' => 'error', 'message' => 'problem']);
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

    public function update(Request $req){

        $req->validate([
            'file' => 'required|mimes:jpg|max:2048'
            ]);

        // dd($req);

        $path = $req->file('product_image')->store('product_image', ['disk' => 'public']);

        return $path;

    }
}
