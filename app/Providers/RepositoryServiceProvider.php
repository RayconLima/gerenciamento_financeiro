<?php

namespace App\Providers;

use App\Domains\Transacao\Interfaces\TransacaoRepositoryInterface;
use App\Domains\Usuario\Interfaces\UsuarioRepositoryInterface;
use App\Infrastructure\Repositories\TransacaoRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            UsuarioRepositoryInterface::class,
            \App\Infrastructure\Repositories\UsuarioRepository::class
        );

        $this->app->bind(
            TransacaoRepositoryInterface::class,
            TransacaoRepository::class
        );
    }

    public function boot(): void
    {
        //
    }
}