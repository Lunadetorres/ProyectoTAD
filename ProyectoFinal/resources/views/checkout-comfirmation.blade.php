@extends('template')

@section('content')
<div class="container">
    <h1>Todos los productos pedidos</h1>
    <div class="row">
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Pedido</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio Unitario</th>
                        <th scope="col">Precio Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                    <tr>
                        <td>{{ $item->idPedido }}</td>
                        <td>{{ $item->idProducto }}</td>
                        <td>{{ $item->cantidad }}</td>
                        <td>${{ $item->precio }}</td>
                        <td>${{ $item->precio * $item->cantidad}}</td>
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
        </div>
    </div>
</div>
@endsection