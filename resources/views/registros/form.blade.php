@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear nuevo registro</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('registros.store') }}">
                            @csrf
                            <div>
                                <label for="nombre" class="form-label">Nombre: </label>
                                <input type="text" name="nombre" class="form-control" />
                            </div>

                            <div>
                                <label for="descripcion" class="form-label">Descripción: </label>
                                <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control"></textarea>
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
