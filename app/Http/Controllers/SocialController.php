<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Socialite;
use Illuminate\Support\Facades\Hash;

class SocialController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectToProvider($social)
    {
        return Socialite::driver($social)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback($social)
    {
        $user = Socialite::driver($social)->stateless()->user();
        $this->_registerOrLoginUser($user, $social);
        return redirect()->route('home');
    }

    protected function _registerOrLoginUser($data, $social) {
        $user = User::where('email', '=', $data->email)->first();
        if (!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->avatar = $data->avatar;
            $user->password = Hash::make('123123');
            $user->provider = $social;
            $user->provider_id = $data->id;
            $user->save();
        }

        Auth::login($user, true);
    }

}
