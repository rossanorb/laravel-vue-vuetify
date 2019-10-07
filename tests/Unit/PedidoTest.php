<?php

namespace Tests\Unit;

use App\Models\Pedido;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PedidoTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBuscaNumeroPedido()
    {
        $pedido = Pedido::with('historico')->get()->find(1)->toArray();
        $data['status'] = true;
        $data['info'][] = $pedido;
        $response  = $this->get('/pedidos/1');
        $response->assertStatus(200)->assertJson($data);
    }

    public function testBuscaPorData()
    {
        $pedidos = Pedido::whereDate('created_at', '>=', '2019-09-20')->with('historico')->get()->toArray();
        foreach ($pedidos as $k => $pedido) {
            $data['status'] = true;
            $data['info'][] = $pedido;
        }
        $response  = $this->get('/pedidos?data_inicial=20/09/2019');
        $response->assertStatus(200)->assertJson($data);
    }

    public function testValidacaoBuscaPorData()
    {
        $pedidos = Pedido::whereDate('created_at', '>=', '2019-09-20')->with('historico')->get()->toArray();
        foreach ($pedidos as $k => $pedido) {
            $data['status'] = true;
            $data['info'][] = $pedido;
        }
        $response  = $this->get('/pedidos?data_inicial=20/13/2019');
        $response->assertStatus(302);
    }

    public function testDetalhesPedidos()
    {
        $pedido = Pedido::find(3);
        $data['status'] = true;
        $data['info']['status'] = $pedido->historico()->first()->status;
        $data['itens'] = $pedido->produtos()->get()->toArray();
        $data['info'] = $pedido->toArray();
        $response  = $this->get('/pedidos/3/detalhes');
        $response->assertStatus(200)->assertJson($data);
    }
}
