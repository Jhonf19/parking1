@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <a class="btn btn-primary" href="{{ route('tickets.create') }}">Agregar Nuevo Ticket</a><br><hr>
            <table class="table table-bordered table-striped">
                <thead>
                    <th>Fecha</th>
                    <th>Entrada</th>
                    <th>Vehiculo</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    @foreach($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->fecha }}</td>
                        <td>{{ $ticket->in }}</td>
                        <td>{{ $ticket->placa }}</td>
                        <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                        Egresar
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('tickets.update', $ticket->id) }}" method="post">
                            <div class="modal-body">
                                                @method('PUT')
                                                @csrf
                                <div class="form-group">
                                    <input class="form-control" placeholder="Valor hora" type="text" name="v_hora">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">cancelar</button>
                                <button type="submit" class="btn btn-primary">Aceptar</button>
                            </div>
                                </form>
                            </div>
                        </div>
                        </div>
                        
                       
                        
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


