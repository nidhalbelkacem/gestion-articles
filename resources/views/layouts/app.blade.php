<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestion des Articles')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #4338ca;
            --bg-soft: #f5f6fb;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-soft);
        }
        .navbar {
            background: linear-gradient(90deg, #4f46e5, #7c3aed);
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.3rem;
        }
        .nav-link-custom {
            color: rgba(255,255,255,.9) !important;
            font-weight: 500;
            padding: 8px 16px !important;
            border-radius: 8px;
            transition: 0.2s;
        }
        .nav-link-custom:hover, .nav-link-custom.active {
            background: rgba(255,255,255,.15);
            color: #fff !important;
        }
        .card {
            border: none;
            border-radius: 14px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.06);
        }
        .btn-primary {
            background: var(--primary);
            border-color: var(--primary);
            border-radius: 8px;
            font-weight: 500;
        }
        .btn-primary:hover {
            background: var(--primary-dark);
            border-color: var(--primary-dark);
        }
        .btn, .form-control, .form-select {
            border-radius: 8px;
        }
        .table {
            background: #fff;
            border-radius: 14px;
            overflow: hidden;
        }
        .table thead {
            background: #eef0fc;
        }
        .table thead th {
            border: none;
            font-weight: 600;
            color: #4b5563;
            text-transform: uppercase;
            font-size: 0.78rem;
            letter-spacing: 0.03em;
        }
        .table tbody tr {
            transition: 0.15s;
        }
        .table tbody tr:hover {
            background: #f8f9ff;
        }
        .badge-categorie {
            background: #e0e7ff;
            color: #4338ca;
            font-weight: 500;
            padding: 6px 12px;
            border-radius: 20px;
        }
        .badge-auteur {
            background: #fce7f3;
            color: #be185d;
            font-weight: 500;
            padding: 6px 12px;
            border-radius: 20px;
        }
        .page-header {
            margin-bottom: 2rem;
        }
        .page-header h1 {
            font-weight: 700;
            color: #1f2937;
        }
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #9ca3af;
        }
        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            display: block;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark mb-5 shadow">
        <div class="container">
            <a class="navbar-brand" href="{{ route('articles.index') }}">
                <i class="bi bi-journal-richtext me-2"></i>ArticlesHub
            </a>
            <div class="d-flex gap-2">
                <a href="{{ route('articles.index') }}" class="nav-link-custom {{ request()->routeIs('articles.*') ? 'active' : '' }}">
                    <i class="bi bi-file-earmark-text me-1"></i> Articles
                </a>
                <a href="{{ route('categories.index') }}" class="nav-link-custom {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                    <i class="bi bi-tags me-1"></i> Catégories
                </a>
                <a href="{{ route('auteurs.index') }}" class="nav-link-custom {{ request()->routeIs('auteurs.*') ? 'active' : '' }}">
                    <i class="bi bi-people me-1"></i> Auteurs
                </a>
            </div>
        </div>
    </nav>

    <div class="container mb-5">
        @if(session('success'))
            <div class="alert alert-success d-flex align-items-center shadow-sm" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>