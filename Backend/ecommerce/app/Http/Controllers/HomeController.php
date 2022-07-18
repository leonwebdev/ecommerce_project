<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\Order;
use App\Models\Tax;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Shipping_charge;
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
        return view('home');
    }

    public function test()
    {
        $whoami = exec('whoami');
        $users = User::all();
        $shipping_charge = Shipping_charge::all();
        $tax = Tax::all();
        $inquiry = Inquiry::all();
        $user_address = User_address::all();
        $user_1_address = User::find(1)->user_address;
        $order = Order::all();
        $transaction = Transaction::all();
        // dd($user_1_address);
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
        ));
    }
}