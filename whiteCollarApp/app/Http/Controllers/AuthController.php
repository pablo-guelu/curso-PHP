<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\User;

class AuthController extends Controller
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

        $user->assignRole('client');

        auth()->login($user);

        $token = $user->createToken('Personal Access Token')->accessToken;

        return redirect('/');
    }

    public function login (Request $request) {

        $data = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('Personal Access Token')->accessToken;
            return redirect('/');
        } else {
            return response()->json(['error' => 'unauthorized'], 401);
        }

    }

    public function logout (Request $request) {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');

    }
}
