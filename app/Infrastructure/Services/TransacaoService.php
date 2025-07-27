<?php

namespace App\Infrastructure\Services;

use App\Domains\Transacao\Interfaces\TransacaoRepositoryInterface;
use App\Domains\Transacao\Interfaces\TransacaoServiceInterface;
use App\Exceptions\NaoEncontradoException;

class TransacaoService implements TransacaoServiceInterface
{
    public function __construct(
        public TransacaoRepositoryInterface $transacaoRepository,
    ) {}
    
    public function criar(array $dados): void
    {
        $this->transacaoRepository->salvar($dados);
    }

    public function mostrar(int $id): mixed
    {
        $this->verificaTransacaoOu404($id);
        return $this->buscarPorId($id);
    }

    public function atualizar(int $id, array $dados): void
    {
        $this->verificaTransacaoOu404($id);
        $this->transacaoRepository->atualizar($id, $dados);
    }


    public function buscarPorId(int $id): mixed
    {
        return $this->transacaoRepository->encontrarPorId($id);
    }

    public function listar(array $parametros = []): mixed
    {
        return $this->transacaoRepository->listarTodos($parametros);
    }

    public function deletar(int $id): void
    {
        $this->verificaTransacaoOu404($id);
        $this->transacaoRepository->deletar($id);
    }

    private function verificaTransacaoOu404(int $id)
    {
        $transacao = $this->buscarPorId($id);

        if (!$transacao) {
            throw new NaoEncontradoException('Transacao');
        }

        return $transacao;
    }
}