@extends('../layouts/base')
@section('body')

<div class="d-flex align-items-center justify-content-center vh-100 bg-light">
    <div class="card shadow-sm border-0 p-4" style="max-width: 400px; width: 100%; border-radius: 16px;">
        <!-- Logo -->
        <div class="text-center mb-4">
            <img src="{{ asset('images/logo.png') }}" alt="Logo Klinik" height="60">
            <h5 class="mt-3 fw-bold text-primary">Klinik Al-Fiat</h5>
        </div>

        <!-- Pesan Error -->
        @if ($errors->has('username') || $errors->has('password'))
        <div class="alert alert-danger small rounded">
            <i class="fas fa-exclamation-circle me-2"></i>
            Username atau password salah. Silakan coba lagi.
        </div>
        @endif

        <!-- Form Login -->
        <form method="POST" action="{{ route('login-store') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Username</label>
                <input type="text" name="username" class="form-control form-control-lg rounded-3"
                    placeholder="Masukkan username" value="{{ old('username') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Password</label>
                <input type="password" name="password" class="form-control form-control-lg rounded-3"
                    placeholder="Masukkan password" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg rounded-3">
                    <i class="fas fa-sign-in-alt me-2"></i> Masuk
                </button>
            </div>
        </form>

        <!-- Tambahan opsi -->
        <div class="text-center mt-3">
            <a href="#" class="text-decoration-none small text-muted">Lupa password?</a>
        </div>
    </div>
</div>
@endsection