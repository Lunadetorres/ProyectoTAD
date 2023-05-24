@extends('template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Modificar Producto') }}</div>

                <div class="card-body">
                    <form method="get" action="route{{'admin.modificar'}}" >
                        @csrf
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $producto->nombre }}" required autofocus>

                                @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descripcionBreve" class="col-md-4 col-form-label text-md-right">{{ __('Descripción breve') }}</label>

                            <div class="col-md-6">
                                <textarea id="descripcionBreve" class="form-control " name="descripcionBreve" required>{{ $producto->descripcionBreve }}</textarea>

                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descripcionLarga" class="col-md-4 col-form-label text-md-right">{{ __('Descripción larga') }}</label>

                            <div class="col-md-6">
                                <textarea id="descripcionLarga" class="form-control " name="descripcionLarga" required>{{  $producto->descripcionLarga }}</textarea>

                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="precio" class="col-md-4 col-form-label text-md-right">{{ __('Precio') }}</label>

                            <div class="col-md-6">
                                <input id="precio" type="number" step="0.01" class="form-control @error('precio') is-invalid @enderror" name="precio" value="{{ $producto->precio }}" required>

                                @error('precio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="stock" class="col-md-4 col-form-label text-md-right">{{ __('Stock') }}</label>

                            <div class="col-md-6">
                                <input id="stock" type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ $producto->stock }}" required>

                                @error('stock')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descuento" class="col-md-4 col-form-label text-md-right">{{ __('Descuento') }}</label>

                            <div class="col-md-6">
                                <input id="descuento" type="text" class="form-control @error('descuento') is-invalid @enderror" name="descuento" value="{{ $producto->descuento }}" required autofocus>

                                @error('descuento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="imagenUrl" class="col-md-4 col-form-label text-md-right">{{ __('ImagenUrl') }}</label>

                            <div class="col-md-6">
                                <input id="imagenUrl" type="text" class="form-control @error('imagenUrl') is-invalid @enderror" name="imagenUrl" value="{{ old('imagenUrl') }}" required autofocus>

                                @error('imagenUrl')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Modificar Producto</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection