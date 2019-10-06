<?php

namespace App\Http\Services;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidosService
{
    private $pedidos = [
        'status' => false,
        'info' => [],
    ];

    private $detalhes = [
        'status' => false,
        'info' => [],
        'detalhes' => []
    ];

    public function find(int $id): array
    {
        $pedido = Pedido::find($id);

        if ($pedido instanceof Pedido) {
            $this->pedidos['status'] = true;
            $this->pedidos['info'] = $pedido;
            $this->pedidos['info']['status'] = $pedido->historico()->first()->status;
        }

        return $this->pedidos;
    }

    public function findByDate(Request $request): array
    {
        if ($request->get('data_final')) {
            return ['data_inicial & data_final' => true];
        }

        return ['data_inicial' => true];
    }

    public function details(int $id): array
    {
        $pedido = Pedido::find($id);
        if ($pedido instanceof Pedido) {
            $this->detalhes['status'] = true;
            $this->detalhes['info'] = $pedido;
            $this->detalhes['info']['status'] = $pedido->historico()->first()->status;
            $this->detalhes['itens'] = $pedido->produtos()->get();
        }

        return $this->detalhes;
    }
}
