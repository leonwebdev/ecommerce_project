@extends('layouts.app')
@section('content')
    <div class="container details_page">
        <div class="wrapper">
            <div class="content">

                <div class="left">
                    <div class="product_image">
                        <div class="slider product-images">
                            <div>
                                <img src="/images/item1.jpg" alt="item1">
                            </div>
                        </div>
                        {{-- <div class="slider product-images-nav">
                            <div>
                                <img src="/images/item1.jpg" alt="item1">
                            </div>
                        </div> --}}
                        {{-- {{ $product->product_media }} --}}
                    </div>
                </div>
                <div class="right">
                    <div class="product_desc">
                        <h1>{{ $product->name }}</h1>

                        <div class="price">${{ number_format($product->price, 2) }} CAD</div>
                        <div>
                            {!! $product->description !!}
                        </div>


                        <div class="category"><strong>Category: </strong>
                            {{ $product->categories->implode('title', ', ') }}
                        </div>
                        <div class="color"><strong>Color: </strong> {{ $product->color }}</div>
                        <div class="size"><strong>Size: </strong> {{ $product->size->name }}</div>
                        @if ($product->quantity == 0)
                            <div class="availability">
                                <img src="/images/icon-unavailable.svg" alt="unavailable icon" width="17"
                                    height="17">
                                <span>Currently unavailable (show when out of stock)</span>
                            </div>
                        @endif

                        <div class="@if ($product->quantity == 0) disabled @endif">
                            <a class="btn btn_black" href="{{ route('createCart', ['id' => $product->id ]) }}">Add to bag</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
