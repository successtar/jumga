<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    //

    /**
     * See All Merchants
     */

    public function merchant(){

        $merchants = User::where('role', 'merchant')->orderBy('created_at', 'DESC')->paginate(8);

        return view('admin.merchant', ['merchants' => $merchants]);
     }
}
