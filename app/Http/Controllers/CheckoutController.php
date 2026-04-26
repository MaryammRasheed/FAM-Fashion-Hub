<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Show checkout page
    public function index()
    {
        $cart = app(CartController::class)->getCart();

        if ($cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        return view('checkout.index', compact('cart'));
    }

    // Process checkout
    public function process(Request $request)
    {
        return app(OrderController::class)->placeOrder($request);
    }
}
