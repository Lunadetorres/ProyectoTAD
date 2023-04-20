@extends('template')

@section('content')
<div class="container">
    <h1>Checkout</h1>
    <form method="POST" action="{{ route('checkout.process') }}">
        @csrf

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="address">Dirección</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>

        <div class="form-group">
            <label for="city">Ciudad</label>
            <input type="text" class="form-control" id="city" name="city" required>
        </div>

        <div class="form-group">
            <label for="state">País</label>
            <input type="text" class="form-control" id="state" name="state" required>
        </div>

        <div class="form-group">
            <label for="zip">Código Postal</label>
            <input type="text" class="form-control" id="zip" name="zip" required>
        </div>

        <div class="form-group">
            <label for="card-number">Número de Tarjeta</label>
            <input type="text" class="form-control" id="card-number" name="card-number" required>
        </div>

        <div class="form-group">
            <label for="card-expiry">Fecha expiración</label>
            <input type="text" class="form-control" id="card-expiry" name="card-expiry" placeholder="MM/YY" required>
        </div>

        <div class="form-group">
            <label for="card-cvc">CVC</label>
            <input type="text" class="form-control" id="card-cvc" name="card-cvc" required>
        </div>

        <button type="submit" class="bg-white text-dark btn btn-primary">Realizar pago</button>
    </form>
</div>
@endsection