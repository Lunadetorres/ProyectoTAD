@extends('template')

@section('content')
<div class="container">
    <h1>Confirmación de Compra</h1>
    <div class="row">
        <div class="col-md-8">
            <h2>Detalles del Pedido</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Producto</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio Unitario</th>
                        <th scope="col">Precio Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                    <tr>
                        <td>{{ $item->producto->nombre }}</td>
                        <td>{{ $item->cantidad }}</td>
                        <td>${{ $item->producto->precio }}</td>
                        <td>${{ $item->precio }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <h2>Resumen de Compra</h2>
            <table class="table">
                <tbody>
                    <tr>
                        <td>Productos:</td>
                        <td>{{ $totalItems }}</td>
                    </tr>
                    <tr>
                        <td>Precio Total:</td>
                        <td>${{ $totalPrice }}</td>
                    </tr>
                </tbody>
            </table>
            <form action="{{ route('checkout.process') }}" method="POST">
                @csrf
                <button type="submit" class="bg-white text-dark btn btn-block">{{ __('Pagar') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection