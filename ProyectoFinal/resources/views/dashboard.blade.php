@extends('template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{session('status')}}
                    </div>
                    @endif
                    Has inicado sesión
                </div>
            </div>
            <form method="GET" action="{{ route('checkout.confirmation') }}">
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="button " class="btn text-white" style="background-color:#88389c; ">
                            {{ __('Todos los productos pedidos') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection