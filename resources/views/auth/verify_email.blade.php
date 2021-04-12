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

                                        <a href="index.html">Home</a></li>
                                    <li class="is-marked">

                                        <a href="lost-password.html">Verify</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section 1 ======-->


            <!--====== Section 2 ======-->
            <div class="u-s-p-b-60">

                <!--====== Section Intro ======-->
                <div class="section__intro u-s-m-b-60">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section__text-wrap">
                                    <h1 class="section__heading u-c-secondary">Verify Your Email</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section Intro ======-->


                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">
                        <div class="row row--center">
                            <div class="col-lg-6 col-md-8 u-s-m-b-30">
                                <div class="l-f-o">
                                    <div class="l-f-o__pad-box">
                                        <h1 class="gl-h1">VERIFY EMAIL</h1>
                                        @if (session('status') == 'verification-link-sent')
                                            <span class="gl-label u-s-m-b-30">
                                                A verification email has been emailed to you!
                                            </span>

                                        @else

                                        <span class="gl-text u-s-m-b-30">Enter your email below and we will send you a link to verify your email.</span>
                                        <form class="l-f-o__form" method="POST" action="{{ route('verification.send') }}">
                                            @csrf
                                            <div class="u-s-m-b-30">

                                                <label class="gl-label" for="reset-email">E-MAIL *</label>

                                                <input class="input-text input-text--primary-style" type="text" id="reset-email" placeholder="Enter E-mail" required name="email">
                                            </div>
                                            <div class="u-s-m-b-30">

                                                <button class="btn btn--e-transparent-brand-b-2" type="submit">SUBMIT</button>
                                            </div>
                                        </form>
                                        @endif

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
