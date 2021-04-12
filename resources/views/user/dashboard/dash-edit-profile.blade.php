@extends('layouts.user_layout.index')
@section('content')

@include('layouts.user_layout.dashboard.side')
                                <div class="col-lg-9 col-md-12">
                                    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
                                        <div class="dash__pad-2">
                                            <h1 class="dash__h1 u-s-m-b-14">Edit Profile</h1>

                                            <span class="dash__text u-s-m-b-30">Looks like you haven't update your profile</span>
                                            <div class="dash__link dash__link--secondary u-s-m-b-30">

                                                <a data-modal="modal" data-modal-id="#dash-newsletter">Subscribe Newsletter</a></div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <form class="dash-edit-p" action="{{ route('userdashboard.save-myaccount') }}" method="POST">
                                                        @csrf
                                                        <div class="gl-inline">
                                                            <div class="u-s-m-b-30">

                                                                <label class="gl-label" for="reg-fname">FULL NAME *</label>

                                                                <input class="input-text input-text--primary-style" type="text" id="reg-fname" placeholder="Full name" name="name" value="{{ $user->name }}">
                                                            </div>
                                                        </div>
                                                        <div class="gl-inline">
                                                            <div class="u-s-m-b-30">

                                                                <label class="gl-label" for="gender">GENDER</label>
                                                                <select class="select-box select-box--primary-style u-w-100" id="gender" name="gender">
                                                                    <option {{ $user->gender?null:"selected" }}>Select</option>
                                                                    <option {{ $user->gender == true? "selected": null }} value="1">Male</option>
                                                                    <option {{ $user->gender == false? "selected": null }} value="0">Female</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="gl-inline">
                                                            <div class="u-s-m-b-30">
                                                                <h2 class="dash__h2 u-s-m-b-8">E-mail</h2>
                                                                <span class="dash__text">{{ $user->email }}</span>
                                                            </div>
                                                            <div class="u-s-m-b-30">
                                                                <label class="gl-label" for="reg-fname">PHONE *</label>

                                                                <input class="input-text input-text--primary-style" type="text" id="reg-fname" placeholder="Phone number" name="phone" value="{{ $user->phone }}">

                                                            </div>
                                                        </div>

                                                        <button class="btn btn--e-brand-b-2" type="submit">SAVE</button>
                                                    </form>
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
@endsection
