@extends('layout.layout') <!-- Asegúrate de que este archivo extienda tu layout principal -->

@section('content')
<div class="container">
    <h1>Crear Nueva Maquinaria</h1>
    <form action="{{ route('maquinaria.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="Codigo">Código:</label>
            <input type="text" class="form-control" id="Codigo" name="Codigo" value="{{ old('Codigo') }}" required>
        </div>
        <div class="form-group">
            <label for="Nombre">Nombre:</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" value="{{ old('Nombre') }}" required>
        </div>
        <div class="form-group">
            <label for="Marca">Marca:</label>
            <input type="text" class="form-control" id="Marca" name="Marca" value="{{ old('Marca') }}" required>
        </div>
        <div class="form-group">
            <label for="Modelo">Modelo:</label>
            <input type="text" class="form-control" id="Modelo" name="Modelo" value="{{ old('Modelo') }}" required>
        </div>
        <div class="form-group">
            <label for="CategoriaID">Categoría:</label>
            <select name="CategoriaID" class="form-control @error('CategoriaID') is-invalid @enderror" id="CategoriaID" required>
                <option value="">Selecciona una Categoría</option>
                
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->CategoriaID }}" >
                        {{ $categoria->Nombre }}
                    </option>
                @endforeach
            </select>
            @error('CategoriaID')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
