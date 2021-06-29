<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TechLibraryController extends Controller

{
    // Middleware registered at Controller level
    public function __construct() {
        $this -> middleware('date');
    }

    // Controller methods

    public function home (Request $request) {
        try {
            $date = $request['date'];
            return view('home', ['date' => $date]);

        } catch (\Exception $exception) {
            $errorMessage = $exception->getMessage();
            return view('errors.custom404', ['errorMessage' => $errorMessage]);
        }
    }

    public function login (Request $request) {
        try {
            $date = $request['date'];
            return view('auth.login', ['date' => $date]);

        } catch (\Exception $exception) {
            $errorMessage = $exception->getMessage();
            return view('errors.custom404', ['errorMessage' => $errorMessage]);
        }
    }

    public function loginPost (Request $request) {
        try {
            $username_cookie = cookie('usernameCookie', $request['username'], 60);
            $date = $request['date'];
            return redirect ()->route('home', ['date' => $date])->withCookie($username_cookie);

        } catch (\Exception $exception) {
            $errorMessage = $exception->getMessage();
            return view('errors.custom404', ['errorMessage' => $errorMessage]);
        }
    }


    public function catalog (Request $request) {
        try {
            $date = $request['date'];
            return view('catalog.index', ['date' => $date]);

        } catch (\Exception $exception) {
            $errorMessage = $exception->getMessage();
            return view('errors.custom404', ['errorMessage' => $errorMessage]);
        }
    }

    public function show (Request $request, $id) {
        try {
            $date = $request['date'];
            return view('catalog.show', ['date' => $date, 'id' => $id]);

        } catch (\Exception $exception) {
            $errorMessage = $exception->getMessage();
            return view('errors.custom404', ['errorMessage' => $errorMessage]);
        }
    }


    // I made two methods to handle the form when creating a book
    // First method to show the form
    public function create (Request $request) {
        try {
            $date = $request['date'];
            return view('catalog.create', ['date' => $date]);

        } catch (\Exception $exception) {
            $errorMessage = $exception->getMessage();
            return view('errors.custom404', ['errorMessage' => $errorMessage]);
        } 
    }

    // Second method to handle the POST request and validate the data on the request
    public function createPost (Request $request) {

        $validated = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|date_format:"Y"',
        ]);

        try {

            $date = $request['date'];
            return view('catalog.create', ['date' => $date]);

        } catch (\Exception $exception) {
            $errorMessage = $exception->getMessage();
            return view('errors.custom404', ['errorMessage' => $errorMessage]);
        }
    }


    public function edit (Request $request, $id) {
        try {
            $date = $request['date'];
            return view('catalog.edit', ['date' => $date, 'id' => $id]);

        } catch (\Exception $exception) {
            $errorMessage = $exception->getMessage();
            return view('errors.custom404', ['errorMessage' => $errorMessage]);
        }
    }

    public function editPost (Request $request, $id) {

        $validated = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|date_format:"Y"',
        ]);

        try {

            $date = $request['date'];
            return view('catalog.edit', ['date' => $date, 'id' => $id]);

        } catch (\Exception $exception) {
            $errorMessage = $exception->getMessage();
            return view('errors.custom404', ['errorMessage' => $errorMessage]);
        }
    }

    public function delete (Request $request, $id) {
        try {
            $date = $request['date'];
            return view('catalog.delete', ['date' => $date, 'id' => $id]);

        } catch (\Exception $exception) {
            $errorMessage = $exception->getMessage();
            return view('errors.custom404', ['errorMessage' => $errorMessage]);
        }
    }

    public function deletePost (Request $request, $id) {
        try {
            $date = $request['date'];
            return view('catalog.delete', ['date' => $date, 'id' => $id]);

        } catch (\Exception $exception) {
            $errorMessage = $exception->getMessage();
            return view('errors.custom404', ['errorMessage' => $errorMessage]);
        }
    }
}
