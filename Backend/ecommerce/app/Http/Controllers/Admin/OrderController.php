<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
     /**
     * Index function
     *
     * @return void
     */
    public function index()
    {
        $title = 'Order List';
        
        return view('/admin/order/index', compact('title'));
    }
}
