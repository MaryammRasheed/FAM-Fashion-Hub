<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderItem;

class VendorController extends Controller
{
    private function getVendor()
    {
        $vendor = auth()->user()->vendor;
        if (!$vendor) {
            abort(403, 'Vendor profile not found. Please contact admin.');
        }
        return $vendor;
    }

    public function dashboard()
    {
        $vendor        = $this->getVendor();
        $productsCount = Product::where('vendor_id', $vendor->id)->count();

        $ordersCount = OrderItem::whereHas('product', function ($q) use ($vendor) {
            $q->where('vendor_id', $vendor->id);
        })->count();

        $revenue = OrderItem::whereHas('product', function ($q) use ($vendor) {
            $q->where('vendor_id', $vendor->id);
        })->sum(DB::raw('quantity * price'));

        $lowStockProducts = Product::where('vendor_id', $vendor->id)
            ->where('stock', '<', 10)->count();

        $recentOrders = OrderItem::with(['order.user', 'product'])
            ->whereHas('product', function ($q) use ($vendor) {
                $q->where('vendor_id', $vendor->id);
            })->latest()->limit(10)->get();

        return view('vendor.dashboard', compact(
            'productsCount', 'ordersCount', 'revenue', 'lowStockProducts', 'recentOrders'
        ));
    }

    public function products()
    {
        $vendor   = $this->getVendor();
        $products = Product::where('vendor_id', $vendor->id)->with('category')->latest()->paginate(15);
        return view('vendor.products.index', compact('products'));
    }

    public function createProduct()
    {
        $categories = Category::where('is_active', true)->get();
        return view('vendor.products.create', compact('categories'));
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'description' => 'required|string',
        ]);

        $vendor = $this->getVendor();

        $imagesText = $request->images_text ?? '';
        $images     = array_values(array_filter(array_map('trim', explode("\n", $imagesText))));
        $sizes      = $request->sizes  ? array_values(array_filter(array_map('trim', explode(',', $request->sizes))))  : [];
        $colors     = $request->colors ? array_values(array_filter(array_map('trim', explode(',', $request->colors)))) : [];

        Product::create([
            'vendor_id'   => $vendor->id,
            'category_id' => $request->category_id,
            'name'        => $request->name,
            'slug'        => \Illuminate\Support\Str::slug($request->name) . '-' . uniqid(),
            'description' => $request->description,
            'price'       => $request->price,
            'sale_price'  => $request->sale_price ?: null,
            'sku'         => $request->sku ?: 'SKU-' . strtoupper(uniqid()),
            'stock'       => $request->stock,
            'images'      => $images,
            'sizes'       => $sizes,
            'colors'      => $colors,
            'status'      => 'pending',
        ]);

        return redirect()->route('vendor.products')->with('success', 'Product added! Admin approval pending.');
    }

    public function editProduct($id)
    {
        $vendor     = $this->getVendor();
        $product    = Product::where('vendor_id', $vendor->id)->findOrFail($id);
        $categories = Category::where('is_active', true)->get();
        return view('vendor.products.edit', compact('product', 'categories'));
    }

    public function updateProduct(Request $request, $id)
    {
        $vendor  = $this->getVendor();
        $product = Product::where('vendor_id', $vendor->id)->findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
        ]);

        $product->update([
            'name'        => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'price'       => $request->price,
            'sale_price'  => $request->sale_price ?: null,
            'stock'       => $request->stock,
            'status'      => $request->status ?? $product->status,
        ]);

        return redirect()->route('vendor.products')->with('success', 'Product updated!');
    }

    public function deleteProduct($id)
    {
        $vendor = $this->getVendor();
        Product::where('vendor_id', $vendor->id)->findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Product deleted!');
    }

    public function orders()
    {
        $vendor = $this->getVendor();
        $orders = OrderItem::with(['order.user', 'product'])
            ->whereHas('product', function ($q) use ($vendor) {
                $q->where('vendor_id', $vendor->id);
            })->latest()->paginate(20);
        return view('vendor.orders.index', compact('orders'));
    }

    public function updateOrderStatus(Request $request, $id)
    {
        $orderItem = OrderItem::findOrFail($id);
        if ($orderItem->order) {
            $orderItem->order->update(['status' => $request->status]);
        }
        return redirect()->back()->with('success', 'Order status updated!');
    }

    public function inventory()
    {
        $vendor   = $this->getVendor();
        $products = Product::where('vendor_id', $vendor->id)->orderBy('stock')->get();
        return view('vendor.inventory.index', compact('products'));
    }

    public function updateStock(Request $request, $id)
    {
        $vendor  = $this->getVendor();
        $product = Product::where('vendor_id', $vendor->id)->findOrFail($id);
        $product->update(['stock' => $request->stock]);
        return redirect()->back()->with('success', 'Stock updated!');
    }

    public function profile()
    {
        $vendor = $this->getVendor();
        return view('vendor.profile', compact('vendor'));
    }

    public function updateProfile(Request $request)
    {
        $vendor = $this->getVendor();
        $vendor->update($request->only(['business_name', 'phone', 'address', 'description']));
        return redirect()->back()->with('success', 'Profile updated!');
    }

    public function earnings()
    {
        $vendor = $this->getVendor();
        $monthlyEarnings = OrderItem::whereHas('product', function ($q) use ($vendor) {
            $q->where('vendor_id', $vendor->id);
        })
        ->selectRaw('SUM(quantity * price) as total, MONTH(created_at) as month')
        ->groupBy('month')
        ->orderBy('month')
        ->get();

        return view('vendor.earnings', compact('monthlyEarnings'));
    }
}
