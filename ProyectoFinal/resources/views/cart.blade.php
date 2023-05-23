@extends('template')

@section('content')
<div class="container">
    <h1>Carrito de compras</h1>

    @if(session()->has('success'))
    <div class="alert alert-success text-center" role="alert"><strong>{{session('success')}}!</strong></div>
    @endif
    @if(session()->has('fail'))
    <div class="alert alert-danger text-center" role="alert"><strong>{{session('fail')}}!</strong></div>
    @endif

    <span class="badge badge-pill badge-primary">{{ count($products) }}</span>

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
            @for($i = 0; $i < count($cartItems); $i++) <tr>
                <td><img src="{{ $products[$i]['imagenUrl'] }}" class="img-fluid" style="height: 200px; width:200px;" alt="{{ $products[$i]['nombre'] }}"></td>
                <td>{{ $products[$i]['nombre'] }}</td>
                <td>{{ $products[$i]['precio'] }}€</td>
                <td>
                    <form action="{{ route('cart.update', $cartItems[$i]['id']) }}" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="_method" value="POST">
                        <div class="input-group mb-3" style="max-width: 120px;">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon1">-</button>
                            </div>
                            <input type="number" name="quantity" value="{{ $cartItems[$i]['cantidad'] }}" class="form-control text-center" min="1">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">+</button>
                            </div>
                        </div>
                    </form>

                </td>
                <td>{{ $products[$i]['precio'] * $cartItems[$i]['cantidad'] }}€</td>
                <td>
                    <form action="{{ route('cart.remove', $cartItems[$i]['id']) }}" method="POST">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path fill="#ffffff" d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                            </svg>
                        </button>
                    </form>
                </td>
                </tr>

                @endfor
        </tbody>
    </table>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Productos: {{ $totalItems }}</h6>
                    <h6 class="card-subtitle h1 mb-2 ">Precio total: {{ $totalPrice }}€</h6>
                    <a href="{{ route('checkout.index') }}" class="buttom btn text-white" style="background-color:#88389c;">{{ __('Comprar') }}</a>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection