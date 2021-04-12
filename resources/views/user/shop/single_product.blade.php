@extends('layouts.user_layout.index')
@section('content')
    <!--====== App Content ======-->
    <div class="app-content">

        <!--====== Section 1 ======-->
        <div class="u-s-p-t-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">

                        <!--====== Product Breadcrumb ======-->
                        <div class="pd-breadcrumb u-s-m-b-30">
                            <ul class="pd-breadcrumb__list">
                                <li class="has-separator">

                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="is-marked">

                                    <a
                                        href="{{ route('shop', ['brand' => $product->brand->id]) }}">{{ $product->brand->name }}</a>
                                </li>
                            </ul>
                        </div>
                        <!--====== End - Product Breadcrumb ======-->


                        <!--====== Product Detail Zoom ======-->
                        <div class="pd u-s-m-b-30">
                            <div class="slider-fouc pd-wrap">
                                <div id="pd-o-initiate">
                                    @foreach ($product->images as $image)

                                        <div class="pd-o-img-wrap" data-src="{{ asset($image->path) }}">

                                            <img class="u-img-fluid" src="{{ asset($image->path) }}"
                                                data-zoom-image="{{ asset($image->path) }}" alt="">
                                        </div>
                                    @endforeach
                                </div>

                                <span class="pd-text">Click for larger zoom</span>
                            </div>
                            <div class="u-s-m-t-15">
                                <div class="slider-fouc">
                                    <div id="pd-o-thumbnail">
                                        @foreach ($product->images as $image)
                                            <div>

                                                <img class="u-img-fluid" src="{{ asset($image->path) }}" alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--====== End - Product Detail Zoom ======-->
                    </div>
                    <div class="col-lg-7">
                        @if (session()->has('status'))
                        <span class="gl-label u-s-m-b-30" style="color: green">
                            {{ session('status') }}
                        </span>

                    @endif

                        <!--====== Product Right Side Details ======-->
                        <div class="pd-detail">
                            <div>

                                <span class="pd-detail__name">{{ $product->name }}</span>
                            </div>
                            <div>
                                <div class="pd-detail__inline">
                                    @if ($product->getActiveDiscountAttribute()->count() > 0)
                                        <span
                                            class="pd-detail__price">${{ floatval($product->price) * floatval($product->getActiveDiscountAttribute()->first()->value) }}
                                            <span
                                                class="pd-detail__discount">({{ floatval($product->getActiveDiscountAttribute()->first()->value) * 100 }}
                                                % OFF)</span><del class="pd-detail__del">${{ $product->price }}</del>
                                        @else
                                            <span class="pd-detail__price">${{ $product->price }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="u-s-m-b-15">
                                <div class="pd-detail__rating gl-rating-style">
                                    @php $rat = $rating @endphp
                                    @foreach (range(1, 5) as $i)
                                        @if ($rat > 0)
                                            @if ($rat >= 0.5)
                                                <i class="fas fa-star"></i>
                                            @else
                                                <i class="fas fa-star-half-alt"></i>
                                            @endif
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                        @php $rat-- @endphp
                                    @endforeach

                                    <span class="pd-detail__review u-s-m-l-4">

                                        <a data-click-scroll="#view-review">{{ $product->reviews->count() }}
                                            Reviews</a></span>
                                </div>
                            </div>
                            <div class="u-s-m-b-15">
                                <div class="pd-detail__inline">

                                    <span class="pd-detail__stock">{{ $product->stock }} in stock</span>

                                </div>
                            </div>
                            <div class="u-s-m-b-15">

                                <span class="pd-detail__preview-desc">{{ $product->short_describtion }}</span>
                            </div>
                            <div class="u-s-m-b-15">
                                <div class="pd-detail__inline">

                                    <span class="pd-detail__click-wrap">
                                        <form method="POST" action="{{ route('wish.add') }}" id="wishadd_form">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}" />
                                        </form>
                                        @if($wish == true)
                                        <i class="fas fa-heart u-s-m-r-6"></i>
                                        @else
                                        <i class="far fa-heart u-s-m-r-6"></i>
                                        @endif

                                        <a onclick="$('#wishadd_form').submit()">Add to Wishlist</a>
                                    </span>
                                </div>
                            </div>
                            <div class="u-s-m-b-15">
                                <form class="pd-detail__form" method="POST" action="{{ route('cart.add') }}">

                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}" />
                                    @foreach ($varities as $varity)


                                        @if ($varity[0]->type == 'color')
                                            <div class="u-s-m-b-15">
                                                <span class="pd-detail__label u-s-m-b-8">Color:</span>

                                                <div class="pd-detail__color">
                                                    @foreach ($varity as $option)

                                                        <div class="color__radio">

                                                            <input type="radio" id="{{ $option->id }}" name="option_{{ $option->type }}"
                                                                checked value="{{ $option->name }}">

                                                            <label class="color__radio-label" for="{{ $option->id }}"
                                                                style="background-color: {{ $option->name }}"></label>
                                                        </div>
                                                    @endforeach

                                                </div>

                                            </div>

                                        @else
                                            <div class="u-s-m-b-15">

                                                <span class="pd-detail__label u-s-m-b-8">{{ $varity[0]->type }}</span>
                                                <div class="pd-detail__size">
                                                    @foreach ($varity as $option)
                                                        <div class="size__radio">

                                                            <input type="radio" id="{{ $option->id }}" name="option_{{ $option->type }}"
                                                                value="{{ $option->name }}" checked>

                                                            <label class="size__radio-label"
                                                                for="{{ $option->id }}">{{ $option->name }}</label>
                                                        </div>

                                                    @endforeach
                                                </div>
                                            </div>

                                        @endif


                                    @endforeach
                                    <div class="pd-detail-inline-2">
                                        <div class="u-s-m-b-15">

                                            <!--====== Input Counter ======-->
                                            <div class="input-counter">

                                                <span class="input-counter__minus fas fa-minus"></span>

                                                <input class="input-counter__text input-counter--text-primary-style"
                                                    type="text" value="1" data-min="1" data-max="1000" name="count">

                                                <span class="input-counter__plus fas fa-plus"></span>
                                            </div>
                                            <!--====== End - Input Counter ======-->
                                        </div>
                                        <div class="u-s-m-b-15">

                                            <button class="btn btn--e-brand-b-2" type="submit">Add to Cart</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="u-s-m-b-15">

                                <span class="pd-detail__label u-s-m-b-8">Product Policy:</span>
                                <ul class="pd-detail__policy-list">
                                    <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                        <span>Buyer Protection.</span>
                                    </li>
                                    <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                        <span>Full Refund if you don't receive your order.</span>
                                    </li>
                                    <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                        <span>Returns accepted if product not as described.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--====== End - Product Right Side Details ======-->
                    </div>
                </div>
            </div>
        </div>

        <!--====== Product Detail Tab ======-->
        <div class="u-s-p-y-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="pd-tab">
                            <div class="u-s-m-b-30">
                                <ul class="nav pd-tab__list">
                                    <li class="nav-item">

                                        <a class="nav-link" data-toggle="tab" href="#pd-desc">DESCRIPTION</a>
                                    </li>
                                    <li class="nav-item">

                                        <a class="nav-link active" id="view-review" data-toggle="tab" href="#pd-rev">REVIEWS

                                            <span>(23)</span></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">

                                <!--====== Tab 1 ======-->
                                <div class="tab-pane" id="pd-desc">
                                    <div class="pd-tab__desc">
                                        <div class="u-s-m-b-15">
                                            {!! $product->describtion !!}
                                        </div>
                                    </div>
                                </div>
                                <!--====== End - Tab 1 ======-->

                                <!--====== Tab 2 ======-->
                                <div class="tab-pane fade show active" id="pd-rev">
                                    <div class="pd-tab__rev">
                                        <!-- over all rate-->
                                        <div class="u-s-m-b-30">
                                            <div class="pd-tab__rev-score">
                                                <div class="u-s-m-b-8">
                                                    <h2>{{ $product->reviews()->count() }} Reviews -
                                                        {{ $product->getRateAttribute() }} (Overall)</h2>
                                                </div>
                                                <div class="gl-rating-style-2 u-s-m-b-8">
                                                    @foreach (range(1, 5) as $i)
                                                        @if ($rating > 0)
                                                            @if ($rating >= 0.5)
                                                                <i class="fas fa-star"></i>
                                                            @else
                                                                <i class="fas fa-star-half-alt"></i>
                                                            @endif
                                                        @else
                                                            <i class="far fa-star"></i>
                                                        @endif
                                                        @php $rating-- @endphp
                                                    @endforeach
                                                </div>
                                                <div class="u-s-m-b-8">
                                                    <h4>We want to hear from you!</h4>
                                                </div>

                                                <span class="gl-text">Tell us what you think about this item</span>
                                            </div>
                                        </div>


                                        <!-- show feedbacks -->
                                        <div class="u-s-m-b-30">
                                            <form class="pd-tab__rev-f1">
                                                <div class="rev-f1__group">
                                                    <div class="u-s-m-b-15">
                                                        <h2>{{ $product->reviews()->count() }} Review(s) for Man Ruched
                                                            Floral Applique Tee</h2>
                                                    </div>
                                                </div>
                                                <div class="rev-f1__review">
                                                    @foreach ($product->reviews as $review)
                                                        <div class="review-o u-s-m-b-15">
                                                            <div class="review-o__info u-s-m-b-8">

                                                                <span
                                                                    class="review-o__name">{{ $review->user->name }}</span>

                                                                <span
                                                                    class="review-o__date">{{ $review->created_at }}</span>
                                                            </div>
                                                            <div class="review-o__rating gl-rating-style u-s-m-b-8">
                                                                @php $rating = floatval($review->stars) @endphp
                                                                @foreach (range(1, 5) as $i)
                                                                    @if ($rating > 0)
                                                                        @if ($rating > 0.5)
                                                                            <i class="fas fa-star"></i>
                                                                        @else
                                                                            <i class="fas fa-star-half-alt"></i>
                                                                        @endif
                                                                    @else
                                                                        <i class="far fa-star"></i>
                                                                    @endif
                                                                    @php $rating-- @endphp
                                                                @endforeach
                                                            </div>

                                                            <p class="review-o__text">{{ $review->content }}</p>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </form>
                                        </div>

                                        <!-- add review -->
                                        @auth
                                        @if(!$reviewed)
                                            <div class="u-s-m-b-30">
                                                <form class="pd-tab__rev-f2" method="POST" action="{{ route('addReview') }}">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}" />
                                                    <h2 class="u-s-m-b-15">Add a Review</h2>

                                                    <span class="gl-text u-s-m-b-15">Your email address will not be published.
                                                        Required fields are marked *</span>
                                                    <div class="u-s-m-b-30">
                                                        <div class="rev-f2__table-wrap gl-scroll">
                                                            <table class="rev-f2__table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <div class="gl-rating-style-2"><i
                                                                                    class="fas fa-star"></i>

                                                                                <span>(1)</span>
                                                                            </div>
                                                                        </th>
                                                                        <th>
                                                                            <div class="gl-rating-style-2"><i
                                                                                    class="fas fa-star"></i><i
                                                                                    class="fas fa-star-half-alt"></i>

                                                                                <span>(1.5)</span>
                                                                            </div>
                                                                        </th>
                                                                        <th>
                                                                            <div class="gl-rating-style-2"><i
                                                                                    class="fas fa-star"></i><i
                                                                                    class="fas fa-star"></i>

                                                                                <span>(2)</span>
                                                                            </div>
                                                                        </th>
                                                                        <th>
                                                                            <div class="gl-rating-style-2"><i
                                                                                    class="fas fa-star"></i><i
                                                                                    class="fas fa-star"></i><i
                                                                                    class="fas fa-star-half-alt"></i>

                                                                                <span>(2.5)</span>
                                                                            </div>
                                                                        </th>
                                                                        <th>
                                                                            <div class="gl-rating-style-2"><i
                                                                                    class="fas fa-star"></i><i
                                                                                    class="fas fa-star"></i><i
                                                                                    class="fas fa-star"></i>

                                                                                <span>(3)</span>
                                                                            </div>
                                                                        </th>
                                                                        <th>
                                                                            <div class="gl-rating-style-2"><i
                                                                                    class="fas fa-star"></i><i
                                                                                    class="fas fa-star"></i><i
                                                                                    class="fas fa-star"></i><i
                                                                                    class="fas fa-star-half-alt"></i>

                                                                                <span>(3.5)</span>
                                                                            </div>
                                                                        </th>
                                                                        <th>
                                                                            <div class="gl-rating-style-2"><i
                                                                                    class="fas fa-star"></i><i
                                                                                    class="fas fa-star"></i><i
                                                                                    class="fas fa-star"></i><i
                                                                                    class="fas fa-star"></i>

                                                                                <span>(4)</span>
                                                                            </div>
                                                                        </th>
                                                                        <th>
                                                                            <div class="gl-rating-style-2"><i
                                                                                    class="fas fa-star"></i><i
                                                                                    class="fas fa-star"></i><i
                                                                                    class="fas fa-star"></i><i
                                                                                    class="fas fa-star"></i><i
                                                                                    class="fas fa-star-half-alt"></i>

                                                                                <span>(4.5)</span>
                                                                            </div>
                                                                        </th>
                                                                        <th>
                                                                            <div class="gl-rating-style-2"><i
                                                                                    class="fas fa-star"></i><i
                                                                                    class="fas fa-star"></i><i
                                                                                    class="fas fa-star"></i><i
                                                                                    class="fas fa-star"></i><i
                                                                                    class="fas fa-star"></i>

                                                                                <span>(5)</span>
                                                                            </div>
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>

                                                                            <!--====== Radio Box ======-->
                                                                            <div class="radio-box">

                                                                                <input type="radio" id="star-1" name="rating" value="1">
                                                                                <div
                                                                                    class="radio-box__state radio-box__state--primary">

                                                                                    <label class="radio-box__label"
                                                                                        for="star-1"></label>
                                                                                </div>
                                                                            </div>
                                                                            <!--====== End - Radio Box ======-->
                                                                        </td>
                                                                        <td>

                                                                            <!--====== Radio Box ======-->
                                                                            <div class="radio-box">

                                                                                <input type="radio" id="star-1.5" name="rating" value="1.5">
                                                                                <div
                                                                                    class="radio-box__state radio-box__state--primary">

                                                                                    <label class="radio-box__label"
                                                                                        for="star-1.5"></label>
                                                                                </div>
                                                                            </div>
                                                                            <!--====== End - Radio Box ======-->
                                                                        </td>
                                                                        <td>

                                                                            <!--====== Radio Box ======-->
                                                                            <div class="radio-box">

                                                                                <input type="radio" id="star-2" name="rating" value="2">
                                                                                <div
                                                                                    class="radio-box__state radio-box__state--primary">

                                                                                    <label class="radio-box__label"
                                                                                        for="star-2"></label>
                                                                                </div>
                                                                            </div>
                                                                            <!--====== End - Radio Box ======-->
                                                                        </td>
                                                                        <td>

                                                                            <!--====== Radio Box ======-->
                                                                            <div class="radio-box">

                                                                                <input type="radio" id="star-2.5" name="rating" value="2.5">
                                                                                <div
                                                                                    class="radio-box__state radio-box__state--primary">

                                                                                    <label class="radio-box__label"
                                                                                        for="star-2.5"></label>
                                                                                </div>
                                                                            </div>
                                                                            <!--====== End - Radio Box ======-->
                                                                        </td>
                                                                        <td>

                                                                            <!--====== Radio Box ======-->
                                                                            <div class="radio-box">

                                                                                <input type="radio" id="star-3" name="rating" value="3">
                                                                                <div
                                                                                    class="radio-box__state radio-box__state--primary">

                                                                                    <label class="radio-box__label"
                                                                                        for="star-3"></label>
                                                                                </div>
                                                                            </div>
                                                                            <!--====== End - Radio Box ======-->
                                                                        </td>
                                                                        <td>

                                                                            <!--====== Radio Box ======-->
                                                                            <div class="radio-box">

                                                                                <input type="radio" id="star-3.5" name="rating" value="3.5">
                                                                                <div
                                                                                    class="radio-box__state radio-box__state--primary">

                                                                                    <label class="radio-box__label"
                                                                                        for="star-3.5"></label>
                                                                                </div>
                                                                            </div>
                                                                            <!--====== End - Radio Box ======-->
                                                                        </td>
                                                                        <td>

                                                                            <!--====== Radio Box ======-->
                                                                            <div class="radio-box">

                                                                                <input type="radio" id="star-4" name="rating" value="4">
                                                                                <div
                                                                                    class="radio-box__state radio-box__state--primary">

                                                                                    <label class="radio-box__label"
                                                                                        for="star-4"></label>
                                                                                </div>
                                                                            </div>
                                                                            <!--====== End - Radio Box ======-->
                                                                        </td>
                                                                        <td>

                                                                            <!--====== Radio Box ======-->
                                                                            <div class="radio-box">

                                                                                <input type="radio" id="star-4.5" name="rating" value="4.5">
                                                                                <div
                                                                                    class="radio-box__state radio-box__state--primary">

                                                                                    <label class="radio-box__label"
                                                                                        for="star-4.5"></label>
                                                                                </div>
                                                                            </div>
                                                                            <!--====== End - Radio Box ======-->
                                                                        </td>
                                                                        <td>

                                                                            <!--====== Radio Box ======-->
                                                                            <div class="radio-box">

                                                                                <input type="radio" id="star-5" name="rating" value="5">
                                                                                <div
                                                                                    class="radio-box__state radio-box__state--primary">

                                                                                    <label class="radio-box__label"
                                                                                        for="star-5"></label>
                                                                                </div>
                                                                            </div>
                                                                            <!--====== End - Radio Box ======-->
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="rev-f2__group">
                                                        <div class="u-s-m-b-15">

                                                            <label class="gl-label" for="reviewer-text">YOUR REVIEW
                                                                *</label><textarea class="text-area text-area--primary-style"
                                                                id="reviewer-text" name="feedback"></textarea>
                                                        </div>
                                                    </div>
                                                    <div>

                                                        <button class="btn btn--e-brand-shadow" type="submit">SUBMIT</button>
                                                    </div>
                                                </form>
                                            </div>
                                            @endif
                                        @else
                                            <div class="col-lg-12">
                                                <div class="load-more">

                                                    <button class="btn btn--e-brand" type="button"
                                                        onclick="window.location.href='{{ route('login') }}'">SignIn to review
                                                        this product</button>
                                                </div>
                                            </div>
                                        @endauth
                                    </div>
                                </div>
                                <!--====== End - Tab 2 ======-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Product Detail Tab ======-->
        @if($top_reviewed->count()>0)

        <div class="u-s-p-b-90">

            <!--====== Section Intro ======-->
            <div class="section__intro u-s-m-b-46">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section__text-wrap">
                                <h1 class="section__heading u-c-secondary u-s-m-b-12">CUSTOMER ALSO Reviewed</h1>

                                <span class="section__span u-c-grey">PRODUCTS THAT CUSTOMER Review</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Intro ======-->


            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="slider-fouc">
                        <div class="owl-carousel product-slider" data-item="4">
                            @foreach ($top_reviewed as $reviewd)
                                <div class="u-s-m-b-30">
                                    <div class="product-o product-o--hover-on">
                                        <div class="product-o__wrap">

                                            <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                                href="{{ route('singleProduct', ['product' => $reviewd['0']->product->id]) }}">

                                                <img class="aspect__img"
                                                    src="{{ asset($reviewd['0']->product->getMasterImageAttribute()->path ?? '') }}"
                                                    alt=""></a>
                                            <div class="product-o__action-wrap">
                                                <ul class="product-o__action-list">
                                                    <li>

                                                        <a data-modal="modal" data-modal-id="#add-to-cart"
                                                            data-tooltip="tooltip" data-placement="top"
                                                            title="Add to Cart"><i class="fas fa-plus-circle"></i></a>
                                                    </li>
                                                    <li>

                                                        <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                            title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                                    </li>
                                                    <li>

                                                        <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                            title="Email me When the price drops"><i
                                                                class="fas fa-envelope"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <span class="product-o__category">

                                            <a
                                                href="shop-side-version-2.html">{{ $reviewd['0']->product->brand->name }}</a></span>

                                        <span class="product-o__name">

                                            <a href="product-detail.html">{{ $reviewd['0']->product->name }}</a></span>
                                        <div class="product-o__rating gl-rating-style">

                                            @php
                                                $rating = floatval($reviewd->sum('stars')) / floatval($reviewd->count());
                                            @endphp
                                            @foreach (range(1, 5) as $i)
                                                @if ($rating > 0)
                                                    @if ($rating >= 0.5)
                                                        <i class="fas fa-star"></i>
                                                    @else
                                                        <i class="fas fa-star-half-alt"></i>
                                                    @endif
                                                @else
                                                    <i class="far fa-star"></i>
                                                @endif
                                                @php $rating-- @endphp
                                            @endforeach

                                            <span class="product-o__review">({{ $reviewd->count() }})</span>
                                        </div>
                                        @if ($reviewd['0']->product->getActiveDiscountAttribute()->count() > 0)
                                            <span
                                                class="product-o__price">${{ floatval($reviewd['0']->product->price) * floatval($reviewd['0']->product->getActiveDiscountAttribute()->first()->value) }}

                                                <span
                                                    class="product-o__discount">${{ $reviewd['0']->product->price }}</span></span>
                                        @else
                                            <span class="product-o__price">${{ $reviewd['0']->product->price }}</span>
                                        @endif
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        @endif
        <!--====== End - Section 1 ======-->
    </div>
    <!--====== End - App Content ======-->


@endsection
