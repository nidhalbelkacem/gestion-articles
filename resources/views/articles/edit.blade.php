@extends('layouts.app')

@section('content')
<h1>Modifier l'article</h1>

<form action="{{ route('articles.update', $article) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Titre</label>
        <input type="text" name="titre" class="form-control" value="{{ old('titre', $article->titre) }}">
        @error('titre') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Auteur</label>
        <select name="auteur_id" class="form-select">
            <option value="">-- Choisir --</option>
            @foreach($auteurs as $a)
                <option value="{{ $a->id }}" {{ old('auteur_id', $article->auteur_id) == $a->id ? 'selected' : '' }}>
                    {{ $a->nom }}
                </option>
            @endforeach
        </select>
        @error('auteur_id') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Catégorie</label>
        <select name="categorie_id" class="form-select">
            <option value="">-- Choisir --</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ old('categorie_id', $article->categorie_id) == $cat->id ? 'selected' : '' }}>
                    {{ $cat->nom }}
                </option>
            @endforeach
        </select>
        @error('categorie_id') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Contenu</label>
        <textarea name="contenu" class="form-control" rows="5">{{ old('contenu', $article->contenu) }}</textarea>
    </div>

    <button class="btn btn-success">Mettre à jour</button>
    <a href="{{ route('articles.index') }}" class="btn btn-secondary">Annuler</a>
</form>
@endsection -->