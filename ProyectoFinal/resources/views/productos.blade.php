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
                    <p class="card-text">Descripción: {{ $producto->descripcion }}</p>
                    <p class="card-text">Precio: {{ $producto->precio }}€</p>
                    <!-- <a href="#" class="btn btn-primary">Add cart</a> -->
                    <form action="{{ route('cart.add', $producto) }}" method="POST">
                        @csrf
                        <button type="button" class="btn btn-secondary ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
            </svg>
                          </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection