<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class PassportController extends Controller
{
    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $token = $user->createToken('Personal Access Token')->accessToken;

        return response()->json(['token' => $token], 200);
    }

    public function login (Request $request) {

        $data = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('Personal Access Token')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'unathorized'], 401);
        }

    }

    public function logout(Request $request) {
        $token = auth()->user()->token();
        $token->revoke();
        return response()->json([ 'message' => 'logged out'], 200);
    }
}
