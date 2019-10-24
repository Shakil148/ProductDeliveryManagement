<?php

namespace SGFL\Http\Middleware;

use Closure;
use Auth;

class FactoryIncharge
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
        

          if (Auth::check() && Auth::user()->role == 'factoryIncharge') {
                return $next($request);
            }
            elseif (Auth::check() && Auth::user()->role == 'moderator') {
                return redirect('/moderator');
            }
            elseif (Auth::check() && Auth::user()->role == 'tsm') {
                return redirect('/tsm');
            }
            elseif (Auth::check() && Auth::user()->role == 'accounts') {
                return redirect('/accounts');
            }
            elseif (Auth::check() && Auth::user()->role == 'viewer') {
                return redirect('/viewer');
            }
            else  {
                return redirect('/admin');
            }
           
            
    }
}