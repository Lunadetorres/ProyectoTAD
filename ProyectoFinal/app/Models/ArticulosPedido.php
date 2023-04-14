<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pedido;
use App\Models\Producto;

class ArticulosPedido extends Model
{
    protected $fillable = [
        'idArticulosPedido',
        'idPedido',
        'idProducto',
        'cantidad',
        'precio'
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'idPedido');
    }
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'idProducto');
    }
}
