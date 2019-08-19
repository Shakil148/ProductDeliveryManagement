<?php

namespace SGFL\Http\Middleware;

use Closure;
use Auth;

class Viewer
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
        

          if (Auth::check() && Auth::user()->role == 'viewer') {
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
            else  {
                return redirect('/admin');
            }
           
            
    }
}
