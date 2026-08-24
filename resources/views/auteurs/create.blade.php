@extends('layouts.app')

@section('title', 'Nouvel auteur')

@section('content')
<div class="page-header">
    <a href="{{ route('auteurs.index') }}" class="text-decoration-none text-muted small">
        <i class="bi bi-arrow-left me-1"></i>Retour aux auteurs
    </a>
    <h1 class="mt-2"><i class="bi bi-plus-circle me-2"></i>Nouvel auteur</h1>
</div>

<div class="card" style="max-width: 500px;">
    <div class="card-body p-4">
        <form action="{{ route('auteurs.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="form-label fw-semibold">Nom</label>
                <input type="text" name="nom" class="form-control form-control-lg @error('nom') is-invalid @enderror" value="{{ old('nom') }}" placeholder="Nom de l'auteur">
                @error('nom') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-primary px-4"><i class="bi bi-check-lg me-1"></i>Enregistrer</button>
                <a href="{{ route('auteurs.index') }}" class="btn btn-light px-4">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection