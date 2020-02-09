@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <a class="btn btn-primary" href="{{ route('tipo_vehiculos.create') }}">Agregar Nuevo Tipo</a><br><hr>
            <table class="table table-bordered table-striped">
                <thead>
                    <th>Tipo</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    @foreach($tipo_vehiculos as $tipo_vehiculo)
                    <tr>
                        <td>{{ $tipo_vehiculo->tipo }}</td>
                        <td>
                        <a href="{{ route('propietarios.show', $tipo_vehiculo->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('propietarios.show', $tipo_vehiculo->id) }}" class="btn btn-secondary"> <i class="fas fa-edit"></i> Factura</a>
                        <a href="{{ route('propietarios.show', $tipo_vehiculo->id) }}" class="btn btn-success">Abono</a>
                        
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        <div class="d-flex justify-content-center">
        {{ $tipo_vehiculos->onEachSide(3)->links() }}
        </div>
        </div>
        
    </div>
</div>
@endsection