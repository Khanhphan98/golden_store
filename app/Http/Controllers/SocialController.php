<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use SocialAccountService;

class SocialController extends Controller
{
    public function redirect($social){
        return Socialite::driver($social)->redirect();
    }

    public function callback($social){
        
    }
}
