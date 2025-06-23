<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class OAuthController extends Controller
{
    public function authRedirect()
    {
        /** @var \Laravel\Socialite\Two\GoogleProvider $provider */
        $provider = Socialite::driver('google');

        // works but has some issue to test in Laragon
        return $provider
            ->stateless()
            ->redirect()
            ->getTargetUrl();
    }

    public function oauthCallback()
    {

        $googleUser = Socialite::with('google')->stateless()->user();

        $googleUser = User::updateOrCreate([
            'google_id' => $googleUser->id,
        ], [
            'first_name' => $googleUser->first_name,
            'last_name' => $googleUser->last_name,
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'google_token' => $googleUser->token,
            'google_refresh_token' => $googleUser->refreshToken,
        ]);

        // do something here
        // authenticate return token
        $token = $googleUser->createToken('authToken');
    }
}
