<?php

namespace App\Http\Services;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PedidosService
{
    private $pedidos = [
        'status' => false,
        'info' => [],
    ];

    private $detalhes = [
        'status' => false,
        'info' => []
    ];

    public function find(int $id): array
    {
        $pedido = Pedido::with('historico')->get()->find($id);

        if ($pedido instanceof Pedido) {
            $this->pedidos['status'] = true;
            $this->pedidos['info'][] = $pedido;
        }

        return $this->pedidos;
    }

    public function findByDate(Request $request): array
    {
        $date = Carbon::createFromFormat('d/m/Y', $request->get('data_inicial'));
        $pedidos = Pedido::whereDate('created_at', '>=', $date->toDateString())->with('historico')->get();

        foreach ($pedidos as $k => $pedido) {
            $this->pedidos['status'] = true;
            $this->pedidos['info'][] = $pedido;
        }

        return $this->pedidos;
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
