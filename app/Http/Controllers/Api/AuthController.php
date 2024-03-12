<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function user(Request $request)
    {
        // return $request->user()->currentAccessToken();
        return response()->json(['ok' => true]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'The provided credentials are incorrect.'], 422);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['name' => $user->name, 'token' => $token]);

    }

    public function logout(Request $request)
    {
        return $request->user()->currentAccessToken()->delete();
    }
}
