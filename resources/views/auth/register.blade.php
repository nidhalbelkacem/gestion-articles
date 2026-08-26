@extends('layouts.app')

@section('title', 'Inscription')

@section('content')
<div class="auth-card">
    <div class="card">
        <div class="card-body p-4">
            <h2 class="text-center fw-bold mb-4"><i class="bi bi-person-plus me-2"></i>Inscription</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nom</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autofocus>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Mot de passe</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                    @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Confirmer le mot de passe</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary w-100 mb-3">
                    <i class="bi bi-person-plus me-1"></i>S'inscrire
                </button>

                <div class="text-center">
                    <span class="text-muted small">Déjà un compte ?</span>
                    <a href="{{ route('login') }}" class="text-decoration-none small">Se connecter</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection