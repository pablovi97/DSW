<?php

namespace App\Http\Controllers;

use App\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = Usuarios::create([
            'nick' => $request->nombre,
            //'email' => $request->email,
            'passwd' => bcrypt($request->password),
        ]);
        $token = auth('api')->login($user);
        return $this->respondWithToken($token);
    }
    public function login(Request $request)
    {
        $nom = $request->nom;
      $pass = $request->pass;
      //$nom = 'pablo';
     //$pass = '1q2w3e4r';
        $user = Usuarios::where('nick', '=', $nom)->first();
        if (isset($user) && Hash::check($pass, $user->passwd)) {
            $token = JWTAuth::fromUser($user);
            return $this->respondWithToken($token);
        } else {

            return response()->json(['error' => 'Unauthorized', $nom => $pass], 401);
        }
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
