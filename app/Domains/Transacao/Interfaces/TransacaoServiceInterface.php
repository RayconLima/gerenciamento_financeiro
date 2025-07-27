<?php

namespace App\Domains\Transacao\Interfaces;

interface TransacaoServiceInterface
{
    public function criar(array $entradas): void;

    public function mostrar(int $id): mixed;
    public function atualizar(int $id, array $entradas): void;
    public function deletar(int $id): void;
    public function buscarPorId(int $id): mixed;
    public function listar(array $filtros = []): mixed;
}