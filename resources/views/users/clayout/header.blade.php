<header class="header clearfix">
    <button type="button" id="toggleMenu" class="toggle_menu">
        <i class='uil uil-bars'></i>
    </button>
    <button id="collapse_menu" class="collapse_menu">
        <i class="uil uil-bars collapse_menu--icon "></i>
        <span class="collapse_menu--label"></span>
    </button>
    <div class="main_logo" id="logo">
        <a href="index.html"><img src="images/logo.svg" alt=""></a>
        <a href="index.html"><img class="logo-inverse" src="images/ct_logo.svg" alt=""></a>
    </div>
    <div class="top-category">
        <div class="ui compact menu cate-dpdwn">
            <div class="ui simple dropdown item">
                <a href="#" class="option_links p-0" title="categories"><i class="uil uil-apps"></i></a>
                <div class="menu dropdown_category5">
                    <a href="#" class="item channel_item">Development</a>
                    <a href="#" class="item channel_item">Business</a>
                    <a href="#" class="item channel_item">Finance & Accounting</a>
                    <a href="#" class="item channel_item">IT & Software</a>
                    <a href="#" class="item channel_item">Office Productivity</a>
                    <a href="#" class="item channel_item">Personal Development</a>
                    <a href="#" class="item channel_item">Design</a>
                    <a href="#" class="item channel_item">Marketing</a>
                    <a href="#" class="item channel_item">Lifestyle</a>
                    <a href="#" class="item channel_item">Photography</a>
                    <a href="#" class="item channel_item">Health & Fitness</a>
                    <a href="#" class="item channel_item">Music</a>
                    <a href="#" class="item channel_item">Teaching & Academics</a>
                </div>
            </div>
        </div>
    </div>
    <div class="search120">
        <div class="ui search">
            <div class="ui left icon input swdh10">
                <form action="{{ route('shop.home') }}" method="GET">
                    <input class="prompt srch10" type="text" name="keyword" placeholder="Nhập..">
                    <button class="btn btn-red" type="submit"><i class='bx bx-search'></i></button>
                </form>
            </div>
        </div>
    </div>
    <div class="header_right">
        <ul>
            
            <li>
                <a href="{{ route('cart') }}" class="option_links cart-item-count" title="cart"><i
                        class='uil uil-shopping-cart-alt'></i><span class="noti_count cart-quantity">
                        {{ count((array) session('cart')) }}</span></a>
            </li>
            <li class="ui dropdown">
                <a href="#" class="option_links" title="Messages"><i class='uil uil-envelope-alt'></i><span
                        class="noti_count">0</span></a>
                <div class="menu dropdown_ms">
                    <a href="#" class="channel_my item">

                    </a>
                    <a href="#" class="channel_my item">

                    </a>
                    <a href="#" class="channel_my item">

                    </a>
                    <a class="vbm_btn" href="instructor_messages.html">View All <i class='uil uil-arrow-right'></i></a>
                </div>
            </li>

            <li class="ui dropdown">
                <a href="#" class="opts_account" title="Account">
                    @if (Auth::guard('members')->check())
                        <img src="{{ asset(Auth::guard('members')->user()->image) }}"
                            alt="{{ Auth::guard('members')->user()->name }}">
                    @else
                        <h6><img src="{{ asset('https://cdn.pixabay.com/photo/2017/06/21/07/51/icon-2426371_1280.png') }}"
                                alt=""></h6>
                    @endif
                </a>
                <div class="menu dropdown_account">
                    <div class="channel_my">
                        <div class="profile_link">
                            <div class="pd_content">
                                <div class="rhte85">
                                    @if (Auth::guard('members')->check())
                                        <h6>{{ Auth::guard('members')->user()->name }}</h6>
                                    @else
                                        <p>
                                            <a href="{{ route('login-shop') }}">Đăng nhập</a>
                                        </p>
                                    @endif
                                </div>
                                @if (Auth::guard('members')->check())
                                    <span>{{ Auth::guard('members')->user()->email }}</span>
                                @else
                                    <span></span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <a href="setting.html" class="item channel_item"></a>
                    @if (Auth::guard('members')->check())
                        <a href="{{ route('logout-shop') }}" class="item channel_item" id="hbg">Đăng xuất</a>
                    @else
                        <span></span>
                    @endif
                </div>
            </li>
        </ul>
    </div>
</header>
