<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function index()
    {
        return view('perfil');
    }

    public function store(Request $request)
    {
        $datosUsuario = request()->except('_token');
        Usuario::insert($datosUsuario);
        return redirect('productos');
    }
}
