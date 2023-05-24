@extends('template')

@section('content')

<div class="container">
    <h1 class="text-center mb-3" style="color:#88389c;">{{ __('TU COSMÉTICA ONLINE') }}</h1>
    @if(session()->has('success'))
    <div class="alert alert-success text-center" role="alert"><strong>{{session('success')}}!</strong></div>
    @endif
    @if(session()->has('fail'))
    <div class="alert alert-danger text-center" role="alert"><strong>{{session('fail')}}!</strong></div>
    @endif
    <div class="row ">
        <div class="col-sm-6 mb-5 border-0">
            <img src="{{ $producto->imagenUrl }}" style="height: 400px; width:400px;" class="rounded mx-auto d-block" alt="{{ $producto->nombre }}">
        </div>
        <div class="col-sm-6 mb-5 border-0 text-center">
            <h5 class="card-title m-5">{{ $producto->nombre }}</h5>
            <p class="card-text m-5">{{ $producto->descripcionGrande }}</p>
            <p class="card-text h5 m-5" style="color:#88389c;"> {{ $producto->precio }}€</p>
            <div class="row">
                <div class="col-sm-3 d-flex justify-content-center"></div>
                <div class="col-sm-2 d-flex justify-content-center">
                    <form action="{{ route('cart.add', $producto) }}" method="POST">
                        @csrf
                        <button type="button " class="btn mb-1" style="background-color:#88389c;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                <path fill="#ffffff" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>
                        </button>
                    </form>
                </div>
                <div class="col-sm-2 d-flex justify-content-center">
                    <form action="{{ route('favoritos.add', $producto->id) }}" method="POST">
                        @csrf
                        <button type="button " class="btn mb-1" style="background-color:#3B8DF4;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                <path fill="#88389c" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                            </svg>
                        </button>
                    </form>
                </div>
                <div class="col-sm-2 d-flex justify-content-center">
                    <form action="{{route('productos')}}" method="GET">
                        @csrf
                        <button type="button " class="btn mb-1" style="background-color:#F6EC0C;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                                <path fill="#88389c" d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                            </svg>
                        </button>
                    </form>
                </div>
                <div class="col-sm-3 d-flex justify-content-center"></div>
            </div>
        </div>
    </div>
</div>

@endsection