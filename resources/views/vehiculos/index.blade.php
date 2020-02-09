@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <a class="btn btn-primary" href="{{ route('vehiculos.create') }}">Agregar Nuevo Vehiculo</a><br><hr>
            <table class="table table-bordered table-striped">
                <thead>
                    <th>Matricula</th>
                    <th>Tipo</th>
                    <th>Propietario</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    @foreach($vehiculos as $vehiculo)
                    <tr>
                        <td>{{ $vehiculo->placa }}</td>
                        <td>{{ $vehiculo->tipo }}</td>
                        <td>{{ $vehiculo->nombre }}</td>
                        <td>
                        <a href="{{ route('vehiculos.edit', $vehiculo->id) }}" class="btn btn-warning">Editar</a>
                        
                        
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        <div class="d-flex justify-content-center">
      
        </div>
        </div>
        
    </div>
</div>
@endsection