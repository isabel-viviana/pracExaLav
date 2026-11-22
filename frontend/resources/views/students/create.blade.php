@extends('layouts.app')

@section('title', 'Crear aprendiz')

@section('content')
    <h2>Crear aprendiz</h2>

    <form class="form-card" action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
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
            <label for="fechaNacimiento">Fecha de nacimiento</label>
            <input class="form-input" id="fechaNacimiento" name="fechaNacimiento" type="date" value="{{ old('fechaNacimiento') }}">
            @error('fechaNacimiento')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-field">
            <label for="expediente">Expediente</label>
            <input class="form-input" id="expediente" name="expediente" type="text" value="{{ old('expediente') }}">
            @error('expediente')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-field">
            <label for="fotografia">Fotografía</label>
            <input class="form-input" id="fotografia" name="fotografia" type="file" accept="image/*">
            @error('fotografia')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-field">
            <label for="module_id">Módulo</label>
            <select class="form-select" id="module_id" name="module_id">
                <option value="">Seleccione un módulo</option>
                @isset($modules)
                    @foreach ($modules as $module)
                        <option value="{{ $module['id'] }}" @selected(old('module_id') == $module['id'])>
                            {{ $module['nombre'] }}
                        </option>
                    @endforeach
                @else
                    <option value="" disabled>No hay módulos enviados por el controlador</option>
                @endisset
            </select>
            @error('module_id')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-actions">
            <button class="button button-primary" type="submit">Guardar</button>
            <a class="button button-muted" href="{{ route('students.index') }}">Cancelar</a>
        </div>
    </form>
@endsection
