<?php

use App\Models\Pedido;
use Illuminate\Database\Seeder;

class ProdutosPedidosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pedido::Create([
            'status' => 1,
            'data' => '2019-10-05 11:55:19'
        ]);

        Pedido::find(1)->produtos()->attach([1 => ['valor_unitario' => 179.59, 'quantidade' => 1 ],4 => ['valor_unitario' => 198.00, 'quantidade' => 2 ] ]);

    }
}
