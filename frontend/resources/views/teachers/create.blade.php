@extends('layouts.app')

@section('title', 'Crear docente')

@section('content')
    <h2>Crear docente</h2>

    <form class="form-card" action="{{ route('teachers.store') }}" method="POST">
        @csrf

        <div class="form-field">
            <label for="nombre">Nombre</label>
            <input class="form-input" id="nombre" name="nombre" type="text" value="{{ old('nombre') }}">
            @error('nombre')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-field">
            <label for="apellido">Apellido</label>
            <input class="form-input" id="apellido" name="apellido" type="text" value="{{ old('apellido') }}">
            @error('apellido')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-field">
            <label for="telefono">Teléfono</label>
            <input class="form-input" id="telefono" name="telefono" type="text" value="{{ old('telefono') }}">
            @error('telefono')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-field">
            <label for="cedula">Cédula</label>
            <input class="form-input" id="cedula" name="cedula" type="text" value="{{ old('cedula') }}">
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
