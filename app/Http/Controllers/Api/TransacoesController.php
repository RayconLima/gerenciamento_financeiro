<?php

namespace App\Http\Controllers\Api;

use App\Domains\Transacao\Interfaces\TransacaoServiceInterface;
use App\Http\Requests\Transacao\SalvarTransacaoRequest;
use \App\Exceptions\NaoEncontradoException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransacoesController extends Controller
{
    public function __construct(
        public TransacaoServiceInterface $transacaoService
    ) {}

    public function index(Request $request)
    {
        $parametros = $request->only(['id', 'usuario_id']);
        return $this->transacaoService->listar($parametros);
    }

    public function show(int $id)
    {
        $transacao = $this->transacaoService->mostrar($id);
        return response()->json($transacao);
    }

    public function store(SalvarTransacaoRequest $request)
    {
        $this->transacaoService->criar($request->validated());
        
        return response()->json(['message' => 'Transação criada com sucesso'], 201);
    }

    public function update(int $id, Request $request)
    {
        $this->transacaoService->atualizar($id, $request->all());
        
        return response()->json(['message' => 'Transação atualizada com sucesso'], 200);
    }

    public function destroy(int $id)
    {
        $this->transacaoService->deletar($id);

        return response()->noContent();
    }
}
