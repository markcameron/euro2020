<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Validator;
use Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class SocialLoginController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function signinFacebook()
    {
        try {
            $user = Socialite::driver('facebook')->user();

            $userCol = User::where('id_facebook', $user->id)->first();

            if ($userCol) {
                Auth::login($userCol);
                return redirect('/matches');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'id_facebook' => $user->id,
                    'password' => encrypt(Str::random(32))
                ]);

                Auth::login($newUser);

                return redirect('/matches');
            }
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
}
