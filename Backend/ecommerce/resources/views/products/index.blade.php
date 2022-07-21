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
                <form action="/">
                    <div>
                        <input type="checkbox" name="xxl" id="xxl" />
                        <label for="xxl">XXL</label>
                    </div>
                    <div>
                        <input type="checkbox" name="xl" id="xl" />
                        <label for="xl">XL</label>
                    </div>
                    <div>
                        <input type="checkbox" name="l" id="l" />
                        <label for="l">L</label>
                    </div>
                    <div>
                        <input type="checkbox" name="s" id="s" />
                        <label for="s">S</label>
                    </div>
                    <div>
                        <input type="checkbox" name="xs" id="xs" />
                        <label for="xs">XS</label>
                    </div>
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
