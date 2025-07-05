<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthenticateController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            /** @var \Laravel\Sanctum\HasApiTokens $user */
            $token = $user->createToken('authToken');

            return apiResponse()->success([
                'user' => $user,
                'token' => $token,
            ], 200, 'Successfully authenticated user');
        }

        return apiResponse()->error('Invalid email or password.', 401, 'Authentication failed');
    }
}
