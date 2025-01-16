@extends('frontend.layout')

@section('content')
<div class="container" style="max-width: 400px; margin-top: 50px;">
    <div class="text-center mb-4">
        <h3 class="fw-bold" style="color: #ff6f00;">MASUK KE AKUN ANDA</h3>
    </div>
    <form method="POST" action="{{ route('login') }}">
        @csrf

<!-- Input Email -->
<div class="form-group mb-3">
    <label for="email" class="form-label" style="display: block; font-weight: regular; color: #010101">Alamat Email</label>
    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
           name="email" value="{{ old('email') }}" required autofocus
           placeholder="Masukkan email Anda"
           style="width: 100%; padding: 10px; border: none; border-bottom: 1px solid #010101; border-radius: 0; outline: none; box-shadow: none;">
    @error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<!-- Input Password dengan Icon Mata -->
<div class="form-group mb-3" style="position: relative;">
    <label for="password" class="form-label" style="display: block; font-weight: regular; color: #010101">Kata Sandi</label>
    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
           name="password" required placeholder="Masukkan kata sandi Anda"
           style="width: 100%; padding: 10px; border: none; border-bottom: 1px solid #010101; border-radius: 0; outline: none; box-shadow: none;">
    <i class="fa fa-eye" id="togglePassword"
       style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #888;"></i>
    @error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>


      <!-- Tombol Login -->
	   <!-- Tombol Login -->
<div class="mb-3">
    <button type="submit" class="btn w-100"
        style="display: inline-block; margin: 10px 0; padding: 18px 20px; font-size: 16px; line-height: 0.3; background-color: #f57f17; color: white; border: 2px solid #f57f17; border-radius: 8px; width: 100%; text-align: center;">
        Masuk
    </button>
</div>

        <!-- Lupa Kata Sandi & Daftar -->
        <div class="text-left">
            <a href="{{ route('password.request') }}" class="text-decoration-none" style="color: #ff6f00; text-decoration: underline; font-weight: 500;">Lupa Kata Sandi?</a>
        </div>
        <div class="text-center mt-3">
            <p>Belum memiliki akun? </p>
			<a href="{{ url('register') }}" style="display: inline-block; margin: 10px 0; padding: 18px 20px; font-size: 16px; line-height: 0.5; background-color: white; color: #f57f17; border: 2px solid #f57f17; border-radius: 5px; width: 100%; text-align: center;">

            Daftar
        </a>
        </div>
    </form>
</div>
@endsection
