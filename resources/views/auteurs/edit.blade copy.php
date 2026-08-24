@extends('layouts.app')

@section('content')
<h1>Modifier l'auteur</h1>

<form action="{{ route('auteurs.update', $auteur) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nom</label>
        <input type="text" name="nom" class="form-control" value="{{ old('nom', $auteur->nom) }}">
        @error('nom') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <button class="btn btn-success">Mettre à jour</button>
    <a href="{{ route('auteurs.index') }}" class="btn btn-secondary">Annuler</a>
</form>
@endsection