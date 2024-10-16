@extends('layout.layout')

@section('content')
    <h1>Lista de Almacenes</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('almacen.create') }}" class="btn btn-primary">Crear Nuevo Almacen</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Nombre</th>
                <th>Ubicacion</th>
                <th>Capacidad</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($almacenes as $almacen)
                <tr>
                    <td>{{ $almacen->AlmacenID }}</td>
                    <td>{{ $almacen->Codigo }}</td>
                    <td>{{ $almacen->Nombre }}</td>
                    <td>{{ $almacen->Ubicacion }}</td>
                    <td>{{ $almacen->Capacidad }}</td>
                    <td>{{ $almacen->Estado }}</td>
                    <td>
                        <a href="{{ route('almacen.edit', $almacen->AlmacenID) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('almacen.destroy', $almacen->AlmacenID) }}" method="POST" style="display:inline-block;">
                            @csrf   
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta categoría?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
