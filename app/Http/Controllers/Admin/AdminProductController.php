<?php
// app/Http/Controllers/Admin/AdminProductController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(15);
        $categories = Category::all();
        return view('admin.products.index', compact('products', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'sale_price'  => 'nullable|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'category_id' => 'nullable|exists:categories,id',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $file     = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/products'), $filename);
            $imagePath = 'images/products/' . $filename;
        }

        Product::create([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name) . '-' . time(),
            'description' => $request->description,
            'price'       => $request->price,
            'sale_price'  => $request->sale_price ?: null,
            'stock'       => $request->stock,
            'category_id' => $request->category_id,
            'images'      => $imagePath ? [$imagePath] : [],
            'status'      => 'pending',
        ]);

        return redirect()->route('admin.products')
                         ->with('success', 'Product added successfully!');
    }

    public function edit($id)
    {
        $product    = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'sale_price'  => 'nullable|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'category_id' => 'nullable|exists:categories,id',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $images = $product->images ?? [];

        if ($request->hasFile('image')) {
            // Delete old image
            if (!empty($images) && file_exists(public_path($images[0]))) {
                unlink(public_path($images[0]));
            }
            $file     = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/products'), $filename);
            $images = ['images/products/' . $filename];
        }

        $product->update([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name) . '-' . $product->id,
            'description' => $request->description,
            'price'       => $request->price,
            'sale_price'  => $request->sale_price ?: null,
            'stock'       => $request->stock,
            'category_id' => $request->category_id,
            'images'      => $images,
        ]);

        return redirect()->route('admin.products')
                         ->with('success', 'Product updated successfully!');
    }

    public function approve($id)
    {
        Product::findOrFail($id)->update(['status' => 'active']);
        return back()->with('success', 'Product approved successfully!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->images && count($product->images) > 0
            && file_exists(public_path($product->images[0]))) {
            unlink(public_path($product->images[0]));
        }
        $product->delete();
        return back()->with('success', 'Product deleted successfully!');
    }
}