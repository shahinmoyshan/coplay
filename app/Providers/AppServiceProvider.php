<?php

namespace App\Providers;

use App\Lib\TailwindHelper;
use Spark\Foundation\Providers\ServiceProvider;

/**
 * This file contains the service providers for the web application.
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Registers services in the application container.
     *
     * @return void
     */
    public function register(): void
    {
        // Add TailwindHelper Service in Container
        $this->app->singleton(TailwindHelper::class, function () {
            $colors = config('cms.color', []);

            // Get the colors from the environment variable
            $accent = $colors['accent'] ?? 'amber';
            $primary = $colors['primary'] ?? 'gray';

            // Create the Tailwind helper service
            return new TailwindHelper([
                'colors' => ['accent' => $accent, 'primary' => $primary],
            ]);
        });
    }

    /**
     * Boots the service provider.
     *
     * @return void
     */
    public function boot(): void
    {
        // i am bootstrapping services
    }
}