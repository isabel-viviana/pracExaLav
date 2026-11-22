<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestión Académica')</title>
    <style>
        :root {
            color-scheme: light;
            font-family: Arial, Helvetica, sans-serif;
            color: #263445;
            background: #f5f7fa;
            font-synthesis: none;
        }

        * {
            box-sizing: border-box;
        }

        body {
            min-width: 320px;
            margin: 0;
            background: #f5f7fa;
            line-height: 1.5;
        }

        a {
            color: #176b87;
        }

        .site-header {
            background: #fff;
            border-bottom: 1px solid #dfe5eb;
        }

        .header-inner,
        .main-content {
            width: min(1120px, calc(100% - 40px));
            margin: 0 auto;
        }

        .header-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-height: 68px;
            gap: 24px;
        }

        .site-name {
            color: #203345;
            font-size: 1.05rem;
            font-weight: 700;
            text-decoration: none;
            white-space: nowrap;
        }

        .main-nav {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .main-nav a {
            padding: 9px 12px;
            border-radius: 4px;
            color: #526170;
            font-size: .95rem;
            text-decoration: none;
        }

        .main-nav a:hover,
        .main-nav a.active {
            background: #eaf3f6;
            color: #155e75;
        }

        .main-content {
            padding: 36px 0 56px;
        }

        h1,
        h2,
        h3 {
            margin-top: 0;
            color: #203345;
            line-height: 1.25;
        }

        h2 {
            margin-bottom: 8px;
            font-size: 1.6rem;
        }

        .page-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            gap: 16px;
        }

        .page-heading p {
            margin: 0;
            color: #697887;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 34px;
            padding: 6px 11px;
            border: 1px solid transparent;
            border-radius: 4px;
            font: inherit;
            font-size: .875rem;
            line-height: 1.25;
            text-decoration: none;
            cursor: pointer;
        }

        .button-primary {
            background: #167c79;
            color: #fff;
        }

        .button-primary:hover {
            background: #116b68;
            color: #fff;
        }

        .button-secondary {
            background: #287ba3;
            color: #fff;
        }

        .button-secondary:hover {
            background: #206989;
            color: #fff;
        }

        .button-danger {
            background: #bd4545;
            color: #fff;
        }

        .button-danger:hover {
            background: #a63838;
            color: #fff;
        }

        .button-muted {
            border-color: #ccd5de;
            background: #fff;
            color: #405262;
        }

        .button-muted:hover {
            background: #f0f3f6;
        }

        .table-wrap {
            overflow-x: auto;
            border: 1px solid #dfe5eb;
            border-radius: 5px;
            background: #fff;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        .data-table th,
        .data-table td {
            padding: 11px 13px;
            border-bottom: 1px solid #e6ebf0;
            vertical-align: middle;
        }

        .data-table th {
            background: #eaf0f4;
            color: #374b5d;
            font-size: .88rem;
            font-weight: 700;
        }

        .data-table tbody tr:nth-child(even) {
            background: #f8fafb;
        }

        .data-table tbody tr:last-child td {
            border-bottom: 0;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 6px;
            white-space: nowrap;
        }

        .inline-form {
            display: inline-flex;
            margin: 0;
        }

        .form-card,
        .detail-card,
        .home-card {
            border: 1px solid #dfe5eb;
            border-radius: 5px;
            background: #fff;
        }

        .form-card {
            width: min(100%, 620px);
            margin: 24px auto 0;
            padding: 24px;
        }

        .form-field {
            margin-bottom: 17px;
        }

        .form-field label {
            display: block;
            margin-bottom: 6px;
            color: #35495b;
            font-size: .92rem;
            font-weight: 600;
        }

        .form-input,
        .form-select {
            display: block;
            width: 100%;
            min-height: 40px;
            padding: 8px 10px;
            border: 1px solid #cbd5df;
            border-radius: 4px;
            background: #fff;
            color: #263445;
            font: inherit;
        }

        .form-input:focus,
        .form-select:focus {
            border-color: #318ba0;
            outline: 2px solid #cde8ed;
        }

        .field-error {
            margin-top: 5px;
            color: #a63838;
            font-size: .875rem;
        }

        .form-actions,
        .detail-actions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 8px;
            margin-top: 22px;
        }

        .detail-card {
            max-width: 720px;
            padding: 8px 22px;
        }

        .detail-row {
            display: flex;
            gap: 8px;
            padding: 10px 0;
            border-bottom: 1px solid #e6ebf0;
        }

        .detail-row:last-child {
            border-bottom: 0;
        }

        .detail-row strong {
            min-width: 150px;
            color: #405262;
        }

        .notice {
            margin: 0 0 18px;
            padding: 11px 14px;
            border: 1px solid #b8ded2;
            border-radius: 4px;
            background: #eef8f3;
            color: #245c49;
        }

        .notice-error {
            border-color: #eccaca;
            background: #fff3f3;
            color: #8c3232;
        }

        .home-intro {
            margin-bottom: 28px;
        }

        .home-intro h1 {
            margin-bottom: 10px;
            font-size: 2rem;
        }

        .home-intro p {
            max-width: 680px;
            margin: 0;
            color: #617181;
            font-size: 1.05rem;
        }

        .home-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
        }

        .home-card {
            padding: 20px;
        }

        .home-card h2 {
            margin-bottom: 8px;
            font-size: 1.2rem;
        }

        .home-card p {
            min-height: 48px;
            margin: 0 0 16px;
            color: #617181;
        }

        @media (max-width: 700px) {
            .header-inner {
                align-items: flex-start;
                flex-direction: column;
                gap: 8px;
                padding: 14px 0;
            }

            .main-nav {
                width: 100%;
                flex-wrap: wrap;
            }

            .main-nav a {
                padding: 7px 9px;
            }

            .main-content {
                padding-top: 26px;
            }

            .home-grid {
                grid-template-columns: 1fr;
            }

            .page-heading {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <header class="site-header">
        <div class="header-inner">
            <a class="site-name" href="{{ route('home') }}">Gestión Académica</a>
            <nav class="main-nav" aria-label="Navegación principal">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}" @if (request()->routeIs('home')) aria-current="page" @endif>Home</a>
                <a href="{{ route('teachers.index') }}" class="{{ request()->routeIs('teachers.*') ? 'active' : '' }}" @if (request()->routeIs('teachers.*')) aria-current="page" @endif>Docentes</a>
                <a href="{{ route('students.index') }}" class="{{ request()->routeIs('students.*') ? 'active' : '' }}" @if (request()->routeIs('students.*')) aria-current="page" @endif>Aprendices</a>
                <a href="{{ route('modules.index') }}" class="{{ request()->routeIs('modules.*') ? 'active' : '' }}" @if (request()->routeIs('modules.*')) aria-current="page" @endif>Módulos</a>
        </nav>
        </div>
    </header>

    <main class="main-content">
        @if ($errors->has('api'))
            <p class="notice notice-error">{{ $errors->first('api') }}</p>
        @endif
        @if (session('success'))
            <p class="notice">{{ session('success') }}</p>
        @endif
        @yield('content')
    </main>
</body>
</html>
