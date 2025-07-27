<?php

namespace App\Domains\Usuario\Interfaces;

use App\Models\User;

interface UsuarioRepositoryInterface
{
    public function encontrarPorEmail(string $email): ?User;
    public function encontrarPorId(int $id): ?User;
   public function criar(array $entradas): void;

    // public function mostrar(int $id): mixed;
    public function atualizar(int $id, array $entradas): void;
    public function deletar(int $id): void;
    public function listarTodos(array $filtros = []): mixed;
}