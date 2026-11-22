@extends('layouts.app')

@section('title', 'Detalle de módulo')

@section('content')
    <h2>Detalle de módulo</h2>

    <section class="detail-card">
        <p class="detail-row"><strong>ID:</strong> {{ $module['id'] }}</p>
        <p class="detail-row"><strong>Código:</strong> {{ $module['codigo'] }}</p>
        <p class="detail-row"><strong>Nombre:</strong> {{ $module['nombre'] }}</p>
        <p class="detail-row"><strong>Creado:</strong> {{ $module['created_at'] }}</p>
        <p class="detail-row"><strong>Actualizado:</strong> {{ $module['updated_at'] }}</p>
    </section>

    <div class="detail-actions">
        <a class="button button-muted" href="{{ route('modules.index') }}">Volver al listado</a>
        <a class="button button-primary" href="{{ route('modules.edit', $module['id']) }}">Editar módulo</a>
    </div>
@endsection
