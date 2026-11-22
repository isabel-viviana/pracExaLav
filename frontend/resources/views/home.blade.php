@extends('layouts.app')

@section('title', 'Home | Gestión Académica')

@section('content')
    <section class="home-intro">
        <h1>Gestión Académica</h1>
        <p>Administra desde un solo lugar la información de docentes, aprendices y módulos del sistema.</p>
    </section>

    <section class="home-grid" aria-label="Accesos directos">
        <article class="home-card">
            <h2>Docentes</h2>
            <p>Consulta y administra los registros de docentes.</p>
            <a class="button button-secondary" href="{{ route('teachers.index') }}">Ir a docentes</a>
        </article>
        <article class="home-card">
            <h2>Aprendices</h2>
            <p>Consulta y administra los registros de aprendices.</p>
            <a class="button button-secondary" href="{{ route('students.index') }}">Ir a aprendices</a>
        </article>
        <article class="home-card">
            <h2>Módulos</h2>
            <p>Consulta y administra los módulos académicos.</p>
            <a class="button button-secondary" href="{{ route('modules.index') }}">Ir a módulos</a>
        </article>
    </section>
@endsection
