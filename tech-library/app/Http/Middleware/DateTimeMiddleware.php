<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DateTimeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $date = date('d-m-y');
        //assigning date as an attribute of request
        $request['date'] = $date;
        return $next($request);
    }
}
