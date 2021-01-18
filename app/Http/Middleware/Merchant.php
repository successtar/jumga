<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class Merchant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // dd(Auth::user());

        if (Auth::user()->role != 'merchant') {
            return redirect(RouteServiceProvider::HOME);
        }

        if (Auth::user()->status != 'ACTIVE') {
            return redirect(route('activate'));
        }

        return $next($request);
    }
}
