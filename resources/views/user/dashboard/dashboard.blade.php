@extends('layouts.user_layout.index')
@section('content')
@include('layouts.user_layout.dashboard.side')

                            <div class="col-lg-9 col-md-12">
                                <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                    <div class="dash__pad-2">
                                        <h1 class="dash__h1 u-s-m-b-14">Manage My Account</h1>

                                        <span class="dash__text u-s-m-b-30">From your My Account Dashboard you have the
                                            ability to view a snapshot of your recent account activity and update your
                                            account information. Select a link below to view or edit information.</span>
                                        <div class="row">
                                            <div class="col-lg-6 u-s-m-b-30">
                                                <div class="dash__box dash__box--bg-grey dash__box--shadow-2 u-h-100">
                                                    <div class="dash__pad-3">
                                                        <h2 class="dash__h2 u-s-m-b-8">PERSONAL PROFILE</h2>
                                                        <div class="dash__link dash__link--secondary u-s-m-b-8">

                                                            <a href="dash-edit-profile.html">Edit</a>
                                                        </div>

                                                        <span class="dash__text">{{ request()->user()->name }}</span>

                                                        <span class="dash__text">{{ request()->user()->email }}</span>
                                                        <div class="dash__link dash__link--secondary u-s-m-t-8">

                                                            <a data-modal="modal" data-modal-id="#dash-newsletter">Subscribe
                                                                Newsletter</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 u-s-m-b-30">
                                                <div class="dash__box dash__box--bg-grey dash__box--shadow-2 u-h-100">
                                                    <div class="dash__pad-3">
                                                        <h2 class="dash__h2 u-s-m-b-8">ADDRESS BOOK</h2>

                                                        <span class="dash__text-2 u-s-m-b-8">Default Shipping Address</span>
                                                        <div class="dash__link dash__link--secondary u-s-m-b-8">

                                                            <a href="dash-address-book.html">Edit</a>
                                                        </div>
                                                        @if($default_address != null)
                                                        <span class="dash__text">{{ $default_address->address . ' - ' . $default_address->region . ' - ' . $default_address->phone}}</span>
                                                        @else
                                                        <span class="dash__text">click edit to add default address</span>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dash__box dash__box--shadow dash__box--bg-white dash__box--radius">
                                    <h2 class="dash__h2 u-s-p-xy-20">RECENT ORDERS</h2>
                                    <div class="dash__table-wrap gl-scroll">
                                        <table class="dash__table">
                                            <thead>
                                                <tr>
                                                    <th>Order #</th>
                                                    <th>Placed On</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orders as $order)

                                                <tr>
                                                    <td>{{ $order->code }}</td>
                                                    <td>{{ $order->created_at }}</td>
                                                    <td>
                                                        <div class="dash__table-total">

                                                            <span>${{ $order->total_price }}</span>
                                                            <div class="dash__link dash__link--brand">

                                                                <a href="dash-manage-order.html">MANAGE</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                @endforeach
                                            </tbody>
                                        </table>
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


@endsection
