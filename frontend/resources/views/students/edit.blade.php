@extends('layouts.app')

@section('title', 'Editar aprendiz')

@section('content')
    <h2>Editar aprendiz</h2>

    <form class="form-card" action="{{ route('students.update', $student['id']) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-field">
            <label for="nombre">Nombre</label>
            <input class="form-input" id="nombre" name="nombre" type="text" value="{{ old('nombre', $student['nombre']) }}">
            @error('nombre')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-field">
            <label for="apellido">Apellido</label>
            <input class="form-input" id="apellido" name="apellido" type="text" value="{{ old('apellido', $student['apellido']) }}">
            @error('apellido')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-field">
            <label for="fechaNacimiento">Fecha de nacimiento</label>
            <input class="form-input" id="fechaNacimiento" name="fechaNacimiento" type="date" value="{{ old('fechaNacimiento', $student['fechaNacimiento']) }}">
            @error('fechaNacimiento')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-field">
            <label for="expediente">Expediente</label>
            <input class="form-input" id="expediente" name="expediente" type="text" value="{{ old('expediente', $student['expediente']) }}">
            @error('expediente')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-field">
            <label for="fotografia">Fotografía</label>
            @if (!empty($student['fotografia']))
                <img src="{{ $student['fotografia'] }}" alt="Fotografía actual de {{ $student['nombre'] }}" width="120">
            @else
                <p>No hay fotografía.</p>
            @endif
            <input class="form-input" id="fotografia" name="fotografia" type="file" accept="image/*">
            @error('fotografia')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-field">
            <label for="module_id">Módulo</label>
            <select class="form-select" id="module_id" name="module_id">
                @isset($modules)
                    @foreach ($modules as $module)
                        <option value="{{ $module['id'] }}" @selected(old('module_id', $student['module_id']) == $module['id'])>
                            {{ $module['nombre'] }}
                        </option>
                    @endforeach
                @else
                    <option value="{{ old('module_id', $student['module_id']) }}" selected>
                        Módulo actual (ID {{ old('module_id', $student['module_id']) }})
                    </option>
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
