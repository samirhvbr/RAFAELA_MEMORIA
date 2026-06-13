<?php

use App\Http\Middleware\AdminAuth;
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
        // Proteção das rotas /admin via flag de sessão.
        $middleware->alias([
            'admin.auth' => AdminAuth::class,
        ]);

        // /api/log permanece protegida por CSRF (token no header X-CSRF-TOKEN).
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
