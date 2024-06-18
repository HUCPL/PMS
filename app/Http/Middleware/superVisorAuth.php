<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
class superVisorAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check())
        {
            if(Auth::user()->role_as == 7 || Auth::user()->role_as == 10)
            {
                return $next($request);
            }else
            {
                return redirect('/')->with('adminerror','you are not Supervisor');
            }
        }else
        {
            return redirect()->back()->with('adminerror','please first Login');
        }
    }
}
