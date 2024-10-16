@extends('layout.layout')

@section('content')
<div class="container">
    <h1>Inventario</h1>
    <a href="{{ route('inventario.create') }}" class="btn btn-primary mb-3">Agregar Nuevo Inventario</a>

    @if($inventarios->isEmpty())
        <p>No hay registros de inventario.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Código</th>
                    <th>Maquinaria</th>
                    <th>Almacén</th>
                    <th>Estado</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($inventarios as $inventario)
                    <tr>
                        <td>{{ $inventario->id }}</td>
                        <td>{{ $inventario->Codigo }}</td>
                        <td>{{ $inventario->maquinaria->Nombre }}</td>
                        <td>{{ $inventario->almacen->Nombre }}</td>
                        <td>{{ $inventario->Estado ? 'Activo' : 'Inactivo' }}</td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
