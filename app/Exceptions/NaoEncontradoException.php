<?php

namespace App\Exceptions;

use App\Exceptions\Traits\RenderToJson;
use Illuminate\Http\JsonResponse;
use Exception;

class NaoEncontradoException extends Exception
{
    use RenderToJson;

    protected string $contexto;
    protected int $statusCode = 404;

    public function __construct(string $contexto, int $code = 404)
    {
        $this->contexto = $contexto;
        parent::__construct("$this->contexto não encontrado", $code);
    }

    public function getContexto(): string
    {
        return $this->contexto;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function render(): JsonResponse
    {
        return response()->json([
            'error'   => "{$this->contexto}Error",
            'message' => $this->getMessage()
        ], $this->getStatusCode());
    }
}
