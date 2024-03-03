<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    /**
     * Authenticate the user and generate a token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Check user credentials
        if (Auth::attempt($request->only('username', 'password'))) {
            // Authentication passed, get the authenticated user
            $user = Auth::user();

            // Generate a JWT token
            $token = JWTAuth::fromUser($user);

            // Include user's role in the response
            $role = $user->role;

            // Return the token and user's role as response
            return response()->json(['token' => $token, 'role' => $role]);
        }

        // Authentication failed, return error response
        throw ValidationException::withMessages([
            'error' => ['Invalid credentials'],
        ]);
    }

    /**
     * Logout the authenticated user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        // Revoke the user's token (if using JWT, tokens are stateless and cannot be revoked individually)
        // Optionally, you can implement a token blacklist or token revocation mechanism here

        // Logout the user
        Auth::logout();

        // Return success response
        return response()->json(['message' => 'Logged out successfully']);
    }
}
