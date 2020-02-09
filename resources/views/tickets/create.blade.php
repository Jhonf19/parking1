@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header text-center">Nuevo Ingreso</div>
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
                    <form action="{{ route('tickets.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="fecha" class="form-control" placeholder="Fecha" value="{{ old('fecha') ?? date('Y/m/d') }}" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" name="in" class="form-control" placeholder="Hora In" value="{{ old('in') ?? date('h:i a') }}" readonly>
                        </div>
                        <div class="form-group">
                            <select class="custom-select" name="vehiculo">
                                <option selected>Vehiculo</option>
                                @foreach($vehiculos as $vehiculo)
                                <option value="{{ $vehiculo->id }}">{{ $vehiculo->placa }}</option>
                                @endforeach
                            </select>
                        </div>
                    
                        
                        <button class="btn btn-primary" type="submit">Ingresar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection