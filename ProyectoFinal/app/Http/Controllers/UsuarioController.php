<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function index()
    {
        $email = Auth::user()->email;
        $Usuario = Usuario::where('email', '=', $email)->get();
        if ($Usuario->count() == 1) {
            return view('perfil', compact('Usuario'));
        } else {
            return redirect('productos');
        }
        
        //return view('perfil');
    }

    public function store(Request $request)
    {
        $datosUsuario = request()->except('_token');

        Usuario::insert($datosUsuario);
        return redirect('productos');
    }
}
