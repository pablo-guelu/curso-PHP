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

    // Creating a cookie with the username
    public function setCookie(Request $request) {

    }

    // Controller methods

    public function home (Request $request) {
        $date = $request['date'];
        return view('home', ['date' => $date]);
    }

    public function login (Request $request) {
        $date = $request['date'];
        
        return view('auth.login', ['date' => $date]);
    }

    public function catalog (Request $request) {
        $date = $request['date'];
        return view('catalog.index', ['date' => $date]);
    }

    public function show (Request $request, $id) {
        $date = $request['date'];
        return view('catalog.show', ['date' => $date, 'id' => $id]);
    }


    // I made two methods to handle the form when creating a book
    // First method to show the form
    public function create (Request $request) {
        $date = $request['date'];
        return view('catalog.create', ['date' => $date]);
    }

    // Second method to handle the post request and validate the data on the request
    public function createPost (Request $request) {

        $validated = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|date_format:"Y"',
        ]);

        $date = $request['date'];
        return view('catalog.create', ['date' => $date]);
    }


    public function edit (Request $request, $id) {
        $date = $request['date'];
        return view('catalog.edit', ['date' => $date, 'id' => $id]);
    }

    public function editPost (Request $request, $id) {
        $validated = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|date_format:"Y"',
        ]);

        $date = $request['date'];
        return view('catalog.edit', ['date' => $date, 'id' => $id]);
    }
}
