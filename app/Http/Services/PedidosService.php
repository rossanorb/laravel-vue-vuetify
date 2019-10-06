<?php

namespace App\Http\Services;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidosService
{
    private $response = [
        'status' => false,
        'info' => [],
        'itens' => []
    ];

    public function find(int $id): array
    {
        $pedido = Pedido::find($id);

        if ($pedido instanceof Pedido) {
            $this->response['status'] = true;
            $this->response['info'] = $pedido;
            $this->response['itens'] = $pedido->produtos()->get();
        }

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
