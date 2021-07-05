<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function login (Request $request) {
        try {
            return view('auth.login');

        } catch (\Exception $exception) {
            $errorMessage = $exception->getMessage();
            return view('errors.custom404', ['errorMessage' => $errorMessage]);
        }
    }

    public function loginPost (Request $request) {
        try {
            $username_cookie = cookie('usernameCookie', $request['username'], 60);
            return redirect ('employees')->withCookie($username_cookie);

        } catch (\Exception $exception) {
            $errorMessage = $exception->getMessage();
            return view('errors.custom404', ['errorMessage' => $errorMessage]);
        }
    }
}
