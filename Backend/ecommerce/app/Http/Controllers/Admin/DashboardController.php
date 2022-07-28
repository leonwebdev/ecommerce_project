<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Gender;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        // pie chart
        $productByCategory = Category::withCount('products')
            ->orderBy('products_count', 'desc')
            ->get();

        $productByGender = Gender::withCount('products')
            ->orderBy('products_count', 'desc')
            ->get();

        // monthly sales 
        $sales = Order::selectRaw('year(created_at) year, monthname(created_at) month,count(*) as count, sum(total) as sales')
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->get();

        // monthly sales by gender and category 
        // $salesByCategory = DB::table('orders')
        //     ->selectRaw(
        //         'year(created_at) year,
        //         monthname(created_at) month,
        //         count(*)'
        //     )
        //     ->get();

        return view('/admin/dashboard/index', compact(
            'title',
            'orderCount',
            'pendingOrderCount',
            'deliveredOrderCount',
            'avgOrderValue',
            'productCount',
            'categoryCount',
            'userCount',
            'inquiryCount',
            'productByCategory',
            'productByGender',
            'sales'
        ));
    }
}
