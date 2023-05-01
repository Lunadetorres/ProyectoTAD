@extends('template')

@section('content')
<div class="container">
    <h1>Carrito de compras</h1>
    @if(session('cart') && count(session('cart')) > 0)
    <span class="badge badge-pill badge-primary">{{ count(session('cart')) }}</span>

    <table class="table">
        <thead>
            <tr>
                <th scope="col text-center">Imagen</th>
                <th scope="col text-center">Producto</th>
                <th scope="col text-center">Precio unitario</th>
                <th scope="col text-center">Cantidad</th>
                <th scope="col text-center">Precio total</th>
                <th scope="col text-center"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cartItems as $id => $cartItem)
            <tr>
                <td><img src="{{ $cartItem['imagenUrl'] }}" class="img-fluid" style="height: 200px; width:200px;" alt="{{ $cartItem['nombre'] }}"></td>
                <td>{{ $cartItem['nombre'] }}</td>
                <td>{{ $cartItem['precio'] }}€</td>
                <td>
                    <form action="{{ route('cart.update', $id) }}" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="_method" value="POST">
                        <div class="input-group mb-3" style="max-width: 120px;">

                            <input type="number" name="quantity" value="{{ $cartItem['cantidad'] }}" class="form-control text-center" min="1">
                        </div>
                    </form>

                </td>
                <td>{{ $cartItem['precio'] * $cartItem['cantidad'] }}€</td>
                <td>
                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path fill="#ffffff" d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                            </svg>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Productos: {{ $totalItems }}</h6>
                    <h6 class="card-subtitle h1 mb-2 ">Precio total: {{ $totalPrice }}€</h6>
                    <a href="{{ route('checkout.index') }}" class="buttom btn btn-lila"  style="background-color:#88389c;">{{ __('Comprar') }}</a>
                </div>
            </div>
        </div>
    </div>

    @else
    <div class="alert alert-warning" role="alert">
        {{ __('El carrito esta vacio') }}
    </div>
    @endif
</div>
@endsection