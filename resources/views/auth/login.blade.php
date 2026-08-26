@extends('layouts.app')

@section('title', 'Connexion')

@section('content')
<div class="auth-card">
    <div class="card">
        <div class="card-body p-4">
            <h2 class="text-center fw-bold mb-4"><i class="bi bi-box-arrow-in-right me-2"></i>Connexion</h2>

            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus>
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Mot de passe</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                    @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">Se souvenir de moi</label>
                </div>

                <button type="submit" class="btn btn-primary w-100 mb-3">
                    <i class="bi bi-box-arrow-in-right me-1"></i>Se connecter
                </button>

                <div class="text-center">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-decoration-none small d-block mb-2">Mot de passe oublié ?</a>
                    @endif
                    <span class="text-muted small">Pas encore de compte ?</span>
                    <a href="{{ route('register') }}" class="text-decoration-none small">S'inscrire</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection