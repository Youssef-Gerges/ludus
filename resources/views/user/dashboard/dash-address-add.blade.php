@extends('layouts.user_layout.index')
@section('content')
    @include('layouts.user_layout/dashboard/side')

    <div class="col-lg-9 col-md-12">
        <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
            <div class="dash__pad-2">
                <h1 class="dash__h1 u-s-m-b-14">Add new Address</h1>

                <span class="dash__text u-s-m-b-30">We need an address where we could deliver products.</span>
                <form class="dash-address-manipulation" method="POST" action="{{ route('userdashboard.save-address') }}">
                    @csrf
                    <div class="gl-inline">
                        <div class="u-s-m-b-30">

                            <label class="gl-label" for="address-fname">FULL NAME *</label>

                            <input class="input-text input-text--primary-style" type="text" id="address-fname"
                                placeholder="First Name" name="name" required>
                        </div>
                    </div>
                    <div class="gl-inline">
                        <div class="u-s-m-b-30">

                            <label class="gl-label" for="address-phone">PHONE *</label>

                            <input class="input-text input-text--primary-style" type="text" id="address-phone" placeholder="Phone number" name="phone">
                        </div>
                        <div class="u-s-m-b-30">

                            <label class="gl-label" for="address-street">STREET ADDRESS *</label>

                            <input class="input-text input-text--primary-style" type="text" id="address-street"
                                placeholder="House Name and Street" name="address">
                        </div>
                    </div>
                    <div class="gl-inline">
                        <div class="u-s-m-b-30">

                            <label class="gl-label" for="address-city">TOWN/CITY *</label>

                            <input class="input-text input-text--primary-style" placeholder="Town/City" type="text" id="address-city" name="region">
                        </div>
                        <div class="u-s-m-b-30">

                            <label class="gl-label" for="address-street">ZIP/POSTAL CODE *</label>

                            <input class="input-text input-text--primary-style" type="text" id="address-postal"
                                placeholder="Zip/Postal Code" name="zip">
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
    <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 2 ======-->
    </div>
    <!--====== End - App Content ======-->
@endsection
