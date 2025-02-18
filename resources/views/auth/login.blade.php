@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <div class="row m-0">
        <div class="col-12 p-0">
            <div class="login-card">
                <div>
                    <div>
                        <a href="#" class="logo"><img src="/assets/img/logoweb.png" alt="jspace-logo"></a>
                    </div>
                    <div class="d-flex duo-card">
                        <div class="login-main">
                            <form class="theme-form" method="POST" action="{{ route('login') }}">
                                @csrf
                                <h4>Selamat Datang di J-Tools</h4>
                                <p>Login dulu yuk</p>

                                <div class="form-group">
                                    <label for="username" class="col-md-4 col-form-label text-md-start">{{ __('Username') }}</label>
                                    <div class="form-icon-v2">
                                        <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg></span>
                                        <input id="username" placeholder="Masukkan Username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autofocus>
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <label for="password" class="col-md-4 col-form-label text-md-start">{{ __('Password') }}</label>
        
                                    <div class="form-icon-v2">
                                        <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg></span>
                                        <input id="password" placeholder="Masukkan Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" value="{{ old('username') }}">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
        
                                {{-- <div class="row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div> --}}
        
                                <div class="form-group mt-4">
                                        <button type="submit" class="btn">
                                            Login Sekarang
                                        </button>
        
                                        @if (Route::has('register'))
                                            <a class="btx-s" href="{{ route('register') }}">
                                                {{ __('Daftar dulu') }}
                                            </a>
                                        @endif
                                </div>
                            </form>
                        </div>
                        <div class="login-main guide-card">
                            <div class="guide-content">
                                <h4>Panduan Penggunaan J-Tools</h4>
                                <ul>
                                    <li><strong>Daftar Akun</strong> – Jika belum memiliki akun, klik "Daftar" dan isi data.</li>
                                    <li><strong>Login</strong> – Masukkan username dan password untuk masuk.</li>
                                    <li><strong>Kerjakan Tugas</strong> – Lihat tugas yang diberikan, selesaikan, dan unggah bukti.</li>
                                    <li><strong>Menunggu Persetujuan</strong> – Tugas akan diperiksa oleh Project Manager.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
