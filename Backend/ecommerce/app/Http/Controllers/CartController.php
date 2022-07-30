<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Tax;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserAddress;

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
        $session = $request->session()->get('cart') ?? [];

        if($request->session()->has('shipping_addr_id')) {
            $request->session()->forget('shipping_addr_id');
        }

        $products = [];
        $subtotal = 0;
        $total_qty = 0;
        $disable_checkout = false;

        if($session) {
            $products = Product::whereIn('id', array_keys($session))->with('size')->get();

            foreach($products as $product) {
                // calc cart summary
                $subtotal += 
                    floatval($product->price) * $session[$product->id];
                $total_qty += $session[$product->id];
                // disable checkout button when out of stock item exists
                if($product->quantity == 0 || $product->quantity < $session[$product->id]) {
                    $disable_checkout = true;
                }
            }
        } 

        $subtotal = number_format($subtotal, 2);
    
        return view('cart/index', compact(
            'title', 
            'products', 
            'session', 
            'subtotal', 
            'total_qty', 
            'disable_checkout'
        ));
    }

    /**
     * Add to Cart from product detail page logic
     *
     * @param Request $request
     * @param [type] $id product id
     * @return void
     */
    public function create(Request $request, $id) {
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
    public function edit(Request $request) {

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


    /**
     * Show the Cart checkout item list and form.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function checkoutCart(Request $request) {

        $title = 'Checkout';

        if(Auth::check()) {
            // ====== Authenticated User ======
            $user_id = Auth::user()->id;
            $user = User::find($user_id);
            $address_list = $user->user_addresses;
            $session_address_id = $request->session()->get('shipping_addr_id') ?? null;
            $selected_address_id = null;
    
            $session_cart = $request->session()->get('cart') ?? [];
            $products = [];
            $subtotal = 0;
            $total_qty = 0;
            // [tax]check the country and province from shipping address when checking out

            if($session_address_id) {
                $selected_address_id = intval($session_address_id);
                $user_address = UserAddress::find( $session_address_id);
                $default_address = $user_address->full_address() . ', ' . $user_address->user_postal_code();
            } else {
                $selected_address_id = $user->default_address_id;
                $default_address = $user->full_address() . ', ' . $user->user_postal_code();
            }

            if($session_cart) {
                $products = Product::whereIn('id', array_keys($session_cart))->with('size')->get();

                foreach($products as $product) {
                    // calc cart summary
                    $subtotal += 
                        floatval($product->price) * $session_cart[$product->id];
                    $total_qty += $session_cart[$product->id];
                }
            }

            $subtotal = number_format($subtotal, 2);
            return view('/cart/checkout', compact(
                'title',
                'user',
                'default_address',
                'address_list',
                'products', 
                'session_cart',
                'session_address_id',
                'selected_address_id',
                'subtotal', 
                'total_qty'));

        } else {
            // ====== Unauthenticated User ======
            session()->flash('error', 'Please login or register an account before checking out the shopping cart');
            session(['route_back_cart' => true]);
            return redirect()->route('login');

        }
    }

    /**
     * Update the selected shipping address from selection on checkout page
     *
     * @param Request $request
     * @return void
     */
    public function updateShippingAddress(Request $request) {

        $selected_address_id = $request->input('address_item_id');
        session(['shipping_addr_id' => $selected_address_id]);

        return redirect()->route('checkoutCart');
    }

    /**
     * Checkout purchase and submit credit card information
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function processToPayment() {

    }
}
