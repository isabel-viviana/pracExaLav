@extends('layouts.app')

@section('title', 'Módulos')

@section('content')
    <div class="page-heading">
        <div>
            <h2>Módulos</h2>
            <p>Listado de módulos registrados.</p>
        </div>
        <a class="button button-primary" href="{{ route('modules.create') }}">+ Crear módulo</a>
    </div>

    <div class="table-wrap">
    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($modules as $module)
                <tr>
                    <td>{{ $module['id'] }}</td>
                    <td>{{ $module['codigo'] }}</td>
                    <td>{{ $module['nombre'] }}</td>
                    <td class="actions">
                        <a class="button button-secondary" href="{{ route('modules.show', $module['id']) }}">Ver</a>
                        <a class="button button-primary" href="{{ route('modules.edit', $module['id']) }}">Editar</a>
                        <form class="inline-form" action="{{ route('modules.destroy', $module['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="button button-danger" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection
