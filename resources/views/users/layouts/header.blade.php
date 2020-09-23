<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> yenrion9941@gmail.com</li>
                            <li>@lang('messages.user_layouts.free_ship')</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-google"></i></a>
                        </div>
                        <div class="header__top__right__language">
                            <img src="user_layouts/img/language.png" alt="">
                            <div>English</div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a href="{{ route('language.index', ['vi']) }}">Viet Nam</a></li>
                                <li><a href="{{ route('language.index', ['en']) }}">English</a></li>
                            </ul>
                        </div>
                        @guest
                            <a href="{{ route('login') }}"><i
                                    class="fa fa-user"></i>@lang('messages.user_layouts.login')</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"><i class="fa fa-user"></i>@lang('messages.register')
                                </a>
                            @endif
                        @else
                            <div class="header__top__right__language">
                                <div>{{ Auth::user()->user_name }}</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li>
                                        <a href="{{ route('logout') }}" id="btn_logout">@lang('messages.logout')
                                        </a>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </ul>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="#"><img src="user_layouts/img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="#">@lang('messages.user_layouts.home')</a></li>
                        <li><a href="#">@lang('messages.user_layouts.shop')</a></li>
                        <li><a href="#">Cart</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="#">@lang('messages.user_layouts.shop_detail')</a></li>
                                <li><a href="{{route('cart.show')}}">@lang('messages.user_layouts.shop_cart')</a></li>
                                <li><a href="#">@lang('messages.user_layouts.checkout')</a></li>
                                <li><a href="#">@lang('messages.user_layouts.blog_detail')</a></li>
                            </ul>
                        </li>
                        <li><a href="#">@lang('messages.user_layouts.suggest')</a></li>
                        <li><a href="#">@lang('messages.user_layouts.contact')</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                        <li><a href="{{route('cart.show')}}"><i class="fa fa-shopping-bag"></i>
                                <span>{{ session()->has('cart') ? session()->get('cart')->totalQuantity : '0' }}</span></a>
                        </li>
                    </ul>
                    <div class="header__cart__price">@lang('messages.user_layouts.item'): <span>$150.00</span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
