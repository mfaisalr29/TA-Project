<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function createToken(Request $request)
    {
        $request->validate([
            'token_name' => 'required|string|max:255',
        ]);

        $token = $request->user()->createToken($request->token_name);

        return response()->json([
            'token' => $token->plainTextToken,
        ], 200);
    }

    public function login(Request $request)
    {
        Log::info('Login attempt', ['email' => $request->email]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            Log::info('Login successful', ['user' => $user]);
            $token = $user->createToken('authToken', ['role:' . $user->role])->plainTextToken;

            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => $user,
                'role' => $user->role,
                'redirect_to' => $user->role === 'admin' ? '/dashboardadmin' : '/dashboard'
            ], 200);
        } else {
            Log::info('Login failed');
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }

    public function logout(Request $request)
    {
        $user = $request->user();

        if ($user) {
            $token = $user->currentAccessToken();

            if ($token) {
                $token->delete();
            }
        }

        // Log the user out from the session
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to login with status message
        return redirect('/login')->with('status', 'Anda telah keluar.');
    }
}
