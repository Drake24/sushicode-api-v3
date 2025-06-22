<?php

namespace App\Http\Controllers\Auth;

use App\Classes\ApiResponse;
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

            return response()->json(['token' => $token]);
        }

        // Todo
        return ApiResponse::error(
            'Invalid email or password.',
            401,
            'Authentication failed'
        );
    }
}
