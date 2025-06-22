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
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return ApiResponse::error(
            'Invalid email or password.',
            401,
            'Authentication failed'
        );
    }
}
