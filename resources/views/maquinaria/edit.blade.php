@extends('layout.layout') <!-- Asegúrate de que este archivo extienda tu layout principal -->

@section('content')
<div class="container">
    <h1>Editar Maquinaria</h1>
    <form action="{{ route('maquinaria.update', $maquinaria->MaquinariaID) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="Codigo">Código:</label>
            <input type="text" class="form-control" id="Codigo" name="Codigo" value="{{ $maquinaria->Codigo }}" required>
        </div>
        <div class="form-group">
            <label for="Nombre">Nombre:</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" value="{{ $maquinaria->Nombre }}" required>
        </div>
        <div class="form-group">
            <label for="Marca">Marca:</label>
            <input type="text" class="form-control" id="Marca" name="Marca" value="{{ $maquinaria->Marca }}" required>
        </div>
        <div class="form-group">
            <label for="Modelo">Modelo:</label>
            <input type="text" class="form-control" id="Modelo" name="Modelo" value="{{ $maquinaria->Modelo }}" required>
        </div>
        <div class="form-group">
            <label for="CategoriaID">Categoría:</label>
            <select class="form-control" id="CategoriaID" name="CategoriaID" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->CategoriaID }}" {{ $maquinaria->CategoriaID == $categoria->CategoriaID ? 'selected' : '' }}>
                        {{ $categoria->Nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
