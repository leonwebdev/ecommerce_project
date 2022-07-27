<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Admin | Dashboard';

        // order start
        $orderCount = Order::all()->count();
        $pendingOrderCount = Order::where('order_status', '=', 'pending')->count();
        $deliveredOrderCount = Order::where('order_status', '=', 'delivered')->count();
        $deliveredOrderCount = Order::where('order_status', '=', 'delivered')->count();
        $avgOrderValue = Order::avg('total');
        // order end


        // summary start
        $productCount = Product::all()->count();
        $categoryCount = Category::all()->count();
        $userCount = Category::all()->count();
        $inquiryCount = Category::all()->count();
        // summary end
        return view('/admin/dashboard/index', compact(
            'title',
            'orderCount',
            'pendingOrderCount',
            'deliveredOrderCount',
            'avgOrderValue',
            'productCount',
            'categoryCount',
            'userCount',
            'inquiryCount'
        ));
    }
}
