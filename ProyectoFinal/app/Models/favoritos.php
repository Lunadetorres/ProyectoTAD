<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;

class favoritos extends Model
{
    protected $fillable = [
        'idUsuario',
        'idProducto'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'idProducto');
    }
}
