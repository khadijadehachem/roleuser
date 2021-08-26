<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsManagerMiddleware
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
    //   if (!auth()->user()->is_admin) {
          /*  if(auth()->user()->is_manager)
                return redirect()->route('manager.home');*/
    
//}
           // return redirect()->route('employee.home');
        //}
       

        return $next($request);
    }
}
