<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      var_dump('admin');
      if (Auth::user() && Auth::user()->admin == 1) {
var_dump("this is admin");
        //return redirect('admin');
      }
        return false;
    }
}
