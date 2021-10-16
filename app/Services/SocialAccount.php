<?php

namespace App\Services;

use Laravel\Socialite\Contracts\User as ProviderUser;
use App\SocialAccount;
use App\User;

class SocialAccountService{
    public static function createOrGetUser (ProviderUser $providerUser, $social) {
        
    }
}