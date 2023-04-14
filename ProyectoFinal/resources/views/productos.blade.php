@extends('template')

@section('content')

<div class="container">
    <h1>Productos</h1>
    <div class="row">
        @foreach ($productos as $producto)
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="{{ $producto->imagenUrl }}" class="img-fluid mb-3" alt="{{ $producto->nombre }}">
                <div class="card-body">
                    <h5 class="card-title">Producto: {{ $producto->nombre }}</h5>
                    <p class="card-text">Descripcion: {{ $producto->descripcion }}</p>
                    <p class="card-text">Precio: ${{ $producto->precio }}</p>
                    <!-- <a href="#" class="btn btn-primary">Add cart</a> -->
                    <form action="{{ route('cart.add', $producto) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">{{ __('Agregar al carrito') }}</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection