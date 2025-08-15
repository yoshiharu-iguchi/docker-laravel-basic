<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if ($request->expectsJson()) {
            return null;
        }

        if ($request->is('admin/*')) {
            return route('admin.login');
        } elseif ($request->is('student/*')) {
            return route('student.login');
        } elseif ($request->is('teacher/*')) {
            return route('teacher.login');
        } elseif ($request->is('guardian/*')) {
            return route('guardian.login');
        }

        return $request->expectsJson() ? null : route('login');
    
    }
}
