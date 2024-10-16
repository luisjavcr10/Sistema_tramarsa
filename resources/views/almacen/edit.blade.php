@extends('layout.layout')

@section('content')

    <h1>Editar Categoría</h1>

    <form action="{{ route('almacen.update', $almacen->AlmacenID) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="Codigo" class="form-label">Código</label>
            <input type="text" name="Codigo" class="form-control" id="Codigo" value="{{ $almacen->Codigo }}" required>
        </div>
        <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre</label>
            <input type="text" name="Nombre" class="form-control" id="Nombre" value="{{ $almacen->Nombre }}" required>
        </div>
        
        <div class="mb-3">
            <label for="Ubicacion" class="form-label">Ubicacion</label>
            <input type="text" name="Ubicacion" class="form-control" id="Ubicacion" value="{{ $almacen->Ubicacion }}" required>
        </div>
        <div class="mb-3">
            <label for="Capacidad" class="form-label">Capacidad</label>
            <input type="text" name="Capacidad" class="form-control" id="Capacidad" value="{{ $almacen->Capacidad }}" required>
        </div>
        <div class="form-group">
            <label for="Estado">Estado:</label>
            <select name="Estado" class="form-control @error('Estado') is-invalid @enderror" id="Estado" required>
                <option value="1" {{ old('Estado') == '1' ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ old('Estado') == '0' ? 'selected' : '' }}>Inactivo</option>
            </select>
            @error('Estado')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('almacen.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
