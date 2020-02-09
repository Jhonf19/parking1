@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header text-center">Nuevo Propietario</div>
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
                    <form action="{{ route('propietarios.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="documento" class="form-control" placeholder="Numero de cedula" autofocus value="{{ old('documento') }}" autofocus>
                        </div>
                        <div class="form-group">
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre Completo" value="{{ old('nombre') }}">
                        </div>
                        <div class="form-group">
                            <input type="email" name="correo" class="form-control" placeholder="Correo" value="{{ old('correo') }}">
                        </div>
                        <div class="form-group">
                            <input type="number" name="telefono" class="form-control" placeholder="Numero telefónico" value="{{ old('telefono') }}">
                        </div>
                        <button class="btn btn-primary" type="submit">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection