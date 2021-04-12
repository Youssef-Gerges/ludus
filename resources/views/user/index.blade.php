@extends('layouts.user_layout.index')
@section('content')

    <!--====== App Content ======-->
    <div class="app-content">

        <!--====== Primary Slider ======-->
        <div class="s-skeleton s-skeleton--h-640 s-skeleton--bg-grey">
            <div class="owl-carousel primary-style-3" id="hero-slider">
                <div class="hero-slide hero-slide--7">
                    <div class="primary-style-3-wrap">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="slider-content slider-content--animation">

                                        <span class="content-span-1 u-c-white">Update Your Fashion</span>

                                        <span class="content-span-2 u-c-white">10% Discount on Outwear</span>

                                        <span class="content-span-3 u-c-white">Find outwear on best prices</span>

                                        <span class="content-span-4 u-c-white">Starting At

                                            <span class="u-c-brand">$100.00</span></span>

                                        <a class="shop-now-link btn--e-brand" href="{{ route('shop') }}">SHOP NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero-slide hero-slide--8">
                    <div class="primary-style-3-wrap">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="slider-content slider-content--animation">

                                        <span class="content-span-1 u-c-white">Open Your Eyes</span>

                                        <span class="content-span-2 u-c-white">10% Off On Intimates</span>

                                        <span class="content-span-3 u-c-white">Find intimates on best prices</span>

                                        <span class="content-span-4 u-c-white">Starting At

                                            <span class="u-c-brand">$100.00</span></span>

                                        <a class="shop-now-link btn--e-brand" href="{{ route('shop') }}">SHOP NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero-slide hero-slide--9">
                    <div class="primary-style-3-wrap">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="slider-content slider-content--animation">

                                        <span class="content-span-1 u-c-white">Find Top Brands</span>

                                        <span class="content-span-2 u-c-white">10% Off On Outwear</span>

                                        <span class="content-span-3 u-c-white">Find outwear on best prices</span>

                                        <span class="content-span-4 u-c-white">Starting At

                                            <span class="u-c-brand">$100.00</span></span>

                                        <a class="shop-now-link btn--e-brand" href="{{ route('shop') }}">SHOP NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Primary Slider ======-->


        <!--====== Section 1 ======-->
        <div class="u-s-p-y-60">

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="row">
                        @foreach ($featured_categories as $category)
                            <div class="col-lg-4 col-md-4 col-sm-6 u-s-m-b-30">
                                <div class="promotion-o">
                                    <div class="aspect aspect--bg-grey aspect--square">

                                        <img class="aspect__img" src="{{ asset($category->image_path) }}" alt="">
                                    </div>
                                    <div class="promotion-o__content">

                                        <a class="promotion-o__link btn--e-white-brand"
                                            href="{{ route('shop', ['category'=> $category->id]) }}">{{ $category->name }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 1 ======-->


        <!--====== Section 2 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">

                                <a class="i3-banner" href="{{ route('shop') }}">
                                    <div class="aspect aspect--bg-grey-fb aspect--square">

                                        <img class="aspect__img i3-banner__img" src="images/banners/i3-banner-1.jpg" alt="">
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <a class="i3-banner" href="{{ route('shop') }}">
                                            <div class="aspect aspect--bg-grey-fb aspect--1048-334">

                                                <img class="aspect__img i3-banner__img" src="images/banners/i3-banner-2.jpg"
                                                    alt="">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 36.1%">
                                    <div class="col-lg-12">

                                        <a class="i3-banner" href="{{ route('shop') }}">
                                            <div class="aspect aspect--bg-grey-fb aspect--1048-334">

                                                <img class="aspect__img i3-banner__img" src="images/banners/i3-banner-2.jpg"
                                                    alt="">
                                            </div>
                                        </a>
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


        <!--====== Section 3 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Intro ======-->
            <div class="section__intro u-s-m-b-46">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section__text-wrap">
                                <h1 class="section__heading u-c-secondary u-s-m-b-12">RECENT PRODUCTS</h1>

                                <span class="section__span u-c-silver">NEWLY ADDED PRODUCTS</span>
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
                        @foreach ($recent_products as $product)

                            <div class="col-lg-3 col-md-4 col-sm-6 u-s-m-b-30">
                                <div class="product-r u-h-100">
                                    <div class="product-r__container">

                                        <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                            href="{{route('singleProduct', ['product'=>$product->id])}}">

                                            <img class="aspect__img"
                                                src="{{ asset($product->getMasterImageAttribute()->path ?? '') }}"
                                                alt=""></a>
                                        <div class="product-r__action-wrap">
                                            <ul class="product-r__action-list">
                                                {{-- <li>

                                                    <a data-modal="modal" data-modal-id="#add-to-cart" onclick="addToCart( {{ $product->id }} )">
                                                        <i class="fas fa-plus-circle"></i>
                                                    </a>
                                                </li> --}}
                                                <li>

                                                    <a onclick="addToWish({{ $product->id }})">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-r__info-wrap">

                                        <span class="product-r__category">

                                            <a href="{{ route('shop') }}">{{ $product->brand->name }}</a></span>
                                        <div class="product-r__n-p-wrap">

                                            <span class="product-r__name">

                                                <a href="{{route('singleProduct', ['product'=>$product->id])}}">{{ $product->name }}</a></span>

                                            <span class="product-r__price">${{ $product->price }}</span>
                                        </div>

                                        <span class="product-r__description">
                                            {{ $product->short_describtion }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 3 ======-->


        <!--====== Section 4 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Intro ======-->
            <div class="section__intro u-s-m-b-16">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section__text-wrap">
                                <h1 class="section__heading u-c-secondary u-s-m-b-12">BEST SELLING PRODUCT</h1>

                                <span class="section__span u-c-silver u-s-m-b-16">FIND PRODUCTS THAT ARE MOST SELLING</span>
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
                        <div class="col-lg-12">
                            <div class="filter-category-container">
                                <div class="filter__category-wrapper">

                                    <button class="btn filter__btn filter__btn--style-2 js-checked" type="button"
                                        data-filter="*">ALL</button>
                                </div>
                                <div class="filter__category-wrapper">
                                    @foreach ($recent_brands as $brand)

                                        <button class="btn filter__btn filter__btn--style-2" type="button"
                                            data-filter=".{{ $brand->id }}">{{ Str::upper($brand->name) }}</button>
                                </div>
                                <div class="filter__category-wrapper">
                                    @endforeach

                                </div>
                            </div>
                            <div class="filter__grid-wrapper u-s-m-t-30">
                                <div class="row">
                                    @foreach ($recent_brands as $brand)
                                    @foreach ($brand->products()->limit(3)->get() as $product)
                                        <div
                                            class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item {{ $brand->id }}">
                                            <div class="product-bs">

                                                    <div class="product-bs__container">
                                                        <div class="product-bs__wrap">

                                                            <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                                                href="{{route('singleProduct', ['product'=>$product->id])}}">

                                                                <img class="aspect__img"
                                                                    src="{{ asset($product->getMasterImageAttribute()->path ?? '') }}"
                                                                    alt=""></a>
                                                            <div class="product-bs__action-wrap">
                                                                <ul class="product-bs__action-list">
                                                                    {{-- <li>

                                                                        <a data-modal="modal"
                                                                            data-modal-id="#add-to-cart"><i
                                                                                class="fas fa-plus-circle"></i></a>
                                                                    </li> --}}
                                                                    <li>

                                                                        <a onclick="addToWish({{ $product->id }})"><i
                                                                                class="fas fa-heart"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <span class="product-bs__category">

                                                            <a
                                                                href="{{ route('shop') }}">{{ $product->brand->name }}</a></span>

                                                        <span class="product-bs__name">

                                                            <a href="{{route('singleProduct', ['product'=>$product->id])}}">{{ $product->name }}</a></span>
                                                        <div class="product-bs__rating gl-rating-style"><i
                                                            @php $rating = $product->getRateAttribute() @endphp
                                                            @foreach(range(1,5) as $i)
                                                                @if($rating > 0)
                                                                    @if($rating >= 0.5)
                                                                        <i class="fas fa-star"></i>
                                                                    @else
                                                                        <i class="fas fa-star-half-alt"></i>
                                                                    @endif
                                                                @else
                                                                    <i class="far fa-star"></i>
                                                                @endif
                                                                @php $rating-- @endphp
                                                            @endforeach

                                                            <span class="product-bs__review">(23)</span>
                                                        </div>
                                                        @if($product->getActiveDiscountAttribute()->count() > 0)
                                                            <span
                                                                class="product-bs__price">${{ floatval($product->price) * floatval($product->getActiveDiscountAttribute()->first()->value) }}

                                                                <span
                                                                    class="product-bs__discount">${{ $product->price }}</span></span>
                                                        @else
                                                            <span class="product-bs__price">${{ $product->price }}</span>
                                                        @endif
                                                    </div>

                                                </div>
                                            </div>
                                            @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="load-more">

                                <button class="btn btn--e-brand" type="button"
                                    onclick="window.location.href='{{ route('shop') }}'">Load More</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 4 ======-->


    </div>
    <!--====== End - App Content ======-->

    <!--====== Modal Section ======-->
{{--
    <!--====== Add to Cart Modal ======-->
    <div class="modal fade" id="add-to-cart">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-radius modal-shadow">

                <button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="success u-s-m-b-30">
                                <div class="success__text-wrap"><i class="fas fa-check"></i>

                                    <span>Item is added successfully!</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="s-option">

                                <span class="s-option__text">1 item (s) in your cart</span>
                                <div class="s-option__link-box">

                                    <a class="s-option__link btn--e-white-brand-shadow" data-dismiss="modal">CONTINUE
                                        SHOPPING</a>

                                    <a class="s-option__link btn--e-white-brand-shadow" href="cart.html">VIEW CART</a>

                                    <a class="s-option__link btn--e-brand-shadow" href="checkout.html">PROCEED TO
                                        CHECKOUT</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Add to Cart Modal ======--> --}}


@endsection

@section('footer')
@parent

<script>
    function addToWish (id) {
        @auth

        $.ajax({
        type: "POST",
        url: '{{ route('wish.add') }}',
        data: {
            'product_id': id,
            '_token': '{{ csrf_token() }}'
        }}).done(function (){
            alert('added to wishlist');
        });
        @else
            window.location.href = '{{ route('login') }}'
        @endauth
    }
</script>
@endsection
