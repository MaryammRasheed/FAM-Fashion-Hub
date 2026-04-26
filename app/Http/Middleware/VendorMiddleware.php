<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VendorMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect('/login')->with('error', 'Pehle login karein.');
        }

        if (auth()->user()->role !== 'vendor') {
            return redirect('/')->with('error', 'Sirf vendor access kar sakta hai.');
        }

        return $next($request);
    }
}
