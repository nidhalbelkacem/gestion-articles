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
                    <select name="auteur_id" class="form-select @error('auteur_id') is-invalid @enderror">
                        <option value="">-- Choisir un auteur --</option>
                        @foreach($auteurs as $a)
                            <option value="{{ $a->id }}" {{ old('auteur_id') == $a->id ? 'selected' : '' }}>{{ $a->nom }}</option>
                        @endforeach
                    </select>
                    @error('auteur_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Catégorie</label>
                    <select name="categorie_id" class="form-select @error('categorie_id') is-invalid @enderror">
                        <option value="">-- Choisir une catégorie --</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('categorie_id') == $cat->id ? 'selected' : '' }}>{{ $cat->nom }}</option>
                        @endforeach
                    </select>
                    @error('categorie_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
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