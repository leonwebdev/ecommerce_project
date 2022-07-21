@extends('layouts.app')

@section('content')
    <div class="container list_page">
        <div class="wrapper">
            <!-- Aside start -->
            <aside>
                <h3>Categories</h3>
                <form action="/">
                    @foreach ($categories as $category)
                        <div>
                            <input type="checkbox" name="{{ $category->title }}" id="{{ $category->title }}" />
                            <label for="{{ $category->title }}">{{ $category->title }}</label>
                        </div>
                    @endforeach
                </form>
                <h3>Sizes</h3>
                <form action="{{ route('product_list') }}" method="GET">
                    @foreach ($sizes as $size)
                        <div>
                            <input type="checkbox" name="{{ $size->name }}" id="{{ $size->name }}" />
                            <label for="{{ $size->name }}">{{ $size->name }}</label>
                        </div>
                    @endforeach
                </form>
            </aside>
            <!-- Aside ended -->
            <!-- Section start -->
            <section class="list_item">
                <div class="content">
                    @foreach ($products as $product)
                        {{-- {{ $product }} --}}
                        <div class="item">
                            <div class="product_img"> <a href="/product/{{ $product->slug }}"></a>
                                <img src="/images/item1.jpg" alt="item1">
                            </div>
                            <div class="desc">
                                <p>{{ $product->name }}</p>
                                <div class="price">${{ number_format($product->price, 2) }} CAD</div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </section>
            <!-- Section ended -->
        </div>
    </div>
@endsection
