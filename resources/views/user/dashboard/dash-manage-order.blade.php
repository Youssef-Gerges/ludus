@extends('layouts.user_layout.index')
@Section('content')
@include('layouts.user_layout.dashboard.side')

                                <div class="col-lg-9 col-md-12">
                                    <h1 class="dash__h1 u-s-m-b-30">Order Details</h1>
                                    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                        <div class="dash__pad-2">
                                            <div class="dash-l-r">
                                                <div>
                                                    <div class="manage-o__text-2 u-c-secondary">Order #{{ $invoice->code }}</div>
                                                    <div class="manage-o__text u-c-silver">Placed on {{ $invoice->created_at }}</div>
                                                </div>
                                                <div>
                                                    <div class="manage-o__text-2 u-c-silver">Total:

                                                        <span class="manage-o__text-2 u-c-secondary">${{ $invoice->total_price }}</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                        <div class="dash__pad-2">
                                            <div class="manage-o">
                                                <div class="manage-o__header u-s-m-b-30">
                                                    <div class="manage-o__icon"><i class="fas fa-box u-s-m-r-5"></i>

                                                        <span class="manage-o__text">Package</span></div>
                                                </div>
                                                <div class="dash-l-r">
                                                    @if($invoice->status == 2)
                                                    <div class="manage-o__text u-c-secondary">Delivered on {{ $invoice->delivered_on }}</div>
                                                    @endif
                                                    <div class="manage-o__icon"><i class="fas fa-truck u-s-m-r-5"></i>

                                                        <span class="manage-o__text">Standard</span></div>
                                                </div>
                                                <div class="manage-o__timeline">
                                                    <div class="timeline-row">
                                                        <div class="col-lg-4 u-s-m-b-30">
                                                            <div class="timeline-step">
                                                                <div class="timeline-l-i {{ $invoice->status>=0 && $invoice->status!=3?'timeline-l-i--finish':null }}">

                                                                    <span class="timeline-circle"></span></div>

                                                                <span class="timeline-text">Processing</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 u-s-m-b-30">
                                                            <div class="timeline-step">
                                                                <div class="timeline-l-i {{ $invoice->status>=1 && $invoice->status!=3?'timeline-l-i--finish':null }}">

                                                                    <span class="timeline-circle"></span></div>

                                                                <span class="timeline-text">Shipped</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 u-s-m-b-30">
                                                            <div class="timeline-step">
                                                                <div class="timeline-l-i {{ $invoice->status==2? 'timeline-l-i--finish':null }}">

                                                                    <span class="timeline-circle"></span></div>

                                                                <span class="timeline-text">Delivered</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @foreach ($invoice->orders as $order)

                                                <div class="manage-o__description">
                                                    <div class="description__container">
                                                        <div class="description__img-wrap">

                                                            <img class="u-img-fluid" src="{{ asset($order->product->getMasterImageAttribute()??"") }}" alt=""></div>
                                                        <div class="description-title">{{ $order->product->name }}</div>
                                                    </div>
                                                    <div class="description__info-wrap">
                                                        <div>

                                                            <span class="manage-o__text-2 u-c-silver">Quantity:

                                                                <span class="manage-o__text-2 u-c-secondary">{{ $order->count }}</span></span></div>
                                                        <div>

                                                            <span class="manage-o__text-2 u-c-silver">Total:

                                                                <span class="manage-o__text-2 u-c-secondary">${{ $order->price * $order->count }}</span></span></div>
                                                    </div>
                                                </div>

                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
                                                <div class="dash__pad-3">
                                                    <h2 class="dash__h2 u-s-m-b-8">Shipping Address</h2>
                                                    <h2 class="dash__h2 u-s-m-b-8">{{ $invoice->address->name }}</h2>

                                                    <span class="dash__text-2">{{ $invoice->address->address . ' - ' . $invoice->address->zip . ' - ' . $invoice->address->region}}</span>

                                                    <span class="dash__text-2">{{ $invoice->address->phone }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="dash__box dash__box--bg-white dash__box--shadow u-h-100">
                                                <div class="dash__pad-3">
                                                    <h2 class="dash__h2 u-s-m-b-8">Total Summary</h2>
                                                    <div class="dash-l-r u-s-m-b-8">
                                                        <div class="manage-o__text-2 u-c-secondary">Subtotal</div>
                                                        <div class="manage-o__text-2 u-c-secondary">${{ $invoice->total_price }}</div>
                                                    </div>
                                                    <div class="dash-l-r u-s-m-b-8">
                                                        <div class="manage-o__text-2 u-c-secondary">Shipping Fee</div>
                                                        <div class="manage-o__text-2 u-c-secondary">${{ $invoice->shipping_fee }}</div>
                                                    </div>
                                                    <div class="dash-l-r u-s-m-b-8">
                                                        <div class="manage-o__text-2 u-c-secondary">Total</div>
                                                        <div class="manage-o__text-2 u-c-secondary">${{ $invoice->total_price + $invoice->shipping_fee }}</div>
                                                    </div>

                                                    <span class="dash__text-2">Paid by Cash on Delivery</span>
                                                </div>
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

@endsection
