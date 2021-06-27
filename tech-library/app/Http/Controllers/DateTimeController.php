<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DateTimeController extends Controller
{
    public function date (Request $request) {
        $date = $request['date'];
        return view('home', ['date' => $date]);
    }
}
