@extends('layouts.app')

@section('content')
<div class="container cart">
    <div class="wrapper">
        <h1>{{ $title }}</h1>

        <div class="content">

            <div class="cart_list col col-8">
                <div class="cart_item">
                    <div class="product_image col col-2">
                        <a href="#"><img src="/images/item1.jpg" alt="item 1" /></a>
                    </div>
                    
                    <div class="desc col col-10">
                        <div class="row heading">
                            <div class="col col-9 title">
                                <a href="#">Girl Dress</a>
                            </div>

                            <div class="col col-3 delete">
                                <a href="#"><img src="/images/icon-bin.svg" alt="bin icon" width="26" height="26" /></a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col col-4">
                                <p>
                                    <strong>Color: </strong> pink
                                </p>
                                <p>
                                    <strong>Size: </strong> M
                                </p>
                            </div>
                            <div class="col col-4 qty">
                                <form action="{{ route('cartLocalStorage') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="1">
                                    <select name="qty" onchange="this.form.submit();">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </form>
                            </div>
                            <div class="col col-4 price">
                                <span>$45.00 CAD</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col col-12">
                                <p class="out_of_stock">Item is <strong>out of stock</strong>, please remove it from the cart before processing to checkout.</p>
                                <p class="out_of_stock">There is only <strong>(num) left</strong> for this product, please update the quantity before processing to checkout.</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="cart_info col col-3">
                <h2>Summary</h2>
                <div class="subtotal"><strong>Subtotal: </strong>$1000</div>
                <div class="tital_item"><strong>Total Items: </strong>3</div>
                <div class="checkout_btn">
                    <!-- !! Disable button is out of stock item exists !! -->
                    <a class="btn btn_black" href="#">Checkout Cart</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection