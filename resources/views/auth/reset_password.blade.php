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

                                        <a href="{{ route('password.request') }}">Reset</a></li>
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
                                    <h1 class="section__heading u-c-secondary">FORGOT PASSWORD?</h1>
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
                                        <h1 class="gl-h1">PASSWORD RESET</h1>
                                        @if (session('status'))
                                            <div class="mb-4 font-medium text-sm text-green-600">
                                                {{ session('status') }}
                                            </div>
                                        @endif

                                        <span class="gl-text u-s-m-b-30">Enter your new password.</span>
                                        <form class="l-f-o__form" method="POST" action="{{ route('password.update') }}">
                                            @csrf
                                            <input type="hidden" name="token" value="{{ request()->route('token') }}" />
                                            <div class="u-s-m-b-30">

                                                <label class="gl-label" for="reset-email">Email *</label>

                                                <input class="input-text input-text--primary-style" type="email" id="reset-email" placeholder="Enter Email" required name="email">
                                            </div>
                                            <div class="u-s-m-b-30">

                                                <label class="gl-label" for="reset-email">New Password *</label>

                                                <input class="input-text input-text--primary-style" type="password" id="reset-email" placeholder="Enter New password" required name="password">
                                            </div>
                                            <div class="u-s-m-b-30">

                                                <label class="gl-label" for="reset-email">Re-Enter Password *</label>

                                                <input class="input-text input-text--primary-style" type="password" id="reset-email" placeholder="Re-Enter password" required name="password_confirmation">
                                            </div>
                                            <div class="u-s-m-b-30">

                                                <button class="btn btn--e-transparent-brand-b-2" type="submit">SUBMIT</button></div>
                                            <div class="u-s-m-b-30">

                                                <a class="gl-link" href="{{ route('login') }}">Back to Login</a></div>
                                        </form>
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
