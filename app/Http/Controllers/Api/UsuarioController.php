<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\User\AtualizarUsuarioRequest;
use App\Http\Requests\User\SalvarUsuarioRequest;
use App\Infrastructure\Repositories\UsuarioRepository;
use App\Infrastructure\Services\UsuarioService;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
     public function __construct(
        public UsuarioRepository $usuarioRepository,
        public UsuarioService $usuarioService
    ) {}

    public function index(Request $request)
    {        
        $todos = $this->usuarioService->listar();
        return UserResource::collection($todos);
    }

    public function show(int $id)
    {
        $encontrado = $this->usuarioService->buscarPorId($id);
        return UserResource::make($encontrado);
    }

     public function store(SalvarUsuarioRequest $request)
    {
        $this->usuarioService->novo($request->validated());
        
        return response()->json(['message' => 'Usuário criada com sucesso'], 201);
    }

    public function update(int $id, AtualizarUsuarioRequest $request)
    {
        $this->usuarioService->atualizar($id, $request->validated());
        
        return response()->json(['message' => 'Usuário atualizada com sucesso'], 200);
    }

    public function destroy(int $id)
    {
        $this->usuarioService->deletar($id);

        return response()->noContent();
    }

}
