@extends('layouts.user_layout.index')
@section('content')
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

                                        <a href="{{ route('home') }}">Home</a></li>
                                    <li class="is-marked">

                                        <a href="{{ route('wish.view') }}">Wishlist</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section 1 ======-->
            @if($items->count() == 0)
                            <!--====== Section 1 ======-->
            <div class="u-s-p-y-60">

                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 u-s-m-b-30">
                                <div class="empty">
                                    <div class="empty__wrap">

                                        <span class="empty__big-text">EMPTY</span>

                                        <span class="empty__text-1">No items found on your wishlist.</span>

                                        <a class="empty__redirect-link btn--e-brand" href="{{ route('shop') }}">CONTINUE SHOPPING</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section Content ======-->
            </div>
            <!--====== End - Section 1 ======-->

            @else

            <!--====== Section 2 ======-->
            <div class="u-s-p-b-60">

                <!--====== Section Intro ======-->
                <div class="section__intro u-s-m-b-60">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section__text-wrap">
                                    <h1 class="section__heading u-c-secondary">Wishlist</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section Intro ======-->


                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                @foreach ($items as $item)
                                @php
                                    $product = App\Models\Product::find($item->id)
                                @endphp

                                <!--====== Wishlist Product ======-->
                                <div class="w-r u-s-m-b-30">
                                    <div class="w-r__container">
                                        <div class="w-r__wrap-1">
                                            <div class="w-r__img-wrap">

                                                <img class="u-img-fluid" src="{{ asset($product->getMasterImageAttribute()->path ?? "") }}" alt=""></div>
                                            <div class="w-r__info">

                                                <span class="w-r__name">

                                                    <a href="{{ route('singleProduct', ['product'=> $product->id]) }}">{{ $product->name }}</a></span>

                                                <span class="w-r__category">

                                                    <a href="{{ route('shop', ['brand'=>$product->brand->id]) }}">{{ $product->brand->name }}</a></span>

                                                    @if($product->getActiveDiscountAttribute()->count() > 0)
                                                    <span
                                                        class="w-r__price">${{ floatval($product->price) * floatval($product->getActiveDiscountAttribute()->first()->value) }}

                                                        <span
                                                            class="w-r__discount">${{ $product->price }}</span></span>
                                                @else
                                                    <span class="w-r__price">${{ $product->price }}</span>
                                                @endif


                                                </div>
                                        </div>
                                        <div class="w-r__wrap-2">

                                            <a class="w-r__link btn--e-transparent-platinum-b-2" href="{{ route('singleProduct', ['product'=> $product->id]) }}">VIEW</a>
                                            <form method="POST" action="{{ route('wish.remove') }}" id="{{ $item->rowId }}" style="display: none">
                                                @method('DELETE')
                                                @csrf
                                                <input type="hidden" name="rowId" value="{{ $item->rowId }}" />
                                            </form>
                                                <a class="w-r__link btn--e-transparent-platinum-b-2" onclick="$('#{{ $item->rowId }}').submit()">REMOVE</a></div>
                                    </div>
                                </div>
                                <!--====== End - Wishlist Product ======-->
                                @endforeach

                            </div>
                            <div class="col-lg-12">
                                <div class="route-box">
                                    <div class="route-box__g">

                                        <a class="route-box__link" href="{{ route('shop') }}"><i class="fas fa-long-arrow-alt-left"></i>

                                            <span>CONTINUE SHOPPING</span></a></div>
                                    <div class="route-box__g">

                                        <a class="route-box__link" href="{{ route('wish.destroy') }}"><i class="fas fa-trash"></i>

                                            <span>CLEAR WISHLIST</span></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section Content ======-->
            </div>
            <!--====== End - Section 2 ======-->

            @endif
        </div>
        <!--====== End - App Content ======-->
@endsection
