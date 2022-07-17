<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Shipping_charge;

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
        return view('test', compact('whoami', 'users', 'shipping_charge', 'tax'));
    }
}