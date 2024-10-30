<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'guest' =>  \Illuminate\Auth\Middleware\RedirectIfAuthenticated::class,       // 'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'auth' =>  \Illuminate\Auth\Middleware\Authenticate::class,       // 'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permissions' => \App\Http\Middleware\PermissionMiddleware::class,
        ]);
        $middleware->use([
            \Illuminate\Auth\Middleware\RedirectIfAuthenticated::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
