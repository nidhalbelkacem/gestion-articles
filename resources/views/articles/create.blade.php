@extends('layouts.app')

@section('title', 'Nouvel article')

@section('content')
<div class="page-header">
    <a href="{{ route('articles.index') }}" class="text-decoration-none text-muted small">
        <i class="bi bi-arrow-left me-1"></i>Retour aux articles
    </a>
    <h1 class="mt-2"><i class="bi bi-plus-circle me-2"></i>Nouvel article</h1>
</div>

<div class="card">
    <div class="card-body p-4">
        <form action="{{ route('articles.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">Titre</label>
                <input type="text" name="titre" class="form-control form-control-lg @error('titre') is-invalid @enderror" value="{{ old('titre') }}" placeholder="Titre de l'article">
                @error('titre') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Auteur</label>
                    <input list="auteurs-list" name="auteur_nom" class="form-control @error('auteur_nom') is-invalid @enderror"
                           value="{{ old('auteur_nom') }}" placeholder="Tapez ou choisissez un auteur" autocomplete="off">
                    <datalist id="auteurs-list">
                        @foreach($auteurs as $a)
                            <option value="{{ $a->nom }}">
                        @endforeach
                    </datalist>
                    <small class="text-muted">Tapez un nouveau nom pour créer un auteur automatiquement.</small>
                    @error('auteur_nom') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Catégorie</label>
                    <input list="categories-list" name="categorie_nom" class="form-control @error('categorie_nom') is-invalid @enderror"
                           value="{{ old('categorie_nom') }}" placeholder="Tapez ou choisissez une catégorie" autocomplete="off">
                    <datalist id="categories-list">
                        @foreach($categories as $cat)
                            <option value="{{ $cat->nom }}">
                        @endforeach
                    </datalist>
                    <small class="text-muted">Tapez un nouveau nom pour créer une catégorie automatiquement.</small>
                    @error('categorie_nom') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Contenu</label>
                <textarea name="contenu" class="form-control" rows="6" placeholder="Écrivez le contenu de l'article...">{{ old('contenu') }}</textarea>
            </div>

            <div class="d-flex gap-2">
                <button class="btn btn-primary px-4"><i class="bi bi-check-lg me-1"></i>Enregistrer</button>
                <a href="{{ route('articles.index') }}" class="btn btn-light px-4">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection