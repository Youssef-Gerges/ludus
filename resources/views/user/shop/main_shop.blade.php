@extends('layouts.user_layout.index')
@section('content')

    <!--====== App Content ======-->
    <div class="app-content">

        <!--====== Section 1 ======-->
        <div class="u-s-p-y-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-12">
                        <div class="shop-w-master">
                            <h1 class="shop-w-master__heading u-s-m-b-30"><i class="fas fa-filter u-s-m-r-8"></i>

                                <span>FILTERS</span>
                            </h1>
                            <div class="shop-w-master__sidebar sidebar--bg-snow">
                                <div class="u-s-m-b-30">
                                    <div class="shop-w">
                                        <div class="shop-w__intro-wrap">
                                            <h1 class="shop-w__h">CATEGORY</h1>

                                            <span class="fas fa-minus shop-w__toggle" data-target="#s-category"
                                                data-toggle="collapse"></span>
                                        </div>
                                        <div class="shop-w__wrap collapse show" id="s-category">
                                            <ul class="shop-w__category-list gl-scroll">
                                                @foreach ($categories as $category)
                                                    <li class="has-list">

                                                        <a
                                                            href="{{ route('shop', ['category' => $category->id]) }}">{{ $category->name }}</a>

                                                        <span
                                                            class="category-list__text u-s-m-l-6">({{ $category->brands()->count() }})</span>

                                                        <span
                                                            class="js-shop-category-span is-expanded fas fa-plus u-s-m-l-6"></span>
                                                        <ul style="display:block">
                                                            @foreach ($category->brands as $brand)
                                                                <li>
                                                                    <a href="{{ route('shop', ['brand' => $brand->id]) }}">
                                                                        {{ $brand->name }}
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="u-s-m-b-30">
                                    <div class="shop-w">
                                        <div class="shop-w__intro-wrap">
                                            <h1 class="shop-w__h">PRICE</h1>

                                            <span class="fas fa-minus shop-w__toggle" data-target="#s-price"
                                                data-toggle="collapse"></span>
                                        </div>
                                        <div class="shop-w__wrap collapse show" id="s-price">
                                            <form class="shop-w__form-p" method="GET">
                                                <div class="shop-w__form-p-wrap">
                                                    <div>

                                                        <label for="price-min"></label>

                                                        <input class="input-text input-text--primary-style" type="text"
                                                            id="price-min" placeholder="Min" name="min">
                                                    </div>
                                                    <div>

                                                        <label for="price-max"></label>

                                                        <input class="input-text input-text--primary-style" type="text"
                                                            id="price-max" placeholder="Max" name="max">
                                                    </div>
                                                    <div>

                                                        <button
                                                            class="btn btn--icon fas fa-angle-right btn--e-transparent-platinum-b-2"
                                                            type="submit"></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12">
                        <div class="shop-p">
                            <div class="shop-p__toolbar u-s-m-b-30">
                                {{-- <div class="shop-p__meta-wrap u-s-m-b-60">

                                        <span class="shop-p__meta-text-1">FOUND 18 RESULTS</span>
                                        <div class="shop-p__meta-text-2">

                                            <span>Related Searches:</span>

                                            <a class="gl-tag btn--e-brand-shadow" href="#">men's clothing</a>

                                            <a class="gl-tag btn--e-brand-shadow" href="#">mobiles & tablets</a>

                                            <a class="gl-tag btn--e-brand-shadow" href="#">books & audible</a></div>
                                    </div> --}}
                                <div class="shop-p__tool-style">
                                    <div class="tool-style__group u-s-m-b-8">

                                        <span class="js-shop-grid-target is-active">Grid</span>

                                        <span class="js-shop-list-target">List</span>
                                    </div>
                                    <form>
                                        <div class="tool-style__form-wrap">
                                            <div class="u-s-m-b-8">
                                                <select class="select-box select-box--transparent-b-2"  onchange="this.form.submit()" name="sort">
                                                    <option {{ Request::input('sort') == 'date'?'selected':null }} value="date">Sort By: Newest Items</option>
                                                    <option {{ Request::input('sort') == 'sortInv'?'selected':null }} value="sortInv">Sort By: Latest Items</option>
                                                    <option {{ Request::input('sort') == 'lowestPrice'?'selected':null }} value="lowestPrice">Sort By: Lowest Price</option>
                                                    <option {{ Request::input('sort') == 'higePrice'?'selected':null }} value="higePrice">Sort By: Highest Price</option>
                                                </select>
                                                @if(Request::__isset('category'))
                                                <input type="hidden" name="category" value="{{ Request::input('category')}}"/>
                                                @endif
                                                @if(Request::__isset('brand'))
                                                <input type="hidden" name="brand" value="{{ Request::input('brand')}}"/>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="shop-p__collection">
                                <div class="row is-grid-active">
                                    @foreach ($products as $product)

                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="product-m">
                                                <div class="product-m__thumb">

                                                    <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                                        href="{{route('singleProduct', ['product'=>$product->id])}}">

                                                        <img class="aspect__img"
                                                            src="{{ asset($product->getMasterImageAttribute()->path ?? '') }}"
                                                            alt="">
                                                    </a>
                                                </div>
                                                <div class="product-m__content">
                                                    <div class="product-m__category">

                                                        <a
                                                            href="{{ route('shop', ['brand' => $product->brand->id]) }}">{{ $product->brand->name }}</a>
                                                    </div>
                                                    <div class="product-m__name">

                                                        <a href="{{route('singleProduct', ['product'=>$product->id])}}">{{ $product->name }}</a>
                                                    </div>
                                                    <div class="product-m__rating gl-rating-style">
                                                        <?php $rating = $product->getRateAttribute() ?>
                                                        @foreach(range(1,5) as $i)
                                                            @if($rating > 0)
                                                                @if($rating > 0.5)
                                                                    <i class="fas fa-star"></i>
                                                                @else
                                                                    <i class="fas fa-star-half-alt"></i>
                                                                @endif
                                                            @else
                                                                <i class="far fa-star"></i>
                                                            @endif
                                                            <?php $rating-- ?>
                                                        @endforeach

                                                        {{-- @for ($i = 0; $i <= $product->getRateAttribute(); $i = $i + 0.5)

                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>

                                                        @endfor --}}

                                                            <span
                                                            class="product-m__review">({{ $product->reviews->count() }})</span>
                                                    </div>
                                                    @if($product->getActiveDiscountAttribute()->count() > 0)
                                                    <span
                                                        class="product-m__price">${{ floatval($product->price) * floatval($product->getActiveDiscountAttribute()->first()->value) }}

                                                        <span
                                                            class="product-bs__discount">${{ $product->price }}</span></span>
                                                @else
                                                    <span class="product-m__price">${{ $product->price }}</span>
                                                @endif
                                                {{-- <div class="product-m__price">${{ $product->price }}</div> --}}

                                                    <div class="product-m__hover">
                                                        <div class="product-m__preview-description">
                                                            <span>{{ $product->short_describtion}}</span>
                                                        </div>
                                                        <div class="product-m__wishlist">

                                                            <a class="far fa-heart" onclick="addToWish({{ $product->id }})" data-tooltip="tooltip"
                                                                data-placement="top" title="Add to Wishlist"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                </div>
                            </div>
                            <div class="u-s-p-y-60">

                                <!--====== Pagination ======-->
                                {{ $products->appends(request()->query())->links('vendor.pagination.default') }}
                                {{-- <ul class="shop-p__pagination">
                                    <li class="is-active">

                                        <a href="shop-grid-left.html">1</a>
                                    </li>
                                    <li>

                                        <a href="shop-grid-left.html">2</a>
                                    </li>
                                    <li>

                                        <a href="shop-grid-left.html">3</a>
                                    </li>
                                    <li>

                                        <a href="shop-grid-left.html">4</a>
                                    </li>
                                    <li>

                                        <a class="fas fa-angle-right" href="shop-grid-left.html"></a>
                                    </li>
                                </ul> --}}
                                <!--====== End - Pagination ======-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section 1 ======-->
    </div>
    <!--====== End - App Content ======-->



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
