<?php


namespace App\Http\Controllers\userAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\validateUserRequest;
use App\Models\Address;
use App\Models\Invoice;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class userDashboardController extends Controller
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

    public function index()
    {
        $data = [
            'default_address' => Address::whereUser_id($this->user_id)->whereDefault(true)->first(),
            'orders' => Invoice::whereUser_id($this->user_id)->get(),
        ];
        return view()->make('user.dashboard.dashboard', $data);
    }

    public function viewAccount()
    {
        $data = [
            'user' => request()->user()
        ];
        return view('user.dashboard.dash-my-profile', $data);
    }

    public function editAccountView()
    {
        $data = [
            'user' => request()->user(),
        ];
        return view('user.dashboard.dash-edit-profile', $data);
    }

    public function editAccount(validateUserRequest $request)
    {
        $user = $request->user();

        if ($request->gender) {
            $user->gender = $request->gender;
        }

        $user->name = $request->name;
        $user->phone = $request->phone;

        $user->save();

        return redirect()->route('userdashboard.home');
    }
}
