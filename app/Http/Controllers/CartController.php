<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = $this->getCart();
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);
        $cart    = $this->getCart();

        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            CartItem::create([
                'cart_id'    => $cart->id,
                'product_id' => $product->id,
                'quantity'   => $request->quantity,
                'price'      => $product->sale_price ?? $product->price,
            ]);
        }

        $cart = $cart->fresh()->load('items.product');

        if ($request->ajax()) {
            return response()->json([
                'success'    => true,
                'message'    => 'Product added to cart!',
                'cart_count' => $cart->count,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function update(Request $request, $id)
    {
        $cartItem = CartItem::findOrFail($id);
        $cartItem->quantity = max(1, (int) $request->quantity);
        $cartItem->save();

        $cart = $this->getCart();

        if ($request->ajax()) {
            return response()->json([
                'success'    => true,
                'total'      => round($cart->total, 2),
                'subtotal'   => round($cartItem->subtotal, 2),
                'cart_count' => $cart->count,
            ]);
        }

        return redirect()->back();
    }

    public function remove($id)
    {
        CartItem::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Item removed from cart!');
    }

    public function clear()
    {
        $cart = $this->getCart();
        $cart->items()->delete();
        return redirect()->back()->with('success', 'Cart cleared!');
    }

    public function getCartCount()
    {
        $cart = $this->getCart();
        return response()->json(['count' => $cart->count]);
    }

    // PUBLIC so OrderController can call it
    public function getCart()
    {
        if (auth()->check()) {
            $cart = Cart::firstOrCreate(['user_id' => auth()->id()]);
        } else {
            $cart = Cart::firstOrCreate(['session_id' => session()->getId()]);
        }
        return $cart->load('items.product');
    }
}
