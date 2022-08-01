<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ShippingCharge;
use App\Http\Controllers\Controller;

class ShippingChargeController extends Controller
{
        /**
     * Index function
     *
     * @return void
     */
    public function index(Request $request)
    {
        $title = 'Admin | Shiipping Charge';
        //$categories = Category::latest()->paginate(10);
        $search = $request->query('search');
        if ($search) {
            $shippingcharges = ShippingCharge::latest()->where('continent','LIKE','%'.$search."%")->paginate(10);
        } else {
            $shippingcharges = ShippingCharge::latest()->paginate(10);
        }
        
        return view('/admin/shipping-charge/index', compact('shippingcharges','title'));
    }
}
