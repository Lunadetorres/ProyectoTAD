@extends('template')

@section('content')
<div class="container">
    <h1 class="text-center" style="color:#88389c;">Checkout</h1>
    <form method="POST" action="{{ route('checkout.process') }}">
        @csrf
        <div class="form-group col-lg-4 mb-3">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group col-lg-4 mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group col-lg-4 mb-3">
            <label for="address">Dirección</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <div class="form-group col-lg-4 mb-3">
            <label for="city">Ciudad</label>
            <input type="text" class="form-control" id="city" name="city" required>
        </div>
        <div class="form-group col-lg-4 mb-3">
            <label for="state">País</label>
            <input type="text" class="form-control" id="state" name="state" required>
        </div>
        <div class="form-group col-lg-4 mb-3">
            <label for="zip">Código Postal</label>
            <input type="text" class="form-control" id="zip" name="zip" required>
        </div>
        <div class="form-group col-lg-4 mb-3">
            <label for="card-number">Número de Tarjeta</label>
            <input type="text" class="form-control" id="card-number" name="card-number" required>
        </div>
        <div class="form-group col-lg-4 mb-3">
            <label for="card-expiry">Fecha expiración</label>
            <input type="text" class="form-control" id="card-expiry" name="card-expiry" placeholder="MM/YY" required>
        </div>
        <div class="form-group col-lg-4 mb-3">
            <label for="card-cvc">CVC</label>
            <input type="text" class="form-control" id="card-cvc" name="card-cvc" required>
        </div>
        <button type="submit" class="bg btn btn-lila ">
            <div class="d-flex justify-content-center">
                <p class="h5"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                        <path fill="#50D51A" d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                        <path fill="#50D51A" d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z" />
                    </svg>
                    Pagar</p>
            </div>
        </button>
    </form>
</div>
@endsection