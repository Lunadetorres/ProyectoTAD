@extends('template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Order Confirmation') }}</div>

                <div class="card-body">
                    <h5 class="card-title">{{ __('¡GRACIAS POR TU COMPRA!') }}</h5>
                    <p class="card-text">{{ __('Tu pedido se ha realizado correctamente') }}</p>
                    <p class="card-text">{{ __('Order ID') }}: {{ $pedidoId }}</p>
                    <p class="card-text">{{ __('Total') }}: ${{ $totalPrice }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection