@extends('template')

@section('content')

<div class="container">
    <h1 class="text-center mb-3" style="color:#88389c;">TUS PRODUCTOS FAVORITOS</h1>
    @if(session()->has('success'))
    <div class="alert alert-success text-center" role="alert"><strong>{{session('success')}}!</strong></div>
    @endif
    @if(session()->has('fail'))
    <div class="alert alert-danger text-center" role="alert"><strong>{{session('fail')}}!</strong></div>
    @endif
    <div class="row ">
        @foreach ($Productosfavoritos as $productosfavoritos)
        <div class="col-sm-3 mb-5 border-0">
            <div class="card border-0" style=" width:200px; ">
                <img src="{{ $productosfavoritos->imagenUrl }}" style="height: 200px; width:200px;" class="img-fluid mb-1" alt="{{ $productosfavoritos->nombre }}">
                <div class="card-body text-center m-0 p-0" style="max-height: 150px;">
                    <h5 class="card-title m-0 p-0">{{ $productosfavoritos->nombre }}</h5>
                    <p class="card-text m-0 p-0">{{ $productosfavoritos->descripcionBreve }}</p>
                    <p class="card-text h5 m-0 mb-1 p-0" style="color:#88389c;"> {{ $productosfavoritos->precio }}€</p>
                    <!-- <a href="#" class="btn btn-primary">Add cart</a> -->
                    <div class="row">
                        <div class="col-sm-4 d-flex justify-content-center">
                            <form action="{{ route('cart.add', $productosfavoritos) }}" method="POST">
                                @csrf
                                <button type="button " class="btn mb-1" style="background-color:#88389c;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                        <path fill="#ffffff" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                        <div class="col-sm-4 d-flex justify-content-center">
                            <form action="{{ route('favoritos.destroy', $productosfavoritos->id) }}" method="POST">
                                @csrf
                                <button type="button " class="btn mb-1" style="background-color:#F2150D;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path fill="#ffffff" d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                        <div class="col-sm-4 d-flex justify-content-center">
                            <form action="{{route('productos.editar',$productosfavoritos->id)}}" method="GET">
                                @csrf
                                <button type="button " class="btn mb-1" style="background-color:#F6EC0C;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path fill="#3B8DF4" d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                        <path fill="#3B8DF4" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection