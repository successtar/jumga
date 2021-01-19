<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * View Admin Dashboard
     */
    public function admin_dashboard(){
        return view('admin.dashboard');
    }

    /**
     * Merchant Dashboard
     */
    public function merchant_dashboard(){

        $shop = Auth::user();

        return view('merchant.dashboard', ['shop' => $shop]);
    }
}
