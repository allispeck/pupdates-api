<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return response()->json([
                'data' => auth()->user(),
            ]);
        }

        return response([
            'errors' => [
                'email' =>  'The provided credentials do not match our records.',
            ]
        ], 422);
    }
}
