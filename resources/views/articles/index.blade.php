@extends('layouts.app')

@section('title', 'Articles')

@section('content')
<div class="d-flex justify-content-between align-items-center page-header">
    <div>
        <h1><i class="bi bi-file-earmark-text me-2"></i>Articles</h1>
        <p class="text-muted mb-0">{{ $articles->total() }} article(s) au total</p>
    </div>
    <a href="{{ route('articles.create') }}" class="btn btn-primary btn-lg">
        <i class="bi bi-plus-lg me-1"></i> Nouvel article
    </a>
</div>

<div class="card mb-4">
    <div class="card-body">
        <form method="GET" class="row g-2 align-items-center">
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-search"></i></span>
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control border-start-0" placeholder="Rechercher un titre...">
                </div>
            </div>
            <div class="col-md-3">
                <select name="categorie_id" class="form-select">
                    <option value="">Toutes les catégories</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ request('categorie_id') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->nom }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select name="auteur_id" class="form-select">
                    <option value="">Tous les auteurs</option>
                    @foreach($auteurs as $a)
                        <option value="{{ $a->id }}" {{ request('auteur_id') == $a->id ? 'selected' : '' }}>
                            {{ $a->nom }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 d-grid">
                <button class="btn btn-primary"><i class="bi bi-funnel me-1"></i>Filtrer</button>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body p-0">
        <table class="table table-hover mb-0 align-middle">
            <thead>
                <tr>
                    <th class="ps-4">Titre</th>
                    <th>Auteur</th>
                    <th>Catégorie</th>
                    <th class="text-end pe-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($articles as $article)
                <tr>
                    <td class="ps-4">
                        <div class="fw-semibold">{{ $article->titre }}</div>
                        @if($article->contenu)
                            <small class="text-muted">{{ Str::limit($article->contenu, 60) }}</small>
                        @endif
                    </td>
                    <td>
                        <span class="badge-auteur"><i class="bi bi-person-fill me-1"></i>{{ $article->auteur->nom ?? '—' }}</span>
                    </td>
                    <td>
                        <span class="badge-categorie"><i class="bi bi-tag-fill me-1"></i>{{ $article->categorie->nom ?? '—' }}</span>
                    </td>
                    <td class="text-end pe-4">
                        <a href="{{ route('articles.edit', $article) }}" class="btn btn-sm btn-outline-warning">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('articles.destroy', $article) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Supprimer cet article ?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">
                        <div class="empty-state">
                            <i class="bi bi-inbox"></i>
                            Aucun article trouvé.
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-4 d-flex justify-content-center">
    {{ $articles->links() }}
</div>
@endsection