<?php

namespace App\Infrastructure\Services;

use App\Domains\Usuario\Interfaces\UsuarioRepositoryInterface;
use App\Exceptions\NaoEncontradoException;

class UsuarioService
{
    
    public function __construct(
        public UsuarioRepositoryInterface $usuarioRepository,
    ) {}

    public function listar(array $parametros = []): mixed
    {
        return $this->usuarioRepository->listarTodos($parametros);
    }
    
    public function novo(array $dados): void
    {
        $this->usuarioRepository->criar($dados);
    }

    public function buscarPorId(int $id): mixed
    {
        $this->verificaUsuarioOu404($id);
        return $this->usuarioRepository->encontrarPorId($id);
    }

    public function atualizar(int $id, array $dados): void
    {
        $this->verificaUsuarioOu404($id);
        $this->usuarioRepository->atualizar($id, $dados);
    }

    public function deletar(int $id): void
    {
        $this->verificaUsuarioOu404($id);
        $this->usuarioRepository->deletar($id);
    }

    
    private function verificaUsuarioOu404(int $id)
    {
        $transacao = $this->usuarioRepository->encontrarPorId($id);

        if (!$transacao) {
            throw new NaoEncontradoException('Usuario');
        }

        return $transacao;
    }
}