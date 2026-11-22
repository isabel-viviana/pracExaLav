@extends('layouts.app')

@section('title', 'Aprendices')

@section('content')
    <div class="page-heading">
        <div>
            <h2>Aprendices</h2>
            <p>Listado de aprendices registrados.</p>
        </div>
        <a class="button button-primary" href="{{ route('students.create') }}">+ Crear aprendiz</a>
    </div>

    <div class="table-wrap">
    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha de nacimiento</th>
                <th>Expediente</th>
                <th>Fotografía</th>
                <th>ID del módulo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student['id'] }}</td>
                    <td>{{ $student['nombre'] }}</td>
                    <td>{{ $student['apellido'] }}</td>
                    <td>{{ $student['fechaNacimiento'] }}</td>
                    <td>{{ $student['expediente'] }}</td>
                    <td>
                        @if (!empty($student['fotografia']))
                            <img src="{{ $student['fotografia'] }}" alt="Fotografía de {{ $student['nombre'] }}" width="80">
                        @else
                            Sin fotografía
                        @endif
                    </td>
                    <td>{{ $student['module_id'] }}</td>
                    <td class="actions">
                        <a class="button button-secondary" href="{{ route('students.show', $student['id']) }}">Ver</a>
                        <a class="button button-primary" href="{{ route('students.edit', $student['id']) }}">Editar</a>
                        <form class="inline-form" action="{{ route('students.destroy', $student['id']) }}" method="POST">
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
