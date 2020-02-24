<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProdutosPedidos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos_pedidos', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('produtos_id')->unsigned();
            $table->foreign('produtos_id')->references('id')->on('produtos');
            $table->integer('pedidos_id')->unsigned();
            $table->foreign('pedidos_id')->references('id')->on('pedidos');
            $table->double('valor_unitario', 8, 2);
            $table->integer('quantidade')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos_pedidos');
    }
}
