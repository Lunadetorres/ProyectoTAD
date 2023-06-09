@extends('template-Admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header body-lila">{{ __('Modificar Producto') }}</div>

                <div class="card-body">
                    <form method="get" action="{{route('admin.modificar')}}" >
                        @csrf
                        <div class="form-group row mb-3">
                            <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('Id') }}</label>

                            <div class="col-md-6">
                                <input id="id" type="text" class="form-control" name="id" value="{{ $producto->id }}" required autocomplete="id" readonly>
                            </div>
                        </div>
                        <div class="form-group row mt-2">
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

                        <div class="form-group row mt-2">
                            <label for="categoria" class="col-md-4 col-form-label text-md-right">{{ __('Categoría') }}</label>

                            <div class="col-md-6">
                                <input id="categoria" type="text" class="form-control @error('categoria') is-invalid @enderror" name="categoria" value="{{ $producto->categoria }}" required autofocus>

                                @error('categoria')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label for="descripcionBreve" class="col-md-4 col-form-label text-md-right">{{ __('Descripción breve') }}</label>

                            <div class="col-md-6">
                                <textarea id="descripcionBreve" class="form-control " name="descripcionBreve" required>{{ $producto->descripcionBreve }}</textarea>

                                
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label for="descripcionGrande" class="col-md-4 col-form-label text-md-right">{{ __('Descripción grande') }}</label>

                            <div class="col-md-6">
                                <textarea id="descripcionGrande" class="form-control " name="descripcionGrande" required>{{  $producto->descripcionGrande }}</textarea>

                               
                            </div>
                        </div>

                        <div class="form-group row mt-2">
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

                        <div class="form-group row mt-2">
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

                        <div class="form-group row mt-2">
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
                        <div class="form-group row mt-2">
                            <label for="imagenUrl" class="col-md-4 col-form-label text-md-right">{{ __('ImagenUrl') }}</label>

                            <div class="col-md-6">
                                <input id="imagenUrl" type="text" class="form-control @error('imagenUrl') is-invalid @enderror" name="imagenUrl" value="{{ $producto->imagenUrl}}" required autofocus>

                                @error('imagenUrl')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-2">Modificar Producto</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection