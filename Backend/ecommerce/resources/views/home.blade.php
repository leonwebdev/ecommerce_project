@extends('layouts.app')

@section('content')
    <div class="home">
        <!-- Banner -->
        <div class="banner">
            <div class="banner_item" style="background-image: url('/images/home/slider1.png')">
                <a href="#"></a>
            </div>
            <div class="banner_item" style="background-image: url('/images/home/slider2.jpg')">
                <a href="#"></a>
            </div>
            <div class="banner_item" style="background-image: url('/images/home/slider3.jpg')">
                <a href="#"></a>
            </div>
        </div><!-- End Banner -->

        <!-- Collections -->
        <div class="collections">
            <div class="wrapper">
                <div class="decorative_text">Collections</div>

                <div class="content">
                    <div class="item item_1">
                        <a href="#"><span>New for Woman</span></a>
                        <div class="bg_img" style="background-image: url('/images/home/collections_1.jpg')"></div>
                    </div>
                    <div class="item item_2">
                        <a href="#"><span>Sports</span></a>
                        <div class="bg_img" style="background-image: url('/images/home/collections_2.jpg')"></div>
                    </div>
                    <div class="item item_3">
                        <a href="#"><span>Smart Casual</span></a>
                        <div class="bg_img" style="background-image: url('/images/home/collections_3.jpg')"></div>
                    </div>
                    <div class="item item_4">
                        <a href="#"><span>Spring for Kids</span></a>
                        <div class="bg_img" style="background-image: url('/images/home/collections_4.jpg')"></div>
                    </div>
                    <div class="item item_5">
                        <a href="#"><span>All Boys</span></a>
                        <div class="bg_img" style="background-image: url('/images/home/collections_5.jpg')"></div>
                    </div>
                </div>
            </div>
        </div><!-- End Collections -->

        <!-- Sliders for featured products -->
        <div class="featured">
            <div class="wrapper">
                <div class="heading">
                    <div class="decorative_text">featured</div>
                    <div class="tabs">
                        <ul>
                            @foreach ($genders as $gender)
                                <li>{{ $gender->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="content">
                    @foreach ($genders as $gender)
                        <div class="row">
                            <div class="featured_slider">
                                @foreach ($featured as $item)
                                    @if ($item->gender_id == $gender->id)
                                        <div class="featured_item">
                                            <div class="product_img">
                                                <a href="/product/{{ $item->slug }}">
                                                    <img src="/images/item1.jpg" alt="item" />
                                                </a>
                                            </div>
                                            <div class="title">
                                                {{ $item->name }}
                                            </div>
                                            <div class="price">${{ $item->price }} CAD</div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div><!-- End of Sliders for featured products -->

        <!-- Service description  -->
        <div class="shipping_desc">
            <div class="wrapper">
                <div class="col col-4">
                    <div class="icon">
                        <img src="/images/icon-truck.svg" alt="truck icon" width="80" height="55" />
                    </div>
                    <div class="desc">Free Shipping in Canada when spend over $80</div>
                </div>
                <div class="col col-4">
                    <div class="icon">
                        <img src="/images/icon-flight.svg" alt="truck icon" width="80" height="55" />
                    </div>
                    <div class="desc">Free International Shipping when order over $250</div>
                </div>
                <div class="col col-4">
                    <div class="icon">
                        <img src="/images/icon-timer.svg" alt="flight icon" width="80" height="55" />
                    </div>
                    <div class="desc">30 Days Returns Policy After product received</div>
                </div>
            </div>
        </div><!-- End of Service description  -->

        <!-- Instagram influencer -->
        <div class="social_media_influencer">
            <div class="photos">
                <img src="/images/home/influencers_1.jpg" alt="influencers" />
                <img src="/images/home/influencers_2.jpg" alt="influencers" />
                <img src="/images/home/influencers_3.jpg" alt="influencers" />
                <img src="/images/home/influencers_4.jpg" alt="influencers" />
                <img src="/images/home/influencers_5.jpg" alt="influencers" />
                <img src="/images/home/influencers_6.jpg" alt="influencers" />
                <img src="/images/home/influencers_7.jpg" alt="influencers" />
                <img src="/images/home/influencers_8.jpg" alt="influencers" />
                <img src="/images/home/influencers_9.jpg" alt="influencers" />
                <img src="/images/home/influencers_10.jpg" alt="influencers" />
            </div>
            <div class="black_layer">
                <a href="#" class="btn btn_white_border">Instagram Influencers</a>
            </div>
        </div><!-- End of Instagram influencer -->

    </div>
@endsection
