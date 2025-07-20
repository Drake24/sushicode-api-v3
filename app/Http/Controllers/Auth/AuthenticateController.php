<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Values\Codes;
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
            ], Codes::HTTP_OK, 'Successfully authenticated user');
        }

        return apiResponse()->error('Invalid email or password.', Codes::HTTP_UNAUTHORIZED, 'Authentication failed');
    }
}
