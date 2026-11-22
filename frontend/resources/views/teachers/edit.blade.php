@extends('layouts.app')

@section('title', 'Editar docente')

@section('content')
    <h2>Editar docente</h2>

    <form class="form-card" action="{{ route('teachers.update', $teacher['id']) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-field">
            <label for="nombre">Nombre</label>
            <input class="form-input" id="nombre" name="nombre" type="text" value="{{ old('nombre', $teacher['nombre']) }}">
            @error('nombre')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-field">
            <label for="apellido">Apellido</label>
            <input class="form-input" id="apellido" name="apellido" type="text" value="{{ old('apellido', $teacher['apellido']) }}">
            @error('apellido')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-field">
            <label for="telefono">Teléfono</label>
            <input class="form-input" id="telefono" name="telefono" type="text" value="{{ old('telefono', $teacher['telefono']) }}">
            @error('telefono')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-field">
            <label for="cedula">Cédula</label>
            <input class="form-input" id="cedula" name="cedula" type="text" value="{{ old('cedula', $teacher['cedula']) }}">
            @error('cedula')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-actions">
            <button class="button button-primary" type="submit">Guardar</button>
            <a class="button button-muted" href="{{ route('teachers.index') }}">Cancelar</a>
        </div>
    </form>
@endsection
