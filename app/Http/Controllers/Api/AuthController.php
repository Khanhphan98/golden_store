<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRegister;
use App\Http\Requests\UserLogin;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthController extends Controller
{
    // Dang ky
    public function register(UserRegister $request) {
        $validated = $request->validated();
        $validated['password'] = bcrypt($validated['password']);
        $user = User::create($validated);
        return response()->json(["user" => $user, "msg"  => "Register successfully!"], 200);
    }

    // Dang nhap
    public function login(UserLogin $request) {
        $validated = $request->validated();

        if (auth()->attempt($validated)) {
            $user = auth()->user();
            $token = $user->createToken('Token Name')->accessToken;
            return response()->json(['user' => $user, 'token' => $token, 'msg' => 'Login successfully!'], 200);
        } else {
            return response()->json(['msg' => 'Login failed!'], 404);
        }
    }

    public function getToken() {
        $user = auth()->user();
        return response()->json(['user' => $user], 200);
    }
}
