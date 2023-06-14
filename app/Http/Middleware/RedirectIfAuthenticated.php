<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {

                // Check whether the amdin is already authenticated means LoggedIn,
                // then it will redirect to the Dashboard
                if($guard === 'admin')
                {
                    return redirect()->route('admin.dashboard');
                }
                if($guard === 'web' && auth()->user()->status === 'active')
                {
                    return redirect()->route('Visitor.dashboard');
                }

                if($guard === 'web' && auth()->user()->status === 'active')
                {
                    return redirect()->route('Creator.dashboard');
                }
            
                
                // return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);


    }
}
