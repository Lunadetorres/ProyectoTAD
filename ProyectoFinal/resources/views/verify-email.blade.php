
@extends('template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if(session('status'))
        <div class="alert alert-success" role="alert">
            {{session('status')}}
        </div>
        @endif
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verificación de e-mail') }}</div>

                <div class="card-body">
                    <p>Debes verificar tu e-mail</p>
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" value="Resend">
                                    {{ __('Reenviar Email') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection