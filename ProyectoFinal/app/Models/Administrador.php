<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;


require_once("Usuario.php");
class Administrador extends Usuario
{
    protected $fillable = [
        'idAdministrador',
    ];
}
