<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Socialite;

use function React\Promise\reduce;

class socaliteController extends Controller
{
    public function loginview()
    {
        return Socialite::driver('google')->redirect();
    }

    public function loginWithGoogle()
    {
        try {

            $user = Socialite::driver('google')->user();
            $isUser = User::whereGoogle_id( $user->id)->first();

            if ($isUser) {
                Auth::login($isUser);
                return redirect('/');
            } else {
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'email_verified_at' => Carbon::now(),
                    'password' => encrypt('admin@test')
                ]);

                Auth::login($createUser);
                return redirect('/');
            }
        } catch (Exception $exception) {
            return abort(505, 'error please try again later.');
        }
    }
}
