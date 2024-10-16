@extends('layout.layout')

@section('content')

    <h1>Crear Nueva Categoría</h1>

    <form action="{{ route('categoria.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="Codigo" class="form-label">Código</label>
            <input type="text" name="Codigo" class="form-control" id="Codigo" required>
        </div>
        <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre</label>
            <input type="text" name="Nombre" class="form-control" id="Nombre" required>
        </div>
        <div class="mb-3">
            <label for="Descripcion" class="form-label">Descripción</label>
            <textarea name="Descripcion" class="form-control" id="Descripcion"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('categoria.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

@endsection