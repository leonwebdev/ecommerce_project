<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Inquiry;
use App\Models\Order;
use App\Models\Product;
use App\Models\Product_media;
use App\Models\Tax;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Shipping_charge;
use App\Models\Size;
use App\Models\Transaction;
use App\Models\User_address;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = 'ddd';
        return view('home', compact(
            'title',
        ));
    }

    public function test()
    {
        $whoami = exec('whoami');
        $users = User::all();
        $shipping_charge = Shipping_charge::all();
        $tax = Tax::all();
        $inquiry = Inquiry::find(1);
        $user_address = User_address::all();
        $user_1_address = User::find(1)->user_addresses;
        $order = Order::all();
        $transaction = Transaction::all();
        $size = Size::all();
        $products = Product::all();
        $product_media = Product_media::all();
        $categories = Category::all();
        $user_1_order = User::find(1)->orders;
        $product_1_category = Product::find(1)->categories;
        $order_1_products = Order::find(1)->products;
        $title = "tets";
        // var_dump($user_1_address);
        // die();
        return view('test', compact(
            'whoami',
            'users',
            'shipping_charge',
            'tax',
            'inquiry',
            'user_address',
            'user_1_address',
            'order',
            'transaction',
            'size',
            'products',
            'product_media',
            'categories',
            'user_1_order',
            'product_1_category',
            'order_1_products',
            'title',
        ));
    }
}