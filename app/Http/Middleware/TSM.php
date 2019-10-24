<?php

namespace SGFL\Http\Middleware;

use Closure;
use Auth;

class TSM
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
        

          if (Auth::check() && Auth::user()->role == 'tsm') {
                return $next($request);
            }
            elseif (Auth::check() && Auth::user()->role == 'moderator') {
                return redirect('/moderator');
            }

            elseif (Auth::check() && Auth::user()->role == 'accounts') {
                return redirect('/accounts');
            }
            elseif (Auth::check() && Auth::user()->role == 'viewer') {
                return redirect('/viewer');
            }
            elseif (Auth::check() && Auth::user()->role == 'factoryIncharge') {
                return redirect('/factoryIncharge');
            }
            else  {
                return redirect('/admin');
            }
           
            
    }
}
