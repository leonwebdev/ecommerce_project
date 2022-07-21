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
                <form action="{{ route('product') }}" method="GET">
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
                    <div class="item">
                        <div class="product_img"> <a href="product-details.html"></a>
                            <img src="/images/item1.jpg" alt="item1">
                        </div>
                        <div class="desc">
                            <p>Vivamus suscipit tortor eget felis ...</p>
                            <div class="price">$38.00 CAD</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product_img"> <a href="product-details.html"></a>
                            <img src="/images/item1.jpg" alt="item1">
                        </div>
                        <div class="desc">
                            <p>Vivamus suscipit tortor eget felis ...</p>
                            <div class="price">$38.00 CAD</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product_img"> <a href="product-details.html"></a>
                            <img src="/images/item1.jpg" alt="item1">
                        </div>
                        <div class="desc">
                            <p>Vivamus suscipit tortor eget felis ...</p>
                            <div class="price">$38.00 CAD</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product_img"> <a href="product-details.html"></a>
                            <img src="/images/item1.jpg" alt="item1">
                        </div>
                        <div class="desc">
                            <p>Vivamus suscipit tortor eget felis ...</p>
                            <div class="price">$38.00 CAD</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product_img"> <a href="product-details.html"></a>
                            <img src="/images/item1.jpg" alt="item1">
                        </div>
                        <div class="desc">
                            <p>Vivamus suscipit tortor eget felis ...</p>
                            <div class="price">$38.00 CAD</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product_img"> <a href="product-details.html"></a>
                            <img src="/images/item1.jpg" alt="item1">
                        </div>
                        <div class="desc">
                            <p>Vivamus suscipit tortor eget felis ...</p>
                            <div class="price">$38.00 CAD</div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Section ended -->
        </div>
    </div>
@endsection
