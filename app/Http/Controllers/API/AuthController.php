<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credential = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credential)){
            
            $user =  Auth::user();

            $token = $user->createToken('API Token')->plainTextToken;

            return response()->json($token);
        }

        return response()->json(['message' => 'incorrect']);
    }

    public function logout(Request $request)
    {
        $user = Auth::user();

        $user->tokens()->delete();

        return response()->json(['message' => 'logged out']);
    }
}
