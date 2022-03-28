<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource;

class AuthController extends Controller
{


    public function register(Request $request) {

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $user->save();

        return response()->json([
            'success' => true,
            'user' => $user,
            'message' => 'Successfully created user!'
        ], 201);
    }

    public function login(Request $request) {

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);

        $credentials = request(['email','password']);

        if(!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Unauthorized'
            ],401);
        }

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->plainTextToken;

        return response()->json([
            'accessToken' =>$token,
            'token_type' => 'Bearer',
        ]);

    }


    public function user(Request $request) {
        return  new UserResource($request->user());
    }
    

    public function refresh() {
        if ($token = auth()->refresh()) {
            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
                'expires_at' => auth()->factory()->getTTL() * 60
            ]);
        }
        return response()->json(['error' => 'refresh_token_error'], 401);
    }


    public function logout(Request $request) {
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

}
