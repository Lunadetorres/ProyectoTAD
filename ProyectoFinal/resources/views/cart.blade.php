@extends('template')

@section('content')
<div class="container">
    <h1>Carrito de compras</h1>
    @if(session('cart') && count(session('cart')) > 0)
    <span class="badge badge-pill badge-primary">{{ count(session('cart')) }}</span>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Imagen</th>
                <th scope="col">Producto</th>
                <th scope="col">Precio unitario</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio total</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cartItems as $id => $cartItem)
            <tr>
                <td><img src="{{ $cartItem['imagenUrl'] }}" class="img-fluid" alt="{{ $cartItem['nombre'] }}"></td>
                <td>{{ $cartItem['nombre'] }}</td>
                <td>{{ $cartItem['precio'] }}€</td>
                <td>
                    <form action="{{ route('cart.update', $id) }}" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="_method" value="POST">
                        <div class="input-group mb-3" style="max-width: 120px;">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon1">-</button>
                            </div>
                            <input type="number" name="quantity" value="{{ $cartItem['cantidad'] }}" class="form-control text-center" min="1">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">+</button>
                            </div>
                        </div>
                    </form>

                </td>
                <td>{{ $cartItem['precio'] * $cartItem['cantidad'] }}€</td>
                <td>
                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-danger">{{ __('Remover') }}</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row justify-content-end">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Productos: {{ $totalItems }}</h6>
                    <h6 class="card-subtitle mb-2 text-muted">Precio total: ${{ $totalPrice }}</h6>
                    <a href="{{ route('checkout.index') }}" class="buttom-lila text-dark btn btn-primary">{{ __('Comprar') }}</a>
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