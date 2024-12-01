<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Verify2FAMiddleware
{
    /**
     * This is the two-factor authentication middleware to protect routes.
     * If the two-factor authentication code has not been verified or entered,
     * the user will be redirected to the two-factor authentication challenge.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && !session('two_factor_authenticated')) {
            return redirect()->route('two-factor.index');
        }
        return $next($request);
    }
}
