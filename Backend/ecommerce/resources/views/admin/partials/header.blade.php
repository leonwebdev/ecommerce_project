<!--Main Navigation-->
<header>
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
        <div class="position-sticky">
            <div class="list-group list-group-flush mx-3 mt-4">
                <a href="/admin/dashboard" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fa fa-tachometer fa-fw me-3"></i>
                    <span>Dashboard</span>
                </a>
                <a href="/admin/order" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-clipboard fa-fw me-3"></i>
                    <span>Orders</span>
                </a>
                <a href="/admin/home" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-house fa-fw me-3"></i>
                    <span>Home Page</span>
                </a>
                <a href="/admin/product" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-shirt fa-fw me-3"></i>
                    <span>Products</span>
                </a>
                <a href="/admin/category" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-chart-bar fa-fw me-3"></i>
                    <span>Categories</span>
                </a>
                <a href="/admin/advertisement" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-rectangle-ad fa-fw me-3"></i>
                    <span>Advertisements</span>
                </a>
                <a href="/admin/inquiry" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-question fa-fw me-3"></i>
                    <span>Inquiry</span>
                </a>
                <a href="/admin/user" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-user fa-fw me-3"></i>
                    <span>Users</span>
                </a>
                <a href="/admin/address" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-location-dot fa-fw me-3"></i>
                    <span>Addresses</span>
                </a>
            </div>
        </div>
    </nav>
    <!-- Sidebar -->

    <!-- Navbar -->
    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu"
                aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Brand -->
            <a class="navbar-brand" href="#">
                <img src="/images/logo-uptrend.svg" width="70" height="70" alt="UPtrend logo" />
                <span>Admin Panel</span>
            </a>

            <!-- Right links -->
            <ul class="navbar-nav ms-auto d-flex flex-row">
                <!-- User -->
                @auth
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" href="/admin/order"
                            role="button">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center text-danger fw-bold" href="/logout"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @else
                    <li class="nav-item">
                        <span>You have not login yet, this message display for development.</span>
                    </li>
                @endauth

            </ul>
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
</header>
<!--Main Navigation-->
