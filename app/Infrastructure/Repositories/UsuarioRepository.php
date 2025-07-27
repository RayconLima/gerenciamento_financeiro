<?php

namespace App\Infrastructure\Repositories;

use App\Models\User;
use App\Domains\Usuario\Interfaces\UsuarioRepositoryInterface;

class UsuarioRepository implements UsuarioRepositoryInterface
{
    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function listarTodos(array $filtros = []): mixed
    {
        return $this->model->all();
    }

    public function encontrarPorEmail(string $email): ?User
    {
        return $this->model->where('email', $email)->first();
    }

    public function encontrarPorId(int $id): ?User
    {
        return $this->model->find($id);
    }

    public function criar(array $entradas): void
    {
        $this->model->create($entradas);
    }

    public function atualizar(int $id, array $entradas): void
    {
        $usuario = $this->encontrarPorId($id);
        if ($usuario) {
            $usuario->update($entradas);
        }
    }

    public function deletar(int $id): void
    {
        $usuario = $this->encontrarPorId($id);
        if ($usuario) {
            $usuario->delete();
        }
    }



//     public function listarTodos(array $parametros = []): array
//     {
//         return $this->model::all()->toArray();
//     }

//     public function encontrarPorEmail(string $email): ?User
//     {
//         return $this->model->where('email', $email)->first();
//     }

//     public function encontrarPorId(int $id): ?User
//     {
//         return $this->model->where('id', $id)->first();
//     }

//     public function deletar(int $id): void
//     {
//         $usuario = $this->encontrarPorId($id);
//         $usuario->delete();
//     }
}
