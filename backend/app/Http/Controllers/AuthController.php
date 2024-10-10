<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request) {

        $validatedData = $request->validate(
            [
                'name' => 'required|string',
                'email' => 'required|string|email|unique:users',
                'password' => 'required|string|min:8',
                'role' => 'required|string'
            ]
            );
        $user = User::create($validatedData);
        $token = $user->createToken($request->name)->plainTextToken;

        return [
            'token' => $token ,
            'user' => $user];
    }

    public function Login(Request $request) {
        return 'login working ?';
    }

    public function Logout(Request $request) {
        return 'logout working ?';
    }
}
