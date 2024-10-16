@extends('layout.layout')

@section('content')
<div class="container">
    <h1>Agregar Nuevo Inventario</h1>

    <form action="{{ route('inventario.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="MaquinariaID">Maquinaria:</label>
            <select name="MaquinariaID" class="form-control @error('MaquinariaID') is-invalid @enderror" id="MaquinariaID" required>
                <option value="">Selecciona una Maquinaria</option>
                @foreach($maquinarias as $maquinaria)
                    <option value="{{ $maquinaria->MaquinariaID }}" {{ old('MaquinariaID') == $maquinaria->MaquinariaID ? 'selected' : '' }}>
                        {{ $maquinaria->Nombre }}
                    </option>
                @endforeach
            </select>
            @error('MaquinariaID')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="AlmacenID">Almacén:</label>
            <select name="AlmacenID" class="form-control @error('AlmacenID') is-invalid @enderror" id="AlmacenID" required>
                <option value="">Selecciona un Almacén</option>
                @foreach($almacenes as $almacen)
                    <option value="{{ $almacen->AlmacenID }}" {{ old('AlmacenID') == $almacen->AlmacenID ? 'selected' : '' }}>
                        {{ $almacen->Nombre }}
                    </option>
                @endforeach
            </select>
            @error('AlmacenID')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="Codigo">Código:</label>
            <input type="text" class="form-control @error('Codigo') is-invalid @enderror" id="Codigo" name="Codigo" value="{{ old('Codigo') }}" required>
            @error('Codigo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
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

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('inventario.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
