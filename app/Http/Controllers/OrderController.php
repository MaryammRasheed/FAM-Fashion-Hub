<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Invoice;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkout()
    {
        $cartCtrl = new CartController();
        $cart     = $cartCtrl->getCart();

        if ($cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        return view('checkout.index', compact('cart'));
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required|string',
            'phone'            => 'required|string',
            'payment_method'   => 'required|in:cod,card',
        ]);

        $cartCtrl = new CartController();
        $cart     = $cartCtrl->getCart();

        if ($cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        $order = Order::create([
            'user_id'          => auth()->id(),
            'order_number'     => 'ORD-' . strtoupper(uniqid()),
            'total_amount'     => $cart->total,
            'shipping_address' => $request->shipping_address,
            'phone'            => $request->phone,
            'city'             => $request->city ?? '',
            'payment_method'   => $request->payment_method,
            'payment_status'   => 'pending',
            'status'           => 'pending',
            'notes'            => $request->notes,
        ]);

        foreach ($cart->items as $item) {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $item->product_id,
                'quantity'   => $item->quantity,
                'price'      => $item->price,
            ]);

            if ($item->product) {
                $item->product->decrement('stock', $item->quantity);
            }
        }

        Invoice::create([
            'order_id'       => $order->id,
            'invoice_number' => 'INV-' . $order->id . time(),
            'amount'         => $order->total_amount,
            'status'         => 'unpaid',
        ]);

        $cart->items()->delete();

        return redirect()->route('orders.confirm', $order->id)
            ->with('success', 'Order placed successfully!');
    }

    public function confirm($id)
    {
        $order = Order::with('items.product')->findOrFail($id);

        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        return view('orders.confirm', compact('order'));
    }

    public function history()
    {
        $orders = Order::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('orders.history', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with(['items.product', 'invoice'])->findOrFail($id);

        if ($order->user_id !== auth()->id() && auth()->user()->role !== 'admin') {
            abort(403);
        }

        return view('orders.show', compact('order'));
    }

    public function cancel($id)
    {
        $order = Order::findOrFail($id);

        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        if (!in_array($order->status, ['pending', 'processing'])) {
            return redirect()->back()->with('error', 'This order cannot be cancelled.');
        }

        $order->update(['status' => 'cancelled']);

        foreach ($order->items as $item) {
            if ($item->product) {
                $item->product->increment('stock', $item->quantity);
            }
        }

        return redirect()->back()->with('success', 'Order cancelled!');
    }
}
