<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [   
        'idUsuario',
        'nombreUsuario',
        'email',
        'password',
        'direccion',
        'nombre',
        'apellidos',
        'telefono',
        'fechaNacimiento'
    ];
}
