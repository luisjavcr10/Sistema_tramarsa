@extends('layout.layout')

@section('content')
<div class="container">
    <h1>Agregar Nueva Guía de Mantenimiento</h1>

    <form action="{{ route('guia-mantenimiento.store') }}" method="POST">
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
            <label for="Numero">Número:</label>
            <input type="text" class="form-control @error('Numero') is-invalid @enderror" id="Numero" name="Numero" value="{{ old('Numero') }}" required>
            @error('Numero')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="FechaInicio">Fecha de Inicio:</label>
            <input type="date" class="form-control @error('FechaInicio') is-invalid @enderror" id="FechaInicio" name="FechaInicio" value="{{ old('FechaInicio') }}" required>
            @error('FechaInicio')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="FechaFin">Fecha de Fin:</label>
            <input type="date" class="form-control @error('FechaFin') is-invalid @enderror" id="FechaFin" name="FechaFin" value="{{ old('FechaFin') }}">
            @error('FechaFin')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="Serie">Serie:</label>
            <input type="text" class="form-control @error('Serie') is-invalid @enderror" id="Serie" name="Serie" value="{{ old('Serie') }}" required>
            @error('Serie')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="Ubicacion">Ubicación:</label>
            <input type="text" class="form-control @error('Ubicacion') is-invalid @enderror" id="Ubicacion" name="Ubicacion" value="{{ old('Ubicacion') }}" required>
            @error('Ubicacion')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="Observaciones">Observaciones:</label>
            <textarea class="form-control @error('Observaciones') is-invalid @enderror" id="Observaciones" name="Observaciones">{{ old('Observaciones') }}</textarea>
            @error('Observaciones')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="EmpleadoID">Empleado:</label>
            <select name="EmpleadoID" class="form-control @error('EmpleadoID') is-invalid @enderror" id="EmpleadoID" required>
                <option value="">Selecciona un Empleado</option>
                @foreach($empleados as $empleado)
                    <option value="{{ $empleado->EmpleadoID }}" {{ old('EmpleadoID') == $empleado->EmpleadoID ? 'selected' : '' }}>
                        {{ $empleado->Nombre }}
                    </option>
                @endforeach
            </select>
            @error('EmpleadoID')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('guia-mantenimiento.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
