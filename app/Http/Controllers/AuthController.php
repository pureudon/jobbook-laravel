<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
      $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
      ]);

      $token = auth('api')->login($user);

      return $this->respondWithToken($token);
    }

    public function login(Request $request)
    {
      $credentials = $request->only(['email', 'password']);
      // dd($credentials);
      if (!$token = auth('api')->attempt($credentials)) {
        return response()->json(['error' => 'Unauthorized'], 401);
      }

      return $this->respondWithToken($token);
    }

    public function profile(Request $request)
    {
      // dd($request->user()->id);
      return response()->json([
        'id' => $request->user()->id,
        'name' => $request->user()->name,
        'email' => $request->user()->email,
        'department' => $request->user()->department,

        'avatar' => $request->user()->avatar,
        'website' => $request->user()->website,
        'rating' => $request->user()->rating,
        'phone' => $request->user()->phone,

        'username' => $request->user()->username,
        'city' => $request->user()->city,
        'country' => $request->user()->country,
        'company' => $request->user()->company,

        'position' => $request->user()->position,
        'isadmin' => $request->user()->isadmin,
      ]); 
    }

    protected function respondWithToken($token)
    {
      return response()->json([
        'access_token' => $token,
        'token_type' => 'bearer',
        'expires_in' => auth('api')->factory()->getTTL() * 60
      ]);
    }
}
