@extends('template')

@section('content')
<div class="container">
    <h1>Checkout</h1>
    <form method="POST" action="{{ route('checkout.process') }}">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>

        <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" name="city" required>
        </div>

        <div class="form-group">
            <label for="state">State</label>
            <input type="text" class="form-control" id="state" name="state" required>
        </div>

        <div class="form-group">
            <label for="zip">Zip Code</label>
            <input type="text" class="form-control" id="zip" name="zip" required>
        </div>

        <div class="form-group">
            <label for="card-number">Card Number</label>
            <input type="text" class="form-control" id="card-number" name="card-number" required>
        </div>

        <div class="form-group">
            <label for="card-expiry">Card Expiry</label>
            <input type="text" class="form-control" id="card-expiry" name="card-expiry" placeholder="MM/YY" required>
        </div>

        <div class="form-group">
            <label for="card-cvc">Card CVC</label>
            <input type="text" class="form-control" id="card-cvc" name="card-cvc" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit Payment</button>
    </form>
</div>
@endsection