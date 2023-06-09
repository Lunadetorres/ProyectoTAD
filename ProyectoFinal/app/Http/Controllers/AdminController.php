<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Producto;

class AdminController extends Controller
{
    public function index()
    {
        
        $productos = Producto::all();
        return view('admin', compact('productos'));

    }
    
    public function createProduct()
    {
        return view('crear-producto');
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            // Add validation rules for other fields
        ]);

        $producto = new Producto([
            'nombre' => $request->nombre,
            // Assign other fields
        ]);

        $producto->save();

        return redirect()->route('create-product')->with('success', 'El producto se añadió con exito');
    }
}
