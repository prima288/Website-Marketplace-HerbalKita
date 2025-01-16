@extends('frontend.layout')

@section('content')
<div class="container" style="max-width: 400px; margin-top: 50px;">
    <div class="text-center mb-4">
        <h3 class="fw-bold" style="color: #ff6f00;">DAFTAR AKUN BARU</h3>
    </div>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Input Nama Depan -->
        <div class="form-group mb-3">
            <label for="first_name" class="form-label" style="color: #010101;">Nama Depan</label>
            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror"
                   name="first_name" value="{{ old('first_name') }}" required autofocus
                   placeholder="Masukkan nama depan Anda"
                   style="width: 100%; padding: 10px; border: none; border-bottom: 1px solid #010101; outline: none;">
            @error('first_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <!-- Input Nama Belakang -->
        <div class="form-group mb-3">
            <label for="last_name" class="form-label" style="color: #010101;">Nama Belakang</label>
            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                   name="last_name" value="{{ old('last_name') }}" required
                   placeholder="Masukkan nama belakang Anda"
                   style="width: 100%; padding: 10px; border: none; border-bottom: 1px solid #010101; outline: none;">
            @error('last_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <!-- Input Email -->
        <div class="form-group mb-3">
            <label for="email" class="form-label" style="color: #010101;">Email</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                   name="email" value="{{ old('email') }}" required
                   placeholder="Masukkan email Anda"
                   style="width: 100%; padding: 10px; border: none; border-bottom: 1px solid #010101; outline: none;">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <!-- Input Password dengan Icon Mata -->
        <div class="form-group mb-3" style="position: relative;">
            <label for="password" class="form-label" style="color: #010101;">Kata Sandi</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                   name="password" required placeholder="Masukkan kata sandi Anda"
                   style="width: 100%; padding: 10px; border: none; border-bottom: 1px solid #010101; outline: none;">
            <i class="fa fa-eye" id="togglePassword" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #888;"></i>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <!-- Input Konfirmasi Password -->
        <div class="form-group mb-3">
            <label for="password-confirm" class="form-label" style="color: #010101;">Konfirmasi Kata Sandi</label>
            <input id="password-confirm" type="password" class="form-control"
                   name="password_confirmation" required
                   placeholder="Ulangi kata sandi Anda"
                   style="width: 100%; padding: 10px; border: none; border-bottom: 1px solid #010101; outline: none;">
        </div>

        <!-- Tombol Register -->
        <div class="mb-3">
            <button type="submit" class="btn w-100"
                style="display: inline-block; margin: 10px 0; padding: 18px 20px; font-size: 16px; line-height: 1; background-color: #f57f17; color: white; border: 2px solid #f57f17; border-radius: 8px; width: 100%; text-align: center;">
                Daftar
            </button>
        </div>

        <!-- Sudah Punya Akun? -->
        <!-- <div class="text-center mt-3">
            <p>Sudah memiliki akun? <a href="{{ route('login') }}" style="color: #ff6f00; text-decoration: underline;">Masuk</a></p>
        </div> -->
    </form>
</div>
@endsection
