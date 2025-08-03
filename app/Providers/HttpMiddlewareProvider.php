<?php

namespace App\Providers;

use App\Http\Middleware\CheckPermissionMiddleware;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class HttpMiddlewareProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(Router $router): void
    {
        $router->aliasMiddleware('check.permission', CheckPermissionMiddleware::class);
    }
}
