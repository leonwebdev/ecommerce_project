<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class OrderController extends Controller
{
    /**
     * Index function
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {

        $title = 'Admin | Order';

        $search = $request->query('search');

        if ($search) {
            $orders = Order::where('order_status', 'LIKE', '%' . $search . '%')
                ->orWhere('shipping_address', 'LIKE', '%'. $search . '%')
                ->orWhere('billing_address', 'LIKE', '%'. $search . '%')
                ->orWhereHas('user', function ($q) use ($search) {
                    $q->where('first_name', 'LIKE', '%' . $search . '%')
                                ->orWhere('last_name', 'LIKE', '%'. $search . '%')
                                ->orWhere('phone', 'LIKE', '%'. $search . '%')
                                ->orWhere('email', 'LIKE', '%'. $search . '%');
                })
                ->orWhereHas('products', function ($q) use ($search) {
                    $q->where('name', 'LIKE', '%' . $search . '%');
                })
                ->latest()
                ->paginate(10);
        } else {
            $orders = Order::with(['products', 'user'])->latest()->paginate(10);
        }
        return view('/admin/order/index', compact('title', 'orders'));
        
    }
}
