@extends('layouts.app')

@section('title', 'Editar módulo')

@section('content')
    <h2>Editar módulo</h2>

    <form class="form-card" action="{{ route('modules.update', $module['id']) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-field">
            <label for="codigo">Código</label>
            <input class="form-input" id="codigo" name="codigo" type="text" value="{{ old('codigo', $module['codigo']) }}">
            @error('codigo')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-field">
            <label for="nombre">Nombre</label>
            <input class="form-input" id="nombre" name="nombre" type="text" value="{{ old('nombre', $module['nombre']) }}">
            @error('nombre')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-actions">
            <button class="button button-primary" type="submit">Guardar</button>
            <a class="button button-muted" href="{{ route('modules.index') }}">Cancelar</a>
        </div>
    </form>
@endsection
