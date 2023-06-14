<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson())
        {
            // Condition to check If the admin is logged in or not,
            // if He is not logged in, then it redirects the Admin Login page
            if($request->routeIs('admin.*'))
            {
                return route('admin.login');
            }
            return route('login');
        }
    }
}
