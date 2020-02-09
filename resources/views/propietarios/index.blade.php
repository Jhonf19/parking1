@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <a class="btn btn-primary" href="{{ route('propietarios.create') }}">Agregar Nuevo Propietario</a><br><hr>
            <table class="table table-bordered table-striped">
                <thead>
                    <th>Documento</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    @foreach($propietarios as $propietario)
                    <tr>
                        <td>{{ $propietario->documento }}</td>
                        <td>{{ $propietario->nombre }}</td>
                        <td>{{ $propietario->correo }}</td>
                        <td>{{ $propietario->telefono }}</td>
                        <td>
                            <a href="{{ route('propietarios.edit', $propietario->id) }}" class="btn btn-warning">Editar</a>
                       
                        <!-- <form action="{{ route('propietarios.destroy', $propietario->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Borrar</button>
                        </form> -->
                        
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        <div class="d-flex justify-content-center">
        {{ $propietarios->onEachSide(3)->links() }}
        </div>
        </div>
        
    </div>
</div>
@endsection