@extends('layouts.user_layout.index')
@section('content')
    @include('layouts.user_layout/dashboard/side')
    <div class="col-lg-9 col-md-12">
        <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
            <div class="dash__pad-2">
                <div class="dash__address-header">
                    <h1 class="dash__h1">Address Book</h1>
                    <div>

                        <span class="dash__link dash__link--black u-s-m-r-8">

                            <a href="{{ route('userdashboard.make-default-address') }}">Make default shipping address</a></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="dash__box dash__box--shadow dash__box--bg-white dash__box--radius u-s-m-b-30">
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
                        @foreach ($addresses as $address)

                            <tr>
                                <td>

                                    <a class="address-book-edit btn--e-transparent-platinum-b-2"
                                        href="dash-address-edit.html">Edit</a>
                                </td>
                                <td>{{ $address->name }}</td>
                                <td>{{ $address->address }}</td>
                                <td>{{ $address->region }}</td>
                                <td>{{ $address->phone }}</td>
                                <td>
                                    @if ($address->default)
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

            <a class="dash__custom-link btn--e-brand-b-2" href="{{ route('userdashboard.add-address') }}">
                <i class="fas fa-plus u-s-m-r-8"></i>

                <span>Add New Address</span>
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
    </div>
    <!--====== End - App Content ======-->

@endsection
