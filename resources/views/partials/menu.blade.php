<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{asset('images/logo.png')}}" class="logo-top" alt="" />
        </a>
        <div class="collapse navbar-collapse justify-content-md-center" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 pe-4">
                <li class="nav-item">
                    <a class="nav-link" href="/">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/product">Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/introduce"> Giới thiệu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/blog"> Tin tức</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact"> Liên hệ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Q&A"> Góp ý</a>
                </li>
            </ul>
        </div>
        <form class="d-flex" role="search" method="GET" action="{{ route('search_product') }}">
            <input class="form-control me-2" type="search" name="keyword" placeholder="Tìm kiếm" aria-label="Search" />
            <button class="btn btn-outline-secondary" type="submit">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>


        <ul class="navbar-nav mb-2 mb-lg-0 px-4">
            <!-- Tài khoản -->
            <li class="nav-item dropdown">
                @guest
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-user"></i>
                </a>
                <ul class="dropdown-menu bg-light" data-bs-theme="light">
                    <li><a class="dropdown-item" href="{{ route('login') }}">Đăng nhập</a></li>
                    <li><a class="dropdown-item" href="{{ route('register') }}">Đăng ký</a></li>
                </ul>
                @endguest

                @auth
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    @if(Auth::user()->avatar)
                    <img src="{{ asset(Auth::user()->avatar) }}" alt="Avatar" class="rounded-circle" width="30" height="30">
                    @else
                    <i class="fa-solid fa-user"></i>
                    @endif
                </a>
                <ul class="dropdown-menu bg-light" data-bs-theme="light">
                    <li><a class="dropdown-item">Đổi mật khẩu</a></li>
                    <li><a class="dropdown-item" href="{{ route('profile') }}">Hồ sơ</a></li>
                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="dropdown-item" type="submit">
                                Đăng xuất
                            </button>
                        </form>
                    </li>
                </ul>
                @endauth
            </li>

            <?php
            $cart = session()->get('cart', []);
            $totalQuantity = 0;
            foreach ($cart as $item) {
                $totalQuantity += $item['quantity'];
            }
            ?>

            <!-- Giỏ hàng -->
            @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="position-absolute bottom-25 start-75 translate-middle badge rounded-pill bg-danger">
                        {{ $totalQuantity }}
                    </span>
                </a>
                <ul class="dropdown-menu bg-light" data-bs-theme="light">
                    <li><a class="dropdown-item" href="/cart">Giỏ hàng</a></li>
                    <li><a class="dropdown-item" href="/history">Hàng đã mua</a></li>
                    <li><a class="dropdown-item" href="/favorite">Sản phẩm yêu thích</a></li>
                </ul>
            </li>
            @else
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="position-absolute bottom-25 start-75 translate-middle badge rounded-pill bg-danger">
                        {{ $totalQuantity }}
                    </span>
                </a>
                <ul class="dropdown-menu bg-light" data-bs-theme="light">
                    <li><a class="dropdown-item" href="/cart">Giỏ hàng</a></li>
                    <li><a class="dropdown-item" href="/favorite">Sản phẩm yêu thích</a></li>
                </ul>








            </li>
            @endauth

        </ul>
    </div>
</nav>