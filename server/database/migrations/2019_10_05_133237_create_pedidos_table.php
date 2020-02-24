<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->dateTime('data')->nullable();
            $table->double('total', 8, 2);
            $table->integer('cnpj')->unsigned();
            $table->string('estado', 15);
            $table->string('pais', 15);
            $table->string('telefone', 15);
            $table->text('comentario')->nullable();
            $table->text('bairro', 30);
            $table->text('cidade', 30);
            $table->text('cep', 10);
            $table->text('endereco', 30);
            $table->integer('numero')->unsigned();
            $table->text('executivo_vendas', 50)->nullable();
            $table->integer('nfe')->nullable();
            $table->date('nfe_data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
