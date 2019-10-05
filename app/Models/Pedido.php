<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['status', 'data'];

    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'produtos_pedidos', 'pedidos_id', 'produtos_id')
        ->withPivot(['quantidade', 'valor_unitario']);
    }
}
