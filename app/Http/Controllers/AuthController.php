<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $isAuthenticated = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        if (!$isAuthenticated) {

            return response()->json(['message' => 'invalid credentials']);
        }

        $request->session()->regenerate();

        return response()->json(['message' => 'you are loged in']);
    }
}
