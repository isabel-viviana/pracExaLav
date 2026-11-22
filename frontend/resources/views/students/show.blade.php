@extends('layouts.app')

@section('title', 'Detalle de aprendiz')

@section('content')
    <h2>Detalle de aprendiz</h2>

    <section class="detail-card">
        <p class="detail-row"><strong>ID:</strong> {{ $student['id'] }}</p>
        <p class="detail-row"><strong>Nombre:</strong> {{ $student['nombre'] }}</p>
        <p class="detail-row"><strong>Apellido:</strong> {{ $student['apellido'] }}</p>
        <p class="detail-row"><strong>Fecha de nacimiento:</strong> {{ $student['fechaNacimiento'] }}</p>
        <p class="detail-row"><strong>Expediente:</strong> {{ $student['expediente'] }}</p>
        <p class="detail-row"><strong>Fotografía:</strong>
            @if (!empty($student['fotografia']))
                <img src="{{ $student['fotografia'] }}" alt="Fotografía de {{ $student['nombre'] }}" width="160">
            @else
                Sin fotografía
            @endif
        </p>
        <p class="detail-row"><strong>ID del módulo:</strong> {{ $student['module_id'] }}</p>
        <p class="detail-row"><strong>Creado:</strong> {{ $student['created_at'] }}</p>
        <p class="detail-row"><strong>Actualizado:</strong> {{ $student['updated_at'] }}</p>
    </section>

    <div class="detail-actions">
        <a class="button button-muted" href="{{ route('students.index') }}">Volver al listado</a>
        <a class="button button-primary" href="{{ route('students.edit', $student['id']) }}">Editar aprendiz</a>
    </div>
@endsection
