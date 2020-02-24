<?php

namespace App\Http\Services;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Carbon\Carbon;


class PedidosService
{


    public function find(int $id) : Pedido
    {
        $pedido = Pedido::with('historico')->get()->find($id);

        if ($pedido instanceof Pedido) {            
            return $pedido;
        }

        return new Pedido();
    }

    public function findByDate(Request $request): \Illuminate\Support\Collection
    {
        $date = Carbon::createFromFormat('d/m/Y', $request->get('data_inicial'));
        $pedidos = Pedido::whereDate('created_at', '>=', $date->toDateString())->with('historico')->get();
        return $pedidos;
    }


    public function details(int $id) : Pedido
    {
        $pedido = Pedido::find($id);

        if ($pedido instanceof Pedido) {
            $response = $pedido;
            $response->status = $pedido->historico()->first()->status;

            $p = $pedido->produtos()->get();
            $p->first()->pivot->valor_unitario = number_format($p->first()->pivot->valor_unitario, 2, ",", ".");
            
            $response->itens = $p;

            return $pedido;
        }

        return new Pedido();
    }    
  
}
