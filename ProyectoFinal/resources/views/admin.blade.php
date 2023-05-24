@extends('template-Admin')
@section('content')
<div class="container mt-5">
    <h1 class="text-center ">GESTOR DE PRODUCTOS</h1>
    @if(session()->has('success'))
        <div class="alert alert-success text-center" role="alert"><strong>{{session('success')}}!</strong></div>
    @endif
    <div class="container">
    <table class="table text-center mt-5">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">descripcionBreve</th>
                <th scope="col">descuento</th>
                <th scope="col">imagen</th>
                <th scope="col">precio</th>
                <th scope="col">stock</th>
                <th scope="col text-center">Acciones</th>

            </tr>
        </thead>
        <tbody> 
            @foreach($productos as $producto)
            <tr>
                <th>{{$producto->id}}</th>
                <td>{{$producto->nombre}}</td>
                <td>{{$producto->descripcionBreve}}</td>
                <td>{{$producto->descuento}}</td>
                <td><img src="{{ $producto->imagenUrl }}" style="height: 40px; width:40px;" class="img-fluid mb-1" alt="{{ $producto->nombre }}"></td>
                <td>{{$producto->precio}}</td>
                <td>{{$producto->stock}}</td>
                <td>
                    <div class="container row">
                        <div class="container col-3 warning">
                            <form action="{{ route('admin.mostrarModificar', $producto->id) }}" method="GET">
                            @csrf 
                                <button type="button " class="btn mb-1" style="background-color:#F6EC0C;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path fill="#3B8DF4" d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                        <path fill="#3B8DF4" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                    </svg>
                                </button>    
                            </form>
                        </div>
                        <div class="container col-3">    
                            <form action="{{ route('admin.destroy', $producto->id) }}" method="post">
                            @csrf 
                                <button type="button " class="btn mb-1" style="background-color:#F2150D;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path fill="#ffffff" d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                    </svg>
                                </button>
                            </form>    
                        </div>          
                    </div>   
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    <div class="container col-2">    
        <form action="{{ route('admin.crear-producto') }}" method="GET">
        @csrf 
            <button class="btn btn-outline btn-success mt-5 mb-2" type="submit" value="Borrar"><strong>Crear Producto</strong></button>    
        </form>    
    </div>
    
</div>
@endsection