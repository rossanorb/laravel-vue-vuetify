<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'status',
        'data',
        'total',
        'cnpj',
        'estado',
        'cidade',
        'pais',
        'telefone',
        'comentario',
        'bairro',
        'cep',
        'endereco',
        'numero',
        'executivo_vendas',
        'nfe',
        'nfe_data'
    ];

    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'produtos_pedidos', 'pedidos_id', 'produtos_id')
            ->withPivot(['quantidade', 'valor_unitario']);
    }
}
