<?php

namespace App\Domains\Usuario\Actions;

use App\Domains\Usuario\Interfaces\UsuarioRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use App\Application\Usuario\DTOs\LoginData;

class LoginUsuarioAction
{
    public function __construct(
        protected UsuarioRepositoryInterface $users
    ) {}

    public function execute(LoginData $data): string|false
    {
        $user = $this->users->encontrarPorEmail($data->email);

        if (!$user || !Hash::check($data->password, $user->password)) {
            return false;
        }

        return $user->createToken('auth_token')->plainTextToken;
    }
}