<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
class supportAuth
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
            if(Auth::user()->role_as == 4 || Auth::user()->role_as == 10)
            {
                return $next($request);
            }else
            {
                return redirect()->back()->with('adminerror','invalid credentials/You are not support/HelpDesk');
            }
        }else
        {
            return redirect()->back()->with('adminerror','please login first');
        }
    }
}
