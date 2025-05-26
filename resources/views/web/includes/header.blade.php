<header class="ltn__header-area ltn__header-4 ltn__header-6 ltn__header-transparent gradient-color-2">
    <div class="ltn__header-middle-area ltn__header-sticky ltn__sticky-bg-black ltn__logo-right-menu-option">
        <div class="container-fluid">
            <div class="row">
                <div class="col main-logo">
                    <div class="site-logo-wrap">
                        <div class="site-logo">
                            <a href="{{ route('home.index') }}"><img src="{{ asset('web/img/logo-2.png') }}"
                                    alt="Logo"></a>
                        </div>
                    </div>
                </div>
                <div class="col header-menu-column menu-color-white">
                    <div class="header-menu d-none d-xl-block">
                        <div class="my-search">
                            <form action="{{ route('shop.index') }}" method="GET" id="headerserviceSearchForm">

                                <div class="ser-fil">
                                    <select name="service_search" class="{{ Route::is('register','registerVendor') ? 'nice-select form-control' : 'nice-select form-control' }}">
                                        <option value="">-- Select Service --</option>
                                        @foreach ($headerServices as $service)
                                            <option value="{{ $service->name }}">{{ $service->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <input type="text" name="location" id="location" placeholder="Location....."
                                    required style="{{ Route::is('register','registerVendor') ? 'width: 171px;' : 'width: 176px;' }}">
                                <div class="sch-dis">
                                    <select name="distance" class="nice-select form-control">
                                        <option value="">Select Miles</option>
                                        <option value="15">Within 10 To 20 miles</option>
                                        <option value="40">Within 20 To 50 miles</option>
                                        <option value="75">Within 75 To 100 miles</option>
                                        <option value="50">Within 50 miles</option>
                                    </select>
                                </div>
                                <input type="hidden" name="latitude" id="latitude">
                                <input type="hidden" name="longitude" id="longitude">


                                <div class="ser-icon">
                                    <button type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>

                            <script
                                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2zcZWYTrnjovVYwCR9zwHJwVEtUEufJk&libraries=places"></script>
                            <script>
                                function initialize() {
                                    var input = document.getElementById('location');
                                    var autocomplete = new google.maps.places.Autocomplete(input);
                                    autocomplete.addListener('place_changed', function () {
                                        var place = autocomplete.getPlace();
                                        if (!place.geometry) return;
                                        document.getElementById('latitude').value = place.geometry.location.lat();
                                        document.getElementById('longitude').value = place.geometry.location.lng();
                                    });
                                }
                                google.maps.event.addDomListener(window, 'load', initialize);
                            </script>
                            <script>
                                document.getElementById("headerserviceSearchForm").addEventListener("submit", function (e) {
                                    // Redirect to service tab after submit
                                    this.action = this.action + "#liton_service_list";
                                });
                            </script>


                        </div>
                    </div>
                </div>

                <div class="col header-menu-column menu-color-white">
                    <div class="header-menu d-none d-xl-block">
                        <nav>
                            <div class="ltn__main-menu">
                                <ul>

                                    <li><a href="{{ route('about.index') }}">About Us</a></li>
                                    <li><a href="{{ route('stores.index') }}">Stores</a></li>
                                    <li><a href="{{ route('shop.index') }}">Shop</a></li>
                                    <li><a href="{{ route('contact.index') }}">Contact Us</a></li>

                                    @php
                                        $sessionKey = auth()->check() ? auth()->id() : session()->getId();
                                        $cartCount = \Cart::session($sessionKey)->getContent()->count();
                                    @endphp

                                    <li>
                                        <a href="{{ route('cart.index') }}" class="position-relative">
                                            <i class="fas fa-shopping-cart fa-lg"></i>
                                            @if($cartCount > 0)
                                                <span style="margin-top: 9px; margin-left: -9px; border-radius: 50%;"
                                                    class="badge bg-white position-absolute top-0 start-100 translate-middle">
                                                    {{ $cartCount }}
                                                </span>
                                            @endif
                                        </a>
                                    </li>

                                    @auth
                                        <!-- If user is logged in -->
                                        @if (!Auth::user()->hasRole('user'))
                                            <!-- For admin/vendor/manager -->
                                            <li>
                                                <a href="{{ route('admin.dashboard') }}">
                                                    👤 Dashboard
                                                </a>
                                            </li>
                                        @else
                                            <!-- For basic user -->
                                            <li>
                                                <a href="{{ route('account.profile') }}">
                                                    👤 {{ Auth::user()->name }}
                                                </a>
                                            </li>
                                        @endif

                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button type="submit" class="badge bg-danger" style="margin-top: 22px">
                                                    Logout
                                                </button>
                                            </form>
                                        </li>
                                    @else
                                        <!-- If user is not logged in -->
                                        <li><a href="{{ route('login') }}">Login</a></li>
                                        <li><a href="{{ route('register') }}">Register</a></li>
                                    @endauth


                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <!-- Mobile Menu Button -->
                <div class="mobile-menu-toggle menu-btn-white menu-btn-border--- d-xl-none">
                    <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                        <svg viewBox="0 0 800 600">
                            <path
                                d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200"
                                id="top"></path>
                            <path d="M300,320 L540,320" id="middle"></path>
                            <path
                                d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190"
                                id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) ">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- ltn__header-middle-area end -->
</header>
{{-- <div id="ltn__utilize-cart-menu" class="ltn__utilize ltn__utilize-cart-menu">
    <div class="ltn__utilize-menu-inner ltn__scrollbar">
        <div class="ltn__utilize-menu-head">
            <span class="ltn__utilize-menu-title">Cart</span>
            <button class="ltn__utilize-close">×</button>
        </div>
        <div class="mini-cart-product-area ltn__scrollbar">
            <div class="mini-cart-item clearfix">
                <div class="mini-cart-img">
                    <a href="#"><img src="img/product/1.png" alt="Image"></a>
                    <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                </div>
                <div class="mini-cart-info">
                    <h6><a href="#">Wheel Bearing Retainer</a></h6>
                    <span class="mini-cart-quantity">1 x $65.00</span>
                </div>
            </div>
            <div class="mini-cart-item clearfix">
                <div class="mini-cart-img">
                    <a href="#"><img src="img/product/2.png" alt="Image"></a>
                    <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                </div>
                <div class="mini-cart-info">
                    <h6><a href="#">Brake Conversion Kit</a></h6>
                    <span class="mini-cart-quantity">1 x $85.00</span>
                </div>
            </div>
            <div class="mini-cart-item clearfix">
                <div class="mini-cart-img">
                    <a href="#"><img src="img/product/3.png" alt="Image"></a>
                    <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                </div>
                <div class="mini-cart-info">
                    <h6><a href="#">OE Replica Wheels</a></h6>
                    <span class="mini-cart-quantity">1 x $92.00</span>
                </div>
            </div>
            <div class="mini-cart-item clearfix">
                <div class="mini-cart-img">
                    <a href="#"><img src="img/product/4.png" alt="Image"></a>
                    <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                </div>
                <div class="mini-cart-info">
                    <h6><a href="#">Shock Mount Insulator</a></h6>
                    <span class="mini-cart-quantity">1 x $68.00</span>
                </div>
            </div>
        </div>
        <div class="mini-cart-footer">
            <div class="mini-cart-sub-total">
                <h5>Subtotal: <span>$310.00</span></h5>
            </div>
            <div class="btn-wrapper">
                <a href="cart.php" class="theme-btn-1 btn btn-effect-1">View Cart</a>
                <a href="cart.php" class="theme-btn-2 btn btn-effect-2">Checkout</a>
            </div>
            <p>Free Shipping on All Orders Over $100!</p>
        </div>

    </div>
</div> --}}
<div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
    <div class="ltn__utilize-menu-inner ltn__scrollbar">
        <div class="ltn__utilize-menu-head">
            <div class="site-logo">
                <a href="{{ route('home.index') }}"><img src="{{ asset('web/img/logo.png') }}" alt="Logo"></a>
            </div>
            <button class="ltn__utilize-close">×</button>
        </div>
        <div class="ltn__utilize-menu">
            <ul>

                <li><a href="{{ route('about.index') }}">About Us</a></li>
                <li><a href="{{ route('stores.index') }}">Stores</a></li>
                <li><a href="{{ route('shop.index') }}">Shop</a></li>
                <li><a href="{{ route('contact.index') }}">Contact Us</a></li>


                @auth
                    <!-- If user is logged in -->
                    @if (!Auth::user()->hasRole('user'))
                        <!-- For admin/vendor/manager -->
                        <li>
                            <a href="{{ route('admin.dashboard') }}">
                                Dashboard
                            </a>
                        </li>
                    @else
                        <!-- For basic user -->
                        <li>
                            <a href="#">
                                {{ Auth::user()->name }}
                            </a>
                        </li>
                    @endif

                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="badge bg-danger" style="margin-top: 22px">
                                Logout
                            </button>
                        </form>
                    </li>
                @else
                    <!-- If user is not logged in -->
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endauth


            </ul>
        </div>
        <div class="ltn__utilize-buttons ltn__utilize-buttons-2">
            <ul>
                <li>
                    <a href="{{route('account.profile')}}" title="My Account">
                        <span class="utilize-btn-icon">
                            <i class="far fa-user"></i>
                        </span>
                        My Account
                    </a>
                </li>
                <li>
                    <a href="wishlist.php" title="Wishlist">
                        <span class="utilize-btn-icon">
                            <i class="far fa-heart"></i>
                            <sup>3</sup>
                        </span>
                        Wishlist
                    </a>
                </li>
                <li>
                    <a href="{{route('cart.index')}}" title="Shoping Cart">
                        <span class="utilize-btn-icon">
                            <i class="fas fa-shopping-cart"></i>
                            <sup>{{ $cartCount }}</sup>
                        </span>
                        Shoping Cart
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>