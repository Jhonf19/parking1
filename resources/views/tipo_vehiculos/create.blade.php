@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header text-center">Nuevo Tipo de vehiculo</div>
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
                    <form action="{{ route('tipo_vehiculos.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="tipo" class="form-control" placeholder="Tipo" autofocus value="{{ old('tipo') }}" autofocus>
                        </div>
                                               
                        <button class="btn btn-primary" type="submit">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection