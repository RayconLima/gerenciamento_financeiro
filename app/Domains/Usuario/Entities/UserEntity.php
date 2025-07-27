<?php


namespace App\Domains\Usuario\Entities;

class UserEntity
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $email
    ) {}
}