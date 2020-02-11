<?php

namespace App\Http\Controllers;

use App\Usuarios;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = Usuarios::create([
            'nick' => $request->nick,
            //'email' => $request->email,
            'passwd' => bcrypt($request->passwd),
        ]);
        $token = auth('api')->login($user);
        return $this->respondWithToken($token);
    }
    public function login(Request $request)
    {
        $credentials = $request->only(['nick', 'passwd']);
        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => 120
        ]);
    }
}
