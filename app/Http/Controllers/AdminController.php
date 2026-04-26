<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Vendor;
use App\Models\Category;

class AdminController extends Controller
{
    // ── DASHBOARD ─────────────────────────────────────────────────────────────
    public function dashboard()
    {
        $totalUsers    = User::count();
        $totalProducts = Product::count();
        $totalOrders   = Order::count();
        $totalRevenue  = Order::where('payment_status', 'paid')->sum('total_amount');
        $totalVendors  = Vendor::count();
        $recentOrders  = Order::with('user')->latest()->take(5)->get();
        $recentUsers   = User::latest()->take(5)->get();

        $userGrowth    = 12.4;
        $orderGrowth   = 18.2;
        $revenueGrowth = 22;
        $newProducts   = Product::whereDate('created_at', '>=', now()->subDays(7))->count();

        return view('admin.index', compact(
            'totalUsers', 'totalProducts', 'totalOrders', 'totalRevenue',
            'totalVendors', 'recentOrders', 'recentUsers',
            'userGrowth', 'orderGrowth', 'revenueGrowth', 'newProducts'
        ));
    }

    // ── USERS ─────────────────────────────────────────────────────────────────
    public function users()
    {
        $users = User::latest()->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function userEdit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function userUpdate(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->only(['name', 'email', 'role']));
        return redirect()->route('admin.users')->with('success', 'User updated!');
    }

    public function userDelete($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted!');
    }

    // ── VENDORS ───────────────────────────────────────────────────────────────
    public function vendors()
    {
        $vendors = Vendor::with('user')->latest()->paginate(20);
        return view('admin.vendors.index', compact('vendors'));
    }

    public function vendorApprove($id)
    {
        Vendor::findOrFail($id)->update(['status' => 'approved']);
        return redirect()->back()->with('success', 'Vendor approved!');
    }

    public function vendorReject($id)
    {
        Vendor::findOrFail($id)->update(['status' => 'rejected']);
        return redirect()->back()->with('success', 'Vendor rejected!');
    }

    // ── PRODUCTS ──────────────────────────────────────────────────────────────
    public function products()
    {
        $products = Product::with('category')->latest()->paginate(20);
        $categories = Category::all();
        return view('admin.products.index', compact('products', 'categories'));
    }

    public function productApprove($id)
    {
        Product::findOrFail($id)->update(['status' => 'active']);
        return redirect()->back()->with('success', 'Product approved!');
    }

    public function productDelete($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Product deleted!');
    }

    // ── CATEGORIES ────────────────────────────────────────────────────────────
    public function categories()
    {
        $categories = Category::latest()->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function categoryStore(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        Category::create([
            'name'   => $request->name,
            'slug'   => \Illuminate\Support\Str::slug($request->name),
            'is_active' => 1,
        ]);
        return redirect()->route('admin.categories')->with('success', 'Category created!');
    }

    public function categoryUpdate(Request $request, $id)
    {
        $cat = Category::findOrFail($id);
        $cat->update([
            'name'   => $request->name,
            'slug'   => \Illuminate\Support\Str::slug($request->name),
            'is_active' => $request->is_active ?? $cat->is_active,
        ]);
        return redirect()->route('admin.categories')->with('success', 'Category updated!');
    }

    public function categoryDelete($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->route('admin.categories')->with('success', 'Category deleted!');
    }

    // ── ORDERS ────────────────────────────────────────────────────────────────
    public function orders()
    {
        $orders = Order::with('user')->latest()->paginate(20);
        return view('admin.orders.index', compact('orders'));
    }

    public function orderUpdateStatus(Request $request, $id)
    {
        Order::findOrFail($id)->update(['status' => $request->status]);
        return redirect()->back()->with('success', 'Order status updated!');
    }

    // ── REPORTS ───────────────────────────────────────────────────────────────
    public function reports()
    {
        $totalRevenue   = Order::where('payment_status', 'paid')->sum('total_amount');
        $totalOrders    = Order::count();
        $pendingOrders  = Order::where('status', 'pending')->count();
        $totalCustomers = User::where('role', 'customer')->count();
        $topProducts    = Product::withCount('orderItems')->orderBy('order_items_count', 'desc')->take(5)->get();

        return view('admin.reports.index', compact(
            'totalRevenue', 'totalOrders', 'pendingOrders', 'totalCustomers', 'topProducts'
        ));
    }
}
