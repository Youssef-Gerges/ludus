<?php

namespace App\Http\Controllers\userAdmin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class orderController extends Controller
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


    public function orders()
    {
        $data = [
            'invoices' => Invoice::whereUserId($this->user_id)->orderByDesc('created_at')->get()
        ];
        return view('user.dashboard.dash-my-order', $data);
    }

    public function manageInvoice(Invoice $invoice)
    {
        $data = [
            'invoice' => $invoice
        ];
        return view('user.dashboard.dash-manage-order', $data);
    }
}
