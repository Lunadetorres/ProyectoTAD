<?php

namespace App\Http\Controllers;

use App\Models\favoritos;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;


class FavoritosController extends Controller
{

    public function addToFavoritos($id)
    {
        $email = Auth::user()->email;
        $existe = favoritos::where('idProducto', '=', $id)->where('email', '=', $email)->get();

        if ($existe->count() == 0) {
            $email = Auth::user()->email;
            $listaFavoritos =
                $favoritos = new favoritos();
            $favoritos->idProducto = $id;
            $favoritos->email = $email;
            $favoritos->save();
            return redirect()->back()->with('success', 'Producto agregado a favoritos.');
        } else {
            return redirect()->back()->with('fail', 'Producto ya existe en favoritos.');
        }

        /**
         * return redirect()->route('favoritos.index');
         */
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $email = Auth::user()->email;
        $idProductos = favoritos::select('idProducto')->where('email', '=', $email)->distinct()->get()->pluck('idProducto')->toArray();
        $Productosfavoritos = Producto::whereIn('id', $idProductos)->get();
        return view('favoritos', compact('Productosfavoritos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\favoritos  $favoritos
     * @return \Illuminate\Http\Response
     */
    public function show(favoritos $favoritos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\favoritos  $favoritos
     * @return \Illuminate\Http\Response
     */
    public function edit(favoritos $favoritos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\favoritos  $favoritos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, favoritos $favoritos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\favoritos  $favoritos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idfavoritos = favoritos::select('id')->where('idProducto', '=', $id)->get();
        favoritos::destroy($idfavoritos);
        return redirect()->back()->with('success', 'Borrado producto de favoritos con éxito');
    }
}
