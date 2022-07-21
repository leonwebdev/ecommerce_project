@extends('layouts.app')
@section('content')
    <div class="container details_page">
        <div class="wrapper">
            <div class="content">
                <div class="left">
                    <div class="product_image">
                        <img src="/images/item1.jpg" alt="item1">
                    </div>
                </div>
                <div class="right">
                    {{-- {{ $product }} --}}
                    <h1>{{ $product->name }}</h1>
                    <div class="product_desc">
                        {{-- product description? --}}
                        {{-- gender ? --}}
                        {{-- size ? --}}
                        {{-- category ? --}}
                        <div class="price">${{ number_format($product->price, 2) }} CAD</div>
                        <div class="color">{{ $product->color }}</div>
                        {{-- color label aheade of value? --}}
                        @if ($product->qty == 0)
                            <div class="availability">
                                <img src="/images/icon-unavailable.svg" alt="unavailable icon" width="17"
                                    height="17">
                                <span>Currently unavailable (show when out of stock)</span>
                            </div>
                        @endif
                        <div class="select_size">
                            <select name="size">
                                <option value="">Select size</option>
                                <option value="xxl">XLL</option>
                                <option value="xl">XL</option>
                                <option value="l">l</option>
                                <option value="s">S</option>
                                <option value="xs">XS</option>
                            </select>
                        </div>
                        <div>
                            <!-- disable the button for clicking when out of stock -->
                            {{-- <?= $product->qty == 0 ? 'disable' : '' ?> --}}
                            <a class="btn btn_black " href="#">Add to
                                bag</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
