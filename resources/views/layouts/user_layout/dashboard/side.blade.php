

    <!--====== App Content ======-->
    <div class="app-content">

        <!--====== Section 1 ======-->
        <div class="u-s-p-y-60">

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="breadcrumb">
                        <div class="breadcrumb__wrap">
                            <ul class="breadcrumb__list">
                                <li class="has-separator">

                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="is-marked">

                                    <a href="{{ route('userdashboard.home') }}">My Account</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section 1 ======-->


        <!--====== Section 2 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="dash">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-12">

                                <!--====== Dashboard Features ======-->
                                <div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
                                    <div class="dash__pad-1">

                                        <span class="dash__text u-s-m-b-16">Hello, {{ request()->user()->name }}</span>
                                        <ul class="dash__f-list">
                                            <li>

                                                <a class="{{ route('userdashboard.home') == request()->url()?'dash-active':null }}" href="{{ route('userdashboard.home') }}">Manage My Account</a>
                                            </li>
                                            <li>

                                                <a class="{{ route('userdashboard.myaccount') == request()->url()?'dash-active':null }}" href="{{ route('userdashboard.myaccount') }}">My Profile</a>
                                            </li>
                                            <li>

                                                <a class="{{ route('userdashboard.address-book') == request()->url()?'dash-active':null }}" href="{{ route('userdashboard.address-book') }}">Address Book</a>
                                            </li>
                                            <li>

                                                <a class="{{ route('userdashboard.orders') == request()->url()?'dash-active':null }}" href="{{ route('userdashboard.orders') }}">My Orders</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="dash__box dash__box--bg-white dash__box--shadow dash__box--w">
                                    <div class="dash__pad-1">
                                        <ul class="dash__w-list">
                                            <li>
                                                <div class="dash__w-wrap">

                                                    <span class="dash__w-icon dash__w-icon-style-1"><i
                                                            class="fas fa-cart-arrow-down"></i></span>

                                                    <span class="dash__w-text">{{ $orders_count }}</span>

                                                    <span class="dash__w-name">Orders Placed</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="dash__w-wrap">

                                                    <span class="dash__w-icon dash__w-icon-style-3"><i
                                                            class="far fa-heart"></i></span>

                                                    <span class="dash__w-text">{{ $wishlist_count }}</span>

                                                    <span class="dash__w-name">Wishlist</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--====== End - Dashboard Features ======-->


                            </div>

