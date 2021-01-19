<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        // $this->middleware('auth');
    }

    /**
     * Show the application Homepage.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $shops = User::where('role', 'merchant')
                        ->where('status', 'ACTIVE')
                        ->inRandomOrder()
                        ->limit(5)
                        ->get();


        $features = Product::where('available', '>', 0)
                        ->inRandomOrder()
                        ->limit(10)
                        ->get();

        $recents = Product::where('available', '>', 0)
                            ->orderBy('created_at')
                            ->limit(10)
                            ->get();


        return view('home', ['shops' => $shops, 'recents' => $recents, 'features' => $features]);
    }
}
