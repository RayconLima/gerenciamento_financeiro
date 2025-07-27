<?php

namespace App\Exceptions\Traits;

use Illuminate\Http\JsonResponse;

trait RenderToJson
{
    public function render($request, \Exception $exception): JsonResponse
    {
        if ($exception instanceof HttpException) {
            return response()->json([
                'error' => 'HttpException',
                'message' => $exception->getMessage()
            ], $exception->getStatusCode());
        }

        // Para outras exceções não tratadas (500)
        return response()->json([
            'error' => 'ServerError',
            'message' => 'Erro interno no servidor.'
        ], 500);
    }
}