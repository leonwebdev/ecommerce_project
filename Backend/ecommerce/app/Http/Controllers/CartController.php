<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = 'Shopping Cart';

        return view('cart/index', compact(
            'title', 
        ));
    }

    /**
     * Add to Cart from product detail page logic
     *
     * @param Request $request
     * @param [type] $id product id
     * @return void
     */
    public function addToCart(Request $request, $id) {
        $session = $request->session()->get('cart');
        if( isset($session[$id]) ) {
            $session[$id] = $session[$id] + 1;
        } else {
            $session[$id] = 1;
        }

        $request->session()->put('cart', $session);

        $prev_url = url()->previous();

        return redirect($prev_url);
    }
}
