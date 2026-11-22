@extends('layouts.app')

@section('title', 'Detalle de docente')

@section('content')
    <h2>Detalle de docente</h2>

    <section class="detail-card">
        <p class="detail-row"><strong>ID:</strong> {{ $teacher['id'] }}</p>
        <p class="detail-row"><strong>Nombre:</strong> {{ $teacher['nombre'] }}</p>
        <p class="detail-row"><strong>Apellido:</strong> {{ $teacher['apellido'] }}</p>
        <p class="detail-row"><strong>Teléfono:</strong> {{ $teacher['telefono'] }}</p>
        <p class="detail-row"><strong>Cédula:</strong> {{ $teacher['cedula'] }}</p>
        <p class="detail-row"><strong>Creado:</strong> {{ $teacher['created_at'] }}</p>
        <p class="detail-row"><strong>Actualizado:</strong> {{ $teacher['updated_at'] }}</p>
    </section>

    <div class="detail-actions">
        <a class="button button-muted" href="{{ route('teachers.index') }}">Volver al listado</a>
        <a class="button button-primary" href="{{ route('teachers.edit', $teacher['id']) }}">Editar docente</a>
    </div>
@endsection
