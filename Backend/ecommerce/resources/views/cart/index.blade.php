@extends('layouts.app')

@section('content')
<div class="container cart">
    <div class="wrapper">
        <h1>{{ $title }}</h1>

        <div class="content">
            <div class="cart_list col col-8">
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
                                <a href="#">
                                    <img src="/images/icon-bin.svg" alt="bin icon" width="24" height="24" />
                                </a>
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
                                <form action="" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="1">
                                    <button>+</button>
                                    <input type="number" name="q" min="1" max="{{ $product->quantity }}" value="{{ $session[$product->id] }}" /> <button>-</button>
                                </form>
                            </div>

                            <div class="col col-4 price">
                                <span>${{ 
                                    number_format(
                                        floatval($product->price) * intval($session[$product->id]), 2
                                    )
                                }} CAD</span>
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
            </div>

            <div class="cart_info col col-3">
                <h2>Summary</h2>
                <div class="subtotal"><strong>Subtotal: </strong>$1000</div>
                <div class="tital_item"><strong>Total Items: </strong>3</div>
                <!-- !! Exceeded $80 for local free delivery !! -->
                <!-- !! Exceeded $300 for local internetional delivery !! -->
                <div class="checkout_btn">
                    <!-- !! Disable button is out of stock item exists !! -->
                    <a class="btn btn_black" href="#">Checkout Cart</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection