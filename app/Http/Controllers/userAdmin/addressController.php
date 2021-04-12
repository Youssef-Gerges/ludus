<?php

namespace App\Http\Controllers\userAdmin;

use Cart;
use App\Models\Address;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\addAddressRequest;

class addressController extends Controller
{
    private $user_id;

    public function __construct(Request $request)
    {

        $this->middleware(function ($request, $next) {
            $this->user_id = Auth::user()->id;

            Cart::instance('wishlist')->recover($this->user_id);
            $data = [
                'orders_count' => Invoice::whereUser_id($this->user_id)->count(),
                'wishlist_count' => Cart::instance('wishlist')->count()

            ];

            view()->share($data);
            return $next($request);
        });
    }


    public function addressBook()
    {
        $data = [
            'addresses' => Address::whereUser_id($this->user_id)->get(),
        ];
        return view('user.dashboard/dash-address-book', $data);
    }

    public function makeDefaultAddressView()
    {
        $data = [
            'addresses' => Address::whereUser_id($this->user_id)->get(),
        ];

        return view('user.dashboard.dash-address-make-default', $data);
    }

    public function makeDefaultAddress(Request $request)
    {
        $addresses = Address::whereUser_id($this->user_id)->get();
        foreach ($addresses as $address) {
            $address->default = false;
            $address->save();
        }
        $address = Address::findOrFail($request->default_address);
        $address->default = true;
        $address->save();
        return redirect()->route('userdashboard.address-book');
    }

    public function addAddressView()
    {
        return view('user.dashboard.dash-address-add');
    }

    public function addAddress(addAddressRequest $request)
    {
        $address = new Address();
        $address->region = $request->region;
        $address->name = $request->name;
        $address->phone = $request->phone;
        $address->address = $request->address;
        $address->zip = $request->zip;
        $address->default = false;
        $address->user_id = $request->user()->id;
        $address->save();
        return redirect()->route('userdashboard.address-book');
    }
}
