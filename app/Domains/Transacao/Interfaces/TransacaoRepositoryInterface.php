<?php

namespace App\Domains\Transacao\Interfaces;

use App\Models\Transacao;

interface TransacaoRepositoryInterface
{
    public function listarTodos(array $parametros = []): array;
    
    public function porUsuario(int $id): array;

    public function salvar(array $entradas): void;

    public function atualizar(int $id, array $entradas): void;

    public function encontrarPorId(int $id): ?Object;

    public function deletar(int $id): void;
}
