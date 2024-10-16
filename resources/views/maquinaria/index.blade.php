@extends('layout.layout')

@section('content')
    <h1>Lista de Maquinarias</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('maquinaria.create') }}" class="btn btn-primary">Crear Nueva Categoría</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Categoria</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($maquinarias as $maquinaria)
                <tr>
                    <td>{{ $maquinaria->MaquinariaID }}</td>
                    <td>{{ $maquinaria->Codigo }}</td>
                    <td>{{ $maquinaria->Nombre }}</td>
                    <td>{{ $maquinaria->Marca }}</td>
                    <td> {{ $maquinaria->categoria->Nombre }}</td>
                    <td>
                        <a href="{{ route('maquinaria.edit', $maquinaria->MaquinariaID) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('maquinaria.destroy', $maquinaria->MaquinariaID) }}" method="POST" style="display:inline-block;">
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
