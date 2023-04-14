<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Carrito;
use App\Models\Producto;

class ArticulosCarrito extends Model
{
    protected $fillable = [
        'idArticulosCarrito',
        'idCarrito',
        'idProducto',
        'cantidad'
    ];

    public function carrito()
    {
        return $this->belongsTo(Carrito::class, 'idCarrito');
    }
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'idProducto');
    }
}
