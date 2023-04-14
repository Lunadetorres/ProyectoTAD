<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [   
        'idUsuario',
        'nombreUsuario',
        'nombre',
        'apellidos',
        'email',
        'password',
        'direccion',
        'telefono',
        'fechaNacimiento'
    ];
}
