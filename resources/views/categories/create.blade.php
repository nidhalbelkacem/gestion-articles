@extends('layouts.app')

@section('title', 'Catégories')

@section('content')
<div class="d-flex justify-content-between align-items-center page-header">
    <h1><i class="bi bi-tags me-2"></i>Catégories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary btn-lg">
        <i class="bi bi-plus-lg me-1"></i> Nouvelle catégorie
    </a>
</div>

<div class="row g-3">
    @forelse($categories as $categorie)
    <div class="col-md-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h5 class="fw-semibold mb-1">{{ $categorie->nom }}</h5>
                        <span class="text-muted small"><i class="bi bi-file-earmark-text me-1"></i>{{ $categorie->articles_count }} article(s)</span>
                    </div>
                    <i class="bi bi-tag-fill fs-3 text-primary opacity-25"></i>
                </div>
                <div class="mt-3 d-flex gap-2">
                    <a href="{{ route('categories.edit', $categorie) }}" class="btn btn-sm btn-outline-warning flex-fill">
                        <i class="bi bi-pencil"></i> Modifier
                    </a>
                    <form action="{{ route('categories.destroy', $categorie) }}" method="POST" class="flex-fill">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger w-100" onclick="return confirm('Supprimer cette catégorie ?')">
                            <i class="bi bi-trash"></i> Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="card"><div class="empty-state"><i class="bi bi-inbox"></i>Aucune catégorie.</div></div>
    </div>
    @endforelse
</div>
@endsection