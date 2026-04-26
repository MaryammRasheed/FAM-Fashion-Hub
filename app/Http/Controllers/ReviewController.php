<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating'     => 'required|integer|between:1,5',
            'comment'    => 'nullable|string|max:1000',
        ]);

        // One review per user per product
        Review::updateOrCreate(
            ['user_id' => auth()->id(), 'product_id' => $request->product_id],
            ['rating'  => $request->rating, 'comment' => $request->comment]
        );

        return redirect()->back()->with('success', 'Review submitted!');
    }

    public function update(Request $request, $id)
    {
        $review = Review::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $review->update($request->only(['rating', 'comment']));
        return redirect()->back()->with('success', 'Review updated!');
    }

    public function destroy($id)
    {
        Review::where('id', $id)->where('user_id', auth()->id())->delete();
        return redirect()->back()->with('success', 'Review deleted!');
    }
}
