<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Vendor;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers    = User::count();
        $totalProducts = Product::count();
        $totalOrders   = Order::count();
        $totalVendors  = Vendor::count();
        $recentUsers   = User::latest()->take(5)->get();

        return view('backend.dashboard', compact(
            'totalUsers',
            'totalProducts',
            'totalOrders',
            'totalVendors',
            'recentUsers'
        ));
    }
}
