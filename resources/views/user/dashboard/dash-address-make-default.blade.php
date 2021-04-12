@extends('layouts.user_layout/index')
@section('content')
@include('layouts.user_layout/dashboard/side')
                        <div class="col-lg-9 col-md-12">
                            <form class="dash__address-make" method="POST" action="{{ route('userdashboard.save-default-address') }}">
                                @csrf
                                <div
                                    class="dash__box dash__box--shadow dash__box--bg-white dash__box--radius u-s-m-b-30">
                                    <h2 class="dash__h2 u-s-p-xy-20">Make default Shipping Address</h2>
                                    <div class="dash__table-2-wrap gl-scroll">
                                        <table class="dash__table-2">
                                            <thead>
                                                <tr>
                                                    <th>Action</th>
                                                    <th>Full Name</th>
                                                    <th>Address</th>
                                                    <th>Region</th>
                                                    <th>Phone Number</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($addresses as $address)
                                                <tr>
                                                    <td>

                                                        <!--====== Radio Box ======-->
                                                        <div class="radio-box">

                                                            <input type="radio" id="address-1" name="default_address"
                                                                {{$address->default?'checked':null }} value="{{ $address->id }}">
                                                            <div class="radio-box__state radio-box__state--primary">

                                                                <label class="radio-box__label" for="address-1"></label>
                                                            </div>
                                                        </div>
                                                        <!--====== End - Radio Box ======-->
                                                    </td>
                                                    <td>{{ $address->name }}</td>
                                                    <td>{{ $address->address }}</td>
                                                    <td>{{ $address->region }}</td>
                                                    <td>{{ $address->phone }}</td>
                                                    <td>
                                                        @if($address->default)
                                                        <div class="gl-text">Default Shipping Address</div>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div>

                                    <button class="btn btn--e-brand-b-2" type="submit">SAVE</button>
                                </div>
                            </form>
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
