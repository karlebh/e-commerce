<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Darryldecode\Cart\CartCondition\Cart;

class Checkout
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
        if (! \Cart::session('guest')->isEmpty()) {
            return $next($request);
        }
            return redirect()->route('home');
    }
}
