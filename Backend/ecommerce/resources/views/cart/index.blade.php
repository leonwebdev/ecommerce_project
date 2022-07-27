@extends('layouts.app')

@section('content')
<div class="container cart">
    <div class="wrapper">
        <h1>{{ $title }}</h1>

        <div class="content">
            <div class="cart_list col col-8">
                <!-- If cart empty -->
                @if(empty($session))
                <div class="empty_cart">
                    Cart is empty.
                </div>
                @else
                <!-- If cart has items -->
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

                                <div class="col col-3 delete">
                                    <form action="{{ route('updateCart') }}" method="get">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $product->id }}" />
                                        <input type="hidden" name="action" value="delete" />
                                        <input type="image" src="/images/icon-bin.svg" alt="bin icon" width="24" height="24" />
                                    </form>
                                    
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
                                    <form action="{{ route('updateCart') }}" method="get">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <input type="hidden" name="action" value="plus">
                                        <button>+</button>
                                    </form>

                                    <span class="num">{{ $session[$product->id] }}</span>

                                    
                                    <form action="{{ route('updateCart') }}" method="get">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <input type="hidden" name="action" value="minus">
                                        <button>-</button>
                                    </form>

                                </div>

                                <div class="col col-4 price">
                                    <span>
                                        <strong>Item Total:</strong>
                                        ${{ 
                                            number_format(
                                                floatval($product->price) * intval($session[$product->id]), 2
                                            )
                                        }} CAD
                                    </span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col col-12">
                                    @if($product->quantity == 0)
                                        <p class="out_of_stock">This product is <strong>out of stock</strong>, please remove it from the cart before processing to checkout.</p>
                                    @endif

                                    @if($product->quantity < $session[$product->id])
                                        <p class="out_of_stock">There are only <strong>{{ $product->quantity }} items left</strong> for this product, please update the quantity before processing to checkout.</p>
                                    @endif
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>

            <div class="cart_info col col-3">
                <h2>Summary</h2>
                <div class="subtotal"><strong>Subtotal: </strong>${{ $subtotal }} CAD</div>
                <div class="tital_item"><strong>Quantity: </strong>{{ $total_qty }}</div>
                <!-- !! Exceeded $80 for local free delivery !! -->
                <!-- !! Exceeded $300 for local internetional delivery !! -->
                <div class="checkout_btn @if($disable_checkout) disabled @endif">
                    <a class="btn btn_black" href="#">Checkout Cart</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection