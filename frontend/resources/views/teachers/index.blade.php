@extends('layouts.app')

@section('title', 'Docentes')

@section('content')
    <div class="page-heading">
        <div>
            <h2>Docentes</h2>
            <p>Listado de docentes registrados.</p>
        </div>
        <a class="button button-primary" href="{{ route('teachers.create') }}">+ Crear docente</a>
    </div>

    <div class="table-wrap">
    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>Cédula</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teachers as $teacher)
                <tr>
                    <td>{{ $teacher['id'] }}</td>
                    <td>{{ $teacher['nombre'] }}</td>
                    <td>{{ $teacher['apellido'] }}</td>
                    <td>{{ $teacher['telefono'] }}</td>
                    <td>{{ $teacher['cedula'] }}</td>
                    <td class="actions">
                        <a class="button button-secondary" href="{{ route('teachers.show', $teacher['id']) }}">Ver</a>
                        <a class="button button-primary" href="{{ route('teachers.edit', $teacher['id']) }}">Editar</a>
                        <form class="inline-form" action="{{ route('teachers.destroy', $teacher['id']) }}" method="POST">
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
