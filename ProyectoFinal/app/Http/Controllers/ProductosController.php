<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::paginate(10);
        return view('productos', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crear-producto');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcionBreve' => 'required',
            'descripcionGrande' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'imagenUrl' => 'nullable|url',
            'categoria' => 'required',
            'descuento' => 'required',
        ]);

        $producto = Producto::create([
            'nombre' => $request->nombre,
            'descripcionBreve' => $request->descripcionBreve,
            'descripcionGrande' => $request->descripcionGrande,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'imagenUrl' => $request->imagenUrl,
            'categoria' => $request->categoria,
            'descuento' => $request->descuento,
        ]);

        $producto->save();

        return redirect()->route('admin.index')->with('success', 'Producto creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('mostrarProducto', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Producto::destroy($id);
        return redirect()->back()->with('success', 'Eliminado el producto con éxito');
    }

    public function mostrarModificar($id)
    {
        $producto = Producto::findOrFail($id);
        return view('modificarProducto', compact('producto'));
    }

    public function modificar(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcionBreve' => 'required',
            'descripcionGrande' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'imagenUrl' => 'nullable|url',
            'categoria' => 'required',
            'descuento' => 'descuento',

        ]);      
        
        $datosProducto = request()->except('_token');

        $producto = Producto::where('id', '=', $datosProducto['id'])->get()->first();
        
        if ($producto != null) {
            $producto->nombre = $datosProducto['nombre'];
            $producto->descripcionBreve = $datosProducto['descripcionBreve'];
            $producto->descripcionGrande = $datosProducto['descripcionGrande'];
            $producto->precio = $datosProducto['precio'];
            $producto->stock = $datosProducto['stock'];
            $producto->imagenUrl = $datosProducto['imagenUrl'];
            $producto->categoria = $datosProducto['categoria'];
            $producto->descuento = $datosProducto['descuento'];
            $producto->save();
        }

        return view('admin.index')->with('success', 'Producto modificado con éxito');
        
    }

}

