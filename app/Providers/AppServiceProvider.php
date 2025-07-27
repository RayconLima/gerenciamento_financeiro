<?php

namespace App\Providers;

use App\Domains\Transacao\Interfaces\TransacaoServiceInterface;
use App\Domains\Usuario\Interfaces\UsuarioServiceInterface;
use App\Infrastructure\Services\TransacaoService;
use App\Infrastructure\Services\UsuarioService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            TransacaoServiceInterface::class,
            TransacaoService::class
        );

        $this->app->bind(
            UsuarioServiceInterface::class,
            UsuarioService::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
