<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdminMiddleware
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
        if (!auth()->user()->is_admin) {
           // return redirect()->route('admin.home');
            if(auth()->user()->is_manager)
            return redirect()->route('manager.home');
        elseif(auth()->user()->is_employee)
            return redirect()->route('employee.home');
            
        }

        return $next($request);
    }
}
