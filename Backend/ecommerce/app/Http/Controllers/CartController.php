<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Show the Cart item list.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $title = 'Shopping Cart';
        $session = $request->session()->get('cart');

        if($session) {
            $products = Product::whereIn('id', array_keys($session))->with('size')->get();
        } else {
            $products = [];
            $session = [];
        }
    
        return view('cart/index', compact(
            'title', 'products', 'session'
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

    /**
     * Update cart item quantity in session
     *
     * @param Request $request
     * @return void
     */
    public function updateCart(Request $request) {

        $session = $request->session()->get('cart');
        $id = $request->input('id');
        $action = $request->input('action');

        if(!empty($action) && isset($session[$id])) {
            switch($action) {
                case 'plus':
                    $session[$id] = $session[$id] + 1;
                    break;
                case 'minus':
                    if($session[$id] == 1) {
                        unset($session[$id]);
                    } else {
                        $session[$id] = $session[$id] - 1;
                    }
                    break;
                case 'delete':
                    unset($session[$id]);
                    break;
            }
            $request->session()->put('cart', $session);
        }

        return redirect()->route('cartIndex');
    }
}
