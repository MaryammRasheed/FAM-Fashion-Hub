<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    // Homepage / Product Listing
    public function index(Request $request)
    {
        $query = Product::with(['category'])->where('status', 'active');

        // Filter by category
        if ($request->has('category') && $request->category) {
            $query->whereHas('category', fn($q) => $q->where('slug', $request->category));
        }

        // Filter by price range
        if ($request->has('min_price') && $request->min_price) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->has('max_price') && $request->max_price) {
            $query->where('price', '<=', $request->max_price);
        }

        // Filter by size
        if ($request->has('size') && $request->size) {
            $query->whereJsonContains('sizes', $request->size);
        }

        // Filter by color
        if ($request->has('color') && $request->color) {
            $query->whereJsonContains('colors', $request->color);
        }

        // Search
        if ($request->has('q') && $request->q) {
            $q = $request->q;
            $query->where(fn($sq) => $sq->where('name', 'like', "%$q%")->orWhere('description', 'like', "%$q%"));
        }

        // Sort
        switch ($request->sort) {
            case 'price_asc':  $query->orderBy('price', 'asc'); break;
            case 'price_desc': $query->orderBy('price', 'desc'); break;
            case 'newest':     $query->orderBy('created_at', 'desc'); break;
            default:           $query->orderBy('featured', 'desc')->orderBy('created_at', 'desc');
        }

        $products   = $query->paginate(12)->withQueryString();
        $categories = Category::where('is_active', true)->get();
        $featured   = Product::where('status', 'active')->where('featured', true)->take(4)->get();

        return view('products.index', compact('products', 'categories', 'featured'));
    }

    // Product Detail
    public function show($slug)
    {
        $product  = Product::with(['category'])->where('slug', $slug)->where('status', 'active')->firstOrFail();
        $related  = Product::where('category_id', $product->category_id)
                            ->where('id', '!=', $product->id)
                            ->where('status', 'active')
                            ->take(4)
                            ->get();

        // Parse JSON fields safely
        $images = is_array($product->images) ? $product->images : json_decode($product->images ?? '[]', true);
        $sizes  = is_array($product->sizes)  ? $product->sizes  : json_decode($product->sizes  ?? '[]', true);
        $colors = is_array($product->colors) ? $product->colors : json_decode($product->colors ?? '[]', true);

        return view('products.show', compact('product', 'related', 'images', 'sizes', 'colors'));
    }

    // Search
    public function search(Request $request)
    {
        return $this->index($request);
    }

    // Filter by category slug
    public function filterByCategory($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $products = Product::where('category_id', $category->id)
                            ->where('status', 'active')
                            ->paginate(12);
        $categories = Category::where('is_active', true)->get();

        return view('products.index', compact('products', 'categories', 'category'));
    }
}
