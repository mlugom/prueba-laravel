@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        @if (isset($registro))
                            Editar registro
                        @else
                            Crear nuevo registro
                            @php
                                $registro = null;
                            @endphp
                        @endif
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ $action }}">
                            @csrf
                            @if (isset($registro))
                               @method("put")
                            @endif
                            <div class="mb-2">
                                <label for="nombre" class="form-label">Nombre: </label>
                                <input type="text" name="nombre" class="form-control"
                                    value="{{ old('nombre', $registro?->nombre) }}" />
                                @error('nombre')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="descripcion" class="form-label">Descripción: </label>
                                <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control">{{ old('descripcion', $registro?->descripcion) }}</textarea>
                                @error('descripcion')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-center">
                                <input type="submit" value="Guardar" class="btn btn-primary mt-3">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
