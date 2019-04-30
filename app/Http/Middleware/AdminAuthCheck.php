<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminAuthCheck
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
        // prevent non-admin to create category 

        //check if user is authenticatated

        if(!Auth::check()){

            return redirect('/login');
        }

         if( !Auth::user()->hasRoleOf('admin')){

             return redirect('/businesses');
         }
        return $next($request);
    }
}