<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $Usuario = Usuario::where('id', '=', $id)->get()->first();
        if ($Usuario) {
            return view('perfil', compact('Usuario'));
        } else {
            return redirect('productos');
        }
    }

    public function store(Request $request)
    {
        $datosUsuario = request()->except('_token');

        $usuario = Usuario::where('id', '=', $datosUsuario['userId'])->get()->first();
        $user = User::where('id', '=', $datosUsuario['userId'])->get()->first();


        if ($usuario != null && $user != null) {
            $usuario->nombreUsuario = $datosUsuario['nombreUsuario'];
            $usuario->email = $datosUsuario['email'];
            $usuario->password = Hash::make($datosUsuario['password']);
            $usuario->direccion = $datosUsuario['direccion'];
            $usuario->nombre = $datosUsuario['nombre'];
            $usuario->apellidos = $datosUsuario['apellidos'];
            $usuario->telefono = $datosUsuario['telefono'];
            $usuario->save();

            $user->name = $datosUsuario['nombre'];
            $user->email = $datosUsuario['email'];
            $user->forceFill([
                'password' => Hash::make($datosUsuario['password']),
            ]);
            $user->save();
        }

        return redirect('productos');
    }
}
