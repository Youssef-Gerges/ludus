@extends('layouts.user_layout.index')
@section('content')
    @include('layouts.user_layout/dashboard/side')

    <div class="col-lg-9 col-md-12">
        <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
            <div class="dash__pad-2">
                <h1 class="dash__h1 u-s-m-b-14">My Orders</h1>

                <span class="dash__text u-s-m-b-30">Here you can see all products that have been delivered.</span>
                <div class="m-order__list">
                    @foreach ($invoices as $invoice)

                        <div class="m-order__get">
                            <div class="manage-o__header u-s-m-b-30">
                                <div class="dash-l-r">
                                    <div>
                                        <div class="manage-o__text-2 u-c-secondary">Order #{{ $invoice->code }}</div>
                                        <div class="manage-o__text u-c-silver">Placed on {{ $invoice->created_at }}</div>
                                    </div>
                                    <div>
                                        @switch($invoice->status)
                                            @case(0)

                                                <span class="manage-o__badge badge--processing">Processing</span>
                                            @break
                                            @case(1)

                                                <span class="manage-o__badge badge--shipped">Shipped</span>
                                            @break
                                            @case(2)

                                                <span class="manage-o__badge badge--delivered">Delivered</span>
                                            @break
                                            @case(3)

                                                <span class="manage-o__badge badge--delivered">Canceled</span>
                                            @break

                                        @endswitch
                                    </div>

                                    <div>

                                        <div class="dash__link dash__link--brand">

                                            <a href="{{ route('userdashboard.manageInvoice', ['invoice'=> $invoice->id]) }}">MANAGE</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @foreach ($invoice->orders as $order)

                            <div class="manage-o__description" style="margin-top: 10px;">
                                <div class="description__container">
                                    <div class="description__img-wrap">

                                        <img class="u-img-fluid" src="{{ asset($order->product->getMasterImageAttribute()??"") }}" alt="">
                                    </div>
                                    <div class="description-title">{{ $order->product->name }}</div>
                                </div>
                                <div class="description__info-wrap">
                                    <div>

                                        <span class="manage-o__text-2 u-c-silver">Quantity:

                                            <span class="manage-o__text-2 u-c-secondary">{{ $order->count }}</span></span>
                                    </div>
                                    <div>

                                        <span class="manage-o__text-2 u-c-silver">Total:

                                            <span class="manage-o__text-2 u-c-secondary">${{ $order->price * $order->count }}</span></span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 2 ======-->
    </div>
    <!--====== End - App Content ======-->


    <!--====== Main Footer ======-->
    <footer>
        <div class="outer-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="outer-footer__content u-s-m-b-40">

                            <span class="outer-footer__content-title">Contact Us</span>
                            <div class="outer-footer__text-wrap"><i class="fas fa-home"></i>

                                <span>4247 Ashford Drive Virginia VA-20006 USA</span>
                            </div>
                            <div class="outer-footer__text-wrap"><i class="fas fa-phone-volume"></i>

                                <span>(+0) 900 901 904</span>
                            </div>
                            <div class="outer-footer__text-wrap"><i class="far fa-envelope"></i>

                                <span>contact@domain.com</span>
                            </div>
                            <div class="outer-footer__social">
                                <ul>
                                    <li>

                                        <a class="s-fb--color-hover" href="#"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>

                                        <a class="s-tw--color-hover" href="#"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>

                                        <a class="s-youtube--color-hover" href="#"><i class="fab fa-youtube"></i></a>
                                    </li>
                                    <li>

                                        <a class="s-insta--color-hover" href="#"><i class="fab fa-instagram"></i></a>
                                    </li>
                                    <li>

                                        <a class="s-gplus--color-hover" href="#"><i class="fab fa-google-plus-g"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="outer-footer__content u-s-m-b-40">

                                    <span class="outer-footer__content-title">Information</span>
                                    <div class="outer-footer__list-wrap">
                                        <ul>
                                            <li>

                                                <a href="cart.html">Cart</a>
                                            </li>
                                            <li>

                                                <a href="dashboard.html">Account</a>
                                            </li>
                                            <li>

                                                <a href="shop-side-version-2.html">Manufacturer</a>
                                            </li>
                                            <li>

                                                <a href="dash-payment-option.html">Finance</a>
                                            </li>
                                            <li>

                                                <a href="shop-side-version-2.html">Shop</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="outer-footer__content u-s-m-b-40">
                                    <div class="outer-footer__list-wrap">

                                        <span class="outer-footer__content-title">Our Company</span>
                                        <ul>
                                            <li>

                                                <a href="about.html">About us</a>
                                            </li>
                                            <li>

                                                <a href="contact.html">Contact Us</a>
                                            </li>
                                            <li>

                                                <a href="index.html">Sitemap</a>
                                            </li>
                                            <li>

                                                <a href="dash-my-order.html">Delivery</a>
                                            </li>
                                            <li>

                                                <a href="shop-side-version-2.html">Store</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="outer-footer__content">

                            <span class="outer-footer__content-title">Join our Newsletter</span>
                            <form class="newsletter">
                                <div class="u-s-m-b-15">
                                    <div class="radio-box newsletter__radio">

                                        <input type="radio" id="male" name="gender">
                                        <div class="radio-box__state radio-box__state--primary">

                                            <label class="radio-box__label" for="male">Male</label>
                                        </div>
                                    </div>
                                    <div class="radio-box newsletter__radio">

                                        <input type="radio" id="female" name="gender">
                                        <div class="radio-box__state radio-box__state--primary">

                                            <label class="radio-box__label" for="female">Female</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="newsletter__group">

                                    <label for="newsletter"></label>

                                    <input class="input-text input-text--only-white" type="text" id="newsletter"
                                        placeholder="Enter your Email">

                                    <button class="btn btn--e-brand newsletter__btn" type="submit">SUBSCRIBE</button>
                                </div>

                                <span class="newsletter__text">Subscribe to the mailing list to receive updates on
                                    promotions, new arrivals, discount and coupons.</span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lower-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="lower-footer__content">
                            <div class="lower-footer__copyright">

                                <span>Copyright © 2018</span>

                                <a href="index.html">Reshop</a>

                                <span>All Right Reserved</span>
                            </div>
                            <div class="lower-footer__payment">
                                <ul>
                                    <li><i class="fab fa-cc-stripe"></i></li>
                                    <li><i class="fab fa-cc-paypal"></i></li>
                                    <li><i class="fab fa-cc-mastercard"></i></li>
                                    <li><i class="fab fa-cc-visa"></i></li>
                                    <li><i class="fab fa-cc-discover"></i></li>
                                    <li><i class="fab fa-cc-amex"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    </div>
    <!--====== End - Main App ======-->

@endsection
