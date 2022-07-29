@extends('layouts.app')

@section('content')
<div class="container cart">
    <div class="wrapper">
        <h1>{{ $title }}</h1>

        <p>Please confirm the <string>Shipping address</string> and <string>cart items</string>.</p>

        <div class="content form">
            <div class="cart_list col col-8">
                <!-- Shipping Address -->
                <h2>Shipping Information</h2>
                <div class="shipping">
                    <div class="user">
                        <strong>Name:</strong> {{ $user->first_name }} {{ $user->last_name }}
                    </div>
                    <div class="default_addr">
                        <strong>Address:</strong> {{ $default_address }}
                    </div>
                    <div class="action change_address">
                        <a href="#" class="btn btn_black">Change Address</a>
                    </div>

                    <div class="address_list hidden">
                        <h3>Choose another address:</h3>
                        <form action="{{ route('updateShippingAddress') }}">
                            @csrf
                            @foreach($address_list as $address)
                            <div class="addr_item">
                                <input type="radio" id="addr_{{ $address->id }}" name="address_list" value="{{ $address->id }}" 
                                    @if($session_address_id && $session_address_id == $address->id) checked
                                    @elseif($address->id == $user->default_address_id) checked @endif 
                                />

                                @if($address->id == $user->default_address_id) 
                                <strong>(Default)</strong>
                                @endif
                                <label for="addr_{{ $address->id }}">{{ $address->full_address() }}</label>
                            </div>
                            @endforeach
                            <div class="action">
                                <button class="btn btn_black">Update</button>
                                <a href="#" class="btn btn_black">Create New Address</a>
                            </div>
                        </form>
                        
                    </div>

                    <div class="address_form hidden">
                        <h3>Add New Shipping Address:</h3>
                        <form action="/address" method="POST">
                            @csrf
                            <p class="col col-12 required">
                                <input type="text" id="street" name="street" placeholder="Street"
                                    value="{{ old('street') }}" />
                                @error('street')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </p>
                            <p class="col col-7 required">
                                <input type="text" id="city" name="city" placeholder="City"
                                    value="{{ old('city') }}" />
                                @error('city')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </p>
                            <p class="col col-5 required">
                                <input type="text" id="postal_code" name="postal_code" placeholder="Postal code"
                                    value="{{ old('postal_code') }}" />
                                @error('postal_code')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </p>
                            <p class="col col-7 required">
                                <input type="text" id="province" name="province" placeholder="Province"
                                    value="{{ old('province') }}" />
                                @error('province')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </p>
                            <p class="col col-5 required">
                                <input type="text" id="country" name="country" placeholder="Country"
                                    value="{{ old('country') }}" />
                                @error('country')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </p>
                            <p class="col col-12 terms required">
                                <input type="checkbox" name="terms" id="terms" />
                                <label for="terms">I accept the <a href="#" target="_blank">Terms of Use</a> & <a
                                        href="#" target="_blank">Privacy Policy</a> .</label>
                                @error('terms')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </p>
                            <p>
                                <button id="register_btn" class="btn btn_white">Create</button>
                            </p>
                            <p class="highlight">* Required fields.</p>
                        </form>
                    </div>
                </div>

                <!-- Cart Items -->
                <h2>Items</h2>
                @foreach($products as $product)
                <div class="cart_item">
                    <div class="product_image col col-2">
                        <a href="/product/{{ $product->slug }}"><img src="/images/item1.jpg" alt="item 1" /></a>
                    </div>
                    
                    <div class="desc col col-10">
                        <div class="row heading">
                            <div class="col col-9 title">
                                <a href="/product/{{ $product->slug }}">{{ $product->name }}</a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col col-4">
                                <p>
                                    <strong>Color: </strong> 
                                    <span class="color">{{ $product->color }}</span>
                                </p>
                                <p>
                                    <strong>Size: </strong> 
                                    @if($product->size)
                                        <span class="size">{{$product->size->name}}</span>
                                    @endif
                                </p>
                            </div>
                            <div class="col col-4 qty">
                                <span class="num"><strong>Qty:</strong> {{ $session_cart[$product->id] }}</span>
                            </div>

                            <div class="col col-4 price">
                                <span>
                                    <strong>Item Total:</strong>
                                    ${{ 
                                        number_format(
                                            floatval($product->price) * intval($session_cart[$product->id]), 2
                                        )
                                    }} CAD
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="cart_info col col-3">
                <h2>Summary</h2>
                <div class="subtotal"><strong>Subtotal: </strong>${{ $subtotal }} CAD</div>
                <div class="tital_item"><strong>Quantity: </strong>{{ $total_qty }}</div>

                // tax
                // Total
                // Shipping fee logic
                <div class="checkout_btn">
                    <a class="btn btn_black" href="{{ route('processToPayment') }}">Process to Payment</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection