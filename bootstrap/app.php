<?php

use Spark\Foundation\Application;

/**
 * This file is the entry point of the web application.
 *
 * It uses the tinymvc framework to create the application instance, register
 * service providers, middleware, and routes.
 */

/**
 * Create the application instance.
 *
 * @param string $path
 *   The directory path of the application.
 * @param array $env
 *   The environment settings of the application.
 */
return Application::create(
    path: dirname(__DIR__),
    env: require __DIR__ . '/../env.php',
    providers: require __DIR__ . '/providers.php'
)
    /**
     * Register middleware in the application.
     *
     * @param Middleware $middleware
     *   The middleware service.
     *
     * @return void
     */
    ->withMiddleware(
        load: __DIR__ . '/middlewares.php',
        queue: ['csrf']
    )

    /**
     * Register routes in the application.
     *
     * @param Router $router
     *   The router service.
     *
     * @return void
     */
    ->withRouting(
        web: __DIR__ . '/../routes/web.php'
    );