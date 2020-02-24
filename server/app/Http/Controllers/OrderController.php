<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\PedidosService;
use App\Http\Requests\OrderRequest;
use Response;

class OrderController extends Controller
{
    private $pedidoService;

    public function __construct(PedidosService $pedidoService)
    {
        $this->pedidoService = $pedidoService;
    }

    public function index(OrderRequest $request)
    {
        $pedidos = $this->pedidoService->findByDate($request);

        if($pedidos->count() == 0){
            return $this->response($pedidos, false, 404);
        }
        
        return $this->response($pedidos);
    }

    public function show(int $id)
    {
        $pedido = $this->pedidoService->find($id);
        
        if($pedido->count() == 0){
            return $this->response($pedido, false, 404);
        }

        return $this->response($pedido);
    }

    public function details(int $id)
    {
        $pedido = $this->pedidoService->details($id);
        if($pedido->count() == 0){
            return $this->response($pedido, false, 404);            
        }
        return $this->response($pedido);
    }    


}