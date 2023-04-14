@extends('template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Order Confirmation') }}</div>

                <div class="card-body">
                    <h5 class="card-title">{{ __('Thank you for your purchase!') }}</h5>
                    <p class="card-text">{{ __('Your order has been successfully processed.') }}</p>
                    <p class="card-text">{{ __('Order ID') }}: {{ $pedidoId }}</p>
                    <p class="card-text">{{ __('Total amount') }}: ${{ $totalPrice }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection