<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect('/login')->with('error', 'Pehle login karein.');
        }

        if (auth()->user()->role !== 'admin') {
            return redirect('/')->with('error', 'Sirf admin access kar sakta hai.');
        }

        return $next($request);
    }
}
