<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;

class Pedido extends Model
{
    protected $fillable = [
        'idPedido',
        'idUsuario',
        'estado',
        'cantidadTotal'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }
}
