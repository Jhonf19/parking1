@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header text-center">Editar Vehiculo</div>
                <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                    <form action="{{ route('vehiculos.update', $vehiculo->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <input type="text" name="placa" class="form-control" placeholder="Placa" autofocus value="{{ old('placa') ?? $vehiculo->placa }}" autofocus>
                        </div>
                        <div class="form-group">
                            <select class="custom-select" name="tipo">
                                <option selected>Tipo</option>
                                @foreach($tipo_vehiculos as $tipo_vehiculo)
                                <option value="{{ $tipo_vehiculo->id  }}">{{ $tipo_vehiculo->tipo }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="custom-select" name="propietario">
                                <option selected>Propietario</option>
                                @foreach($propietarios as $propietario)
                                <option value="{{ $propietario->id }}">{{ $propietario->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <button class="btn btn-warning" type="submit">Editar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection