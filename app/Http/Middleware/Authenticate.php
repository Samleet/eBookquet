<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use App\Exceptions\ApplicationException;
use App\Enums\Error;

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
        if ($request->is("api/*") && !$request->expectsJson()) {
            throw new ApplicationException(Error::ACCESS_DENIED);
        }
        return;
    }
}
