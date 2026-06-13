<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Paginação com markup Bootstrap-5 (estilizado por nós em admin.css,
        // já que o projeto não usa framework CSS).
        Paginator::useBootstrapFive();

        // POST /api/log — 60 req/min por IP (acomoda a Rafaela jogando vários
        // níveis em sequência, mas barra floods automatizados).
        RateLimiter::for('game-log', function (Request $request) {
            return Limit::perMinute(60)->by($request->ip());
        });
    }
}
