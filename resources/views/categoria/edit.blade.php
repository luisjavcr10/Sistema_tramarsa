@extends('layout.layout')

@section('content')

    <h1>Editar Categoría</h1>

    <form action="{{ route('categoria.update', $categoria->CategoriaID) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="Codigo" class="form-label">Código</label>
            <input type="text" name="Codigo" class="form-control" id="Codigo" value="{{ $categoria->Codigo }}" required>
        </div>
        <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre</label>
            <input type="text" name="Nombre" class="form-control" id="Nombre" value="{{ $categoria->Nombre }}" required>
        </div>
        <div class="mb-3">
            <label for="Descripcion" class="form-label">Descripción</label>
            <textarea name="Descripcion" class="form-control" id="Descripcion">{{ $categoria->Descripcion }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('categoria.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
