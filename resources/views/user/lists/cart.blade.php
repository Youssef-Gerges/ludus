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

                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="is-marked">

                                    <a href="{{ route('cart.view') }}">Cart</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section 1 ======-->

        @if($items->count() == 0)

        <div class="u-s-p-y-60">

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 u-s-m-b-30">
                            <div class="empty">
                                <div class="empty__wrap">

                                    <span class="empty__big-text">EMPTY</span>

                                    <span class="empty__text-1">No items found on your cart.</span>

                                    <a class="empty__redirect-link btn--e-brand" href="{{ route('shop') }}">CONTINUE SHOPPING</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        @else



        <!--====== Section 2 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Intro ======-->
            <div class="section__intro u-s-m-b-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section__text-wrap">
                                <h1 class="section__heading u-c-secondary">SHOPPING CART</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Intro ======-->
            @if ($items->count() > 0)

                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 u-s-m-b-30">
                                <div class="table-responsive">
                                    <form action="{{ route('cart.edit') }}" method="POST" id="edit_form">
                                        @method('PUT')
                                        @csrf
                                    </form>

                                        <table class="table-p">
                                            <tbody>
                                                @foreach ($items as $item)
                                                    @php
                                                        $product = App\Models\Product::find($item->id);
                                                    @endphp

                                                    <!--====== Row ======-->
                                                    <tr>

                                                        <td>
                                                            <div class="table-p__box">
                                                                <div class="table-p__img-wrap">

                                                                    <img class="u-img-fluid"
                                                                        src="{{ asset($product->getMasterImageAttribute()->path ?? '') }}"
                                                                        alt="">
                                                                </div>
                                                                <div class="table-p__info">

                                                                    <span class="table-p__name">

                                                                        <a
                                                                            href="{{ route('singleProduct', ['product' => $product->id]) }}">{{ $product->name }}</a>
                                                                    </span>

                                                                    <span class="table-p__category">

                                                                        <a
                                                                            href="{{ route('shop', ['brand' => $product->brand->id]) }}">{{ $product->brand->name }}</a></span>
                                                                    <ul class="table-p__variant-list">
                                                                        @foreach ($item->options as $option => $value)

                                                                            <li>

                                                                                <span>{{ $option }}:
                                                                                    {{ $value }}</span>
                                                                            </li>

                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>

                                                            <span class="table-p__price">${{ $item->price }} x</span>
                                                        </td>
                                                        <td>

                                                            <div class="table-p__input-counter-wrap">

                                                                <!--====== Input Counter ======-->
                                                                <div class="input-counter">

                                                                    <span class="input-counter__minus fas fa-minus"></span>

                                                                    <input
                                                                        class="input-counter__text input-counter--text-primary-style"
                                                                        type="text" value="{{ $item->qty }}"
                                                                        data-min="1" data-max="{{ $product->stock }}"
                                                                        name="row_{{ $item->rowId }}"
                                                                        form="edit_form"
                                                                        >

                                                                    <span class="input-counter__plus fas fa-plus"></span>
                                                                </div>
                                                                <!--====== End - Input Counter ======-->

                                                            </div>
                                                        </td>
                                                        <form action="{{ route('cart.remove') }}" method="post"
                                                            id="{{ $item->rowId }}">
                                                            <td>
                                                                @csrf
                                                                @method('delete')
                                                                <input type="hidden" name="rowId"
                                                                    value="{{ $item->rowId }}"
                                                                    form="{{ $item->rowId }}" />
                                                                <div class="table-p__del-wrap">

                                                                    <a class="far fa-trash-alt table-p__delete-link"
                                                                        onclick="$('#{{ $item->rowId }}').submit()"></a>
                                                                </div>
                                                            </td>
                                                        </form>
                                                    </tr>
                                                    <!--====== End - Row ======-->
                                                @endforeach
                                            </tbody>
                                        </table>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="route-box">
                                    <div class="route-box__g1">

                                        <a class="route-box__link" href="{{ route('shop') }}">
                                            <i class="fas fa-long-arrow-alt-left"></i>

                                            <span>CONTINUE SHOPPING</span>
                                        </a>
                                    </div>
                                    <div class="route-box__g2">

                                        <a class="route-box__link" href="{{ route('cart.destroy') }}">
                                            <i class="fas fa-trash"></i>

                                            <span>CLEAR CART</span>
                                        </a>

                                        <a class="route-box__link" onclick="$('#edit_form').submit()">
                                            <i class="fas fa-sync"></i>

                                            <span>UPDATE CART</span>
                                        </a>
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

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 u-s-m-b-30">
                            <form class="f-cart">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 u-s-m-b-30">
                                        <div class="f-cart__pad-box">
                                            <div class="u-s-m-b-30">
                                                <table class="f-cart__table">
                                                    <tbody>
                                                        <tr>
                                                            <td>SHIPPING</td>
                                                            <td>$4.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td>TAX</td>
                                                            <td>$0.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td>SUBTOTAL</td>
                                                            <td>$379.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td>GRAND TOTAL</td>
                                                            <td>$379.00</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div>

                                                <button class="btn btn--e-brand-b-2" type="submit"> PROCEED TO
                                                    CHECKOUT</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 3 ======-->
        @endif

        @endif

    </div>


    <!--====== End - App Content ======-->

@endsection
