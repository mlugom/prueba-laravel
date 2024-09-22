@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if (count($registros) == 0)
                    <div class="d-flex flex-column align-items-center m-5">
                        <h2>Aún no hay registros</h2>
                        <button type="button" class="btn btn-primary"
                            onclick="window.location.href = `{{ route('registros.create') }}`">Crear nuevo registro</button>
                    </div>
                @else
                    <h1 class="text-center">Registros</h1>
                    <table id="registrosTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Fecha de creación</th>
                                <th>Fecha de modificación</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script>
    <script>
        const data = {!! $registros !!};
    </script>
    <script src="{{ asset('js/table.js') }}"></script>
@endsection
