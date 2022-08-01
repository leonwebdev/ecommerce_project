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
        $title = 'Admin | Shipping Charge';
        //$categories = Category::latest()->paginate(10);
        $search = $request->query('search');
        if ($search) {
            $shippingcharges = ShippingCharge::latest()->where('continent','LIKE','%'.$search."%")->paginate(10);
        } else {
            $shippingcharges = ShippingCharge::latest()->paginate(10);
        }
        
        return view('/admin/shipping-charge/index', compact('shippingcharges','title'));
    }
         /**
     * create function
     *
     * @return void
     */
    public function create()
    {
        $title = 'Admin | Shipping Charge';
        return view('/admin/shipping-charge/create', compact('title'));
    }
    /**
     * store function
     *
     * @return void
     */
    public function store(Request $request)
    {

        $valid = $request->validate([
            'continent' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'charge' => 'required|regex:/^\d+(\.\d{1,2})?$/'  
        ]);

        ShippingCharge::create($valid);

        session()->flash('success', 'Shipping Charge successfully created!');
        
        return redirect('/admin/shipping-charge');


    }
}
