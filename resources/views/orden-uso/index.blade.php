@extends('layout.layout')

@section('content')
<div class="container">
    <h1>Órdenes de Uso</h1>
    <a href="{{ route('orden-uso.create') }}" class="btn btn-primary mb-3">Agregar Nueva Orden de Uso</a>

    @if($ordenesUso->isEmpty())
        <p>No hay registros de órdenes de uso.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Maquinaria</th>
                    <th>Almacén</th>
                    <th>Número</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Fin</th>
                    <th>Ubicación</th>
                    <th>Empleado</th>
                    <th>Estado</th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach($ordenesUso as $ordenUso)
                    <tr>
                        <td>{{ $ordenUso->OrdUsoID }}</td>
                        <td>{{ $ordenUso->maquinaria->Nombre }}</td>
                        <td>{{ $ordenUso->almacen->Nombre }}</td>
                        <td>{{ $ordenUso->Numero }}</td>
                        <td>{{ $ordenUso->FechaInicio }}</td>
                        <td>{{ $ordenUso->FechaFin ?? 'En curso' }}</td>
                        <td>{{ $ordenUso->Ubicacion }}</td>
                        <td>{{ $ordenUso->empleado->Nombre }}</td>
                        <td>{{ $ordenUso->Estado ? 'Activo' : 'Inactivo' }}</td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
