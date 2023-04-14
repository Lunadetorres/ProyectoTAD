<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'idProducto',
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'imagenUrl',
        'categoria',
        'descuento'
    ];
}
