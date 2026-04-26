<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $wishlists = Wishlist::with('product')
            ->where('user_id', auth()->id())
            ->get();
        return view('user.wishlist', compact('wishlists'));
    }

    public function add($productId)
    {
        $exists = Wishlist::where('user_id', auth()->id())
            ->where('product_id', $productId)
            ->first();

        if (!$exists) {
            Wishlist::create([
                'user_id'    => auth()->id(),
                'product_id' => $productId,
            ]);
        }

        return redirect()->back()->with('success', 'Added to wishlist!');
    }

    public function remove($id)
    {
        Wishlist::where('id', $id)
            ->where('user_id', auth()->id())
            ->delete();

        return redirect()->back()->with('success', 'Removed from wishlist!');
    }
}
