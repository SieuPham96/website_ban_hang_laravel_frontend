<header id="header">
    <!--header-->
    <div class="header_top">
        <!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li>
                                <a href="">
                                    <i class="fa fa-phone"></i>
                                    {{ getConfigValueFromSettingTable('phone_contact') }}
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa fa-envelope"></i>
                                    {{ getConfigValueFromSettingTable('email') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="{{ getConfigValueFromSettingTable('facebook_link') }}">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ getConfigValueFromSettingTable('twitter_link') }}">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ getConfigValueFromSettingTable('linkendin_link') }}">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ getConfigValueFromSettingTable('dribble_link') }}">
                                    <i class="fa fa-dribbble"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ getConfigValueFromSettingTable('google_plus') }}">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--header-middle-->
    <div class="header-middle">
        <div class="container">
            <div class="row">
                <div class="col-md-4 clearfix">
                    <div class="logo pull-left">
                        <a href="{{ route('home') }}"><img src="/eshopper/images/home/logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-md-8 clearfix">
                    <div class="shop-menu clearfix pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href=""><i class="fa fa-star"></i>Yêu thích</a></li>
                            <?php
                                $customerId = session()->get('customer_id');
                                $shippingId = session()->get('shipping_id');
                                if( $customerId !== null && $shippingId !== null ){
                            ?>
                                    <li><a href="{{ route('order') }}"><i class="fa fa-crosshairs"></i>Thanh toán</a></li>
                            <?php
                                }
                                elseif( $customerId !== null && $shippingId == null ){
                                ?>
                                    <li><a href="{{ route('checkout') }}"><i class="fa fa-crosshairs"></i>Thanh toán</a></li>
                            <?php
                                }
                                else {
                            ?>
                                    <li><a href="{{ route('loginCheckout') }}"><i class="fa fa-crosshairs"></i>Thanh toán</a></li>
                            <?php
                                }
                            ?>

                                <li><a href="{{ route('showCart') }}"><i class="fa fa-shopping-cart"></i>Giỏ hàng</a></li>
                            <?php
                                $customerId = session()->get('customer_id');
                                if( !empty($customerId)) {
                            ?>    
                                    <li><a href="{{ route('logoutCheckout') }}"><i class="fa fa-lock"></i>Đăng xuất</a></li>
                            <?php
                                }
                                else {
                            ?>
                                    <li><a href="{{ route('loginCheckout') }}"><i class="fa fa-lock"></i>Đăng nhập</a></li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--header-bottom-->
    <div class="header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    
                    {{-- main menu --}}
                    @include('components.main_menu')

                </div>
                <div class="col-sm-4">
                    <form action="{{ route('search') }}" method="post">
                        @csrf
                        <div class="pull-right">
                            <input type="text" name="keywords_submit" style="line-height: 24px; outline: none" placeholder="Tìm kiếm" />
                            <input type="submit" name="search_item" class="btn btn-info btn-sm" value="Search" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>