<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\User_address;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

class OrderHistoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Order History";

        $orders = Auth::user()->orders;
        // foreach ($orders as $key => $order) {

        //     $products = $order->products;
        //     foreach ($products as $key => $product) {
        //         echo $product->pivot->quantity;
        //         echo $product->size->name;
        //         echo '<br>--------------------<br>';
        //     }
        // }
        // var_dump($orders);
        // echo $orders;
        // die;
        return view('auth.order_history', compact('title', 'orders'));
    }
}
