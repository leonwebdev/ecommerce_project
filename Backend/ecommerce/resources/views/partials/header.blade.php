<!-- Navigation bar start -->
<div class="nav_bar">
    <div class="wrapper">
        <div class="logo">
            <a href="/">
                <img src="/images/logo-uptrend.svg" alt="Uptrend logo" width="100" height="100" />
            </a>
        </div>
        <nav>
            <ul>
                <li>
                    <a class="active" href="/product">All Outfits</a>
                </li>
                @foreach ($genders as $gender)
                    <li>
                        <a href="/{{ $gender->name }}/product" class="text-transform-capitalize">{{ $gender->name }}</a>
                    </li>
                @endforeach
            </ul>
        </nav>
        <div class="utils">
            <div class="icon search">
                <a href=":javascript;">
                    <img src="/images/icon-magnifier.svg" alt="search icon" width="30" height="30" />
                </a>
            </div>
            <!-- Profile start-->
            <div class="icon profile">
                <a href="" onclick="event.preventDefault();">
                    <img src="/images/icon-profile.svg" alt="profile icon" width="30" height="30" />
                </a>
                <div class="profile_dropdown">
                    <ul>
                        @guest

                            @if (Route::has('register'))
                                <li><a class="btn btn_black" href="{{ route('register') }}">Register</a></li>
                            @endif
                            @if (Route::has('login'))
                                <li><a class="btn btn_white_no_border" href="{{ route('login') }}">Login</a></li>
                            @endif
                        @else
                            <li><a class="btn btn_black" href="/logout"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Logout</a>
                            </li>
                            <li><a class="btn btn_white_no_border"
                                    href="{{ route('profile') }}">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        @endguest

                    </ul>
                </div>
            </div>
            <!-- Profile ended-->
            <div class="icon cart">
                <a href="{{ route('cartIndex') }}">
                    @if($count_cart && !empty($count_cart) )
                    <span class="count">{{ count($count_cart) }}</span>
                    @endif
                    <img src="/images/icon-cart.svg" alt="cart icon" width="30" height="30" />
                </a>
            </div>
        </div>

        <!-- Nav dropdown menu -->
        <!-- !!Menu loaded from database when page loaded!! -->
        <div class="nav_dropdown">
            <div class="nav_content">
                <div class="nav_item">
                    <a href="#">Shop All Women</a>
                </div>
                <div class="nav_item">
                    <div class="nav_dropdown_title">
                        Categories
                    </div>
                    <ul>
                        <li><a href="?category=women-tops">Tops</a></li>
                        <li><a href="?category=women-bottoms">Bottoms</a></li>
                        <li><a href="?category=women-dresses">Dresses</a></li>
                        <li><a href="?category=women-jackets">Jackets</a></li>
                        <li><a href="?category=women-sport-wear">Sport Wear</a></li>
                        <li><a href="?category=women-accessories">Accessories</a></li>
                    </ul>
                </div>
                <div class="nav_item">
                    <div class="nav_dropdown_title">
                        Sizes
                    </div>
                    <ul>
                        <li><a href="?size=women-xxl">XXL</a></li>
                        <li><a href="?size=women-xl">XL</a></li>
                        <li><a href="?size=women-l">L</a></li>
                        <li><a href="?size=women-s">S</a></li>
                        <li><a href="?size=women-xs">XS</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div><!-- Navigation bar end -->
