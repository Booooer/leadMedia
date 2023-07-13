<?php

namespace App\Http\Middleware;

use App\Models\Post;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected $redirectTo;
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            $this->redirectTo = '/';
            return $this->redirectTo;
        }
    }
}
