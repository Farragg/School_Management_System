<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */


    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            if ((new \Illuminate\Http\Request)->is(app()->getLocale() . '/student/dashboard')) {
                return route('selection');
            }
            elseif((new \Illuminate\Http\Request)->is(app()->getLocale() . '/teacher/dashboard')) {
                return route('selection');
            }
            elseif((new \Illuminate\Http\Request)->is(app()->getLocale() . '/parent/dashboard')) {
                return route('selection');
            }
            else {
                return route('selection');
            }
        }
    }
}
