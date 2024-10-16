@extends('layout.layout')

@section('content')
    <h1>Lista de Categorías</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('categoria.create') }}" class="btn btn-primary">Crear Nueva Categoría</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->CategoriaID }}</td>
                    <td>{{ $categoria->Codigo }}</td>
                    <td>{{ $categoria->Nombre }}</td>
                    <td>{{ $categoria->Descripcion }}</td>
                    <td>
                        <a href="{{ route('categoria.edit', $categoria->CategoriaID) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('categoria.destroy', $categoria->CategoriaID) }}" method="POST" style="display:inline-block;">
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
