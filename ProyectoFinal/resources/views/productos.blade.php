@extends('template')

@section('content')

<div class="container">
    <h1 class="text-center mb-3" style="color:#88389c;">TU COSMÉTICA ONLINE</h1>
    <div class="row ">
        @foreach ($productos as $producto)
        <div class="col-sm-3 mb-5 border-0" >
            <div class="card border-0" style=" width:200px; " >
                <img src="/images/{{ $producto->imagenUrl }}"  style="height: 200px; width:200px;" class="img-fluid mb-1" alt="{{ $producto->nombre }}">
                <div class="card-body text-center m-0 p-0" style="max-height: 150px;">
                    <h5 class="card-title m-0 p-0">{{ $producto->nombre }}</h5>
                    <p class="card-text m-0 p-0">{{ $producto->descripcion }}</p>
                    <p class="card-text h5 m-0 mb-1 p-0" style="color:#88389c;"> {{ $producto->precio }}€</p>
                    <!-- <a href="#" class="btn btn-primary">Add cart</a> -->
                    <form action="{{ route('cart.add', $producto) }}" method="POST">
                        @csrf
                        <button type="button " class="btn btn-lila mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                            <path fill="#ffffff" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
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