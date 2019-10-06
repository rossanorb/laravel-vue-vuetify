<?php

namespace App\Http\Services;

use Illuminate\Http\Request;

class PedidosService
{
    private $response = [
        'status' => false,
        'itens' => [],
        'info' => []
    ];

    public function find(int $id): array
    {
        return $this->response;
    }

    public function findByDate(Request $request): array
    {
        if ($request->get('data_final')) {
            return ['data_inicial & data_final' => true];
        }

        return ['data_inicial' => true];
    }
}
