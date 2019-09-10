<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class isAdmin
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
        if (Auth::user()) {
            if (Auth::user()->role !== 1) {
                return back()->with('message_error','Este usuario no tiene permisos para entrar.');
            }
        }else{
             return back()->with('message_error','Logueate');
        }
      
        return $next($request);
    }
}
