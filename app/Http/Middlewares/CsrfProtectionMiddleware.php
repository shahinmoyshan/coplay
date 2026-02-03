<?php

namespace App\Http\Middlewares;

use Spark\Foundation\Http\Middlewares\CsrfProtection as Middleware;

/**
 * CSRF protection middleware.
 * 
 * This middleware provides Cross-Site Request Forgery (CSRF) protection
 * for incoming HTTP requests. It verifies that requests contain a valid CSRF token,
 * helping to prevent unauthorized actions on behalf of authenticated users.
 */
class CsrfProtectionMiddleware extends Middleware
{
    /**
     * An array of URI paths that should be excluded from CSRF verification.
     * @var array
     */
    protected array $except = [
        '/api/*', // Exclude all API routes from CSRF protection
        '/webhook/*', // Exclude all webhook routes from CSRF protection
    ];
}
