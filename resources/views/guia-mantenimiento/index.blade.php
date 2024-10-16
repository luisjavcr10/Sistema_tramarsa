@extends('layout.layout')

@section('content')
<div class="container">
    <h1>Guías de Mantenimiento</h1>
    <a href="{{ route('guia-mantenimiento.create') }}" class="btn btn-primary mb-3">Agregar Nueva Guía de Mantenimiento</a>

    @if($guiasMantenimiento->isEmpty())
        <p>No hay registros de guías de mantenimiento.</p>
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
                    <th>Serie</th>
                    <th>Ubicación</th>
                    <th>Empleado</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($guiasMantenimiento as $guiaMantenimiento)
                    <tr>
                        <td>{{ $guiaMantenimiento->GuiManID }}</td>
                        <td>{{ $guiaMantenimiento->maquinaria->Nombre }}</td>
                        <td>{{ $guiaMantenimiento->almacen->Nombre }}</td>
                        <td>{{ $guiaMantenimiento->Numero }}</td>
                        <td>{{ $guiaMantenimiento->FechaInicio }}</td>
                        <td>{{ $guiaMantenimiento->FechaFin ?? 'En curso' }}</td>
                        <td>{{ $guiaMantenimiento->Serie }}</td>
                        <td>{{ $guiaMantenimiento->Ubicacion }}</td>
                        <td>{{ $guiaMantenimiento->empleado->Nombre }}</td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
