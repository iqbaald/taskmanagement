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
                            <form class="theme-form" method="POST" action="{{ route('register') }}">
                                @csrf
                                <h4>Daftar di J-Tools Sekarang!</h4>
                                <p>Daftar dulu yuk</p>
    
                                <div class="form-group">
                                    <label for="username" class="col-md-4 col-form-label text-md-start">{{ __('Username') }}</label>
                                    <div class="form-icon-v2">
                                        <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" width="24" height="24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor">
                                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                          </svg></span>
                                        <input id="username" placeholder="Masukkan Username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autofocus>
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
    
                                <div class="form-group">
                                    <label for="email" class="col-md-4 col-form-label text-md-start">{{ __('Email Address') }}</label>
                                    <div class="form-icon-v2">
                                        <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg></span>
                                        <input id="email" placeholder="Masukkan Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                                        @error('email')
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
                                        <input id="password" placeholder="Masukkan Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
    
                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-start">{{ __('Confirm Password') }}</label>
                                    <div class="form-icon-v2">
                                        <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg></span>
                                        <input id="password-confirm" placeholder="Konfirmasi Password" type="password" class="form-control" value="{{ old('password') }}" name="password_confirmation" required>
                                    </div>
                                </div>
    
                                <div class="form-group">
                                    <label for="role" class="col-md-4 col-form-label text-md-start">{{ __('Pilih Peran Anda') }}</label>
                                    <div class="form-icon-v2">
                                        <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
                                            <path d="M5 6m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                            <path d="M12 6m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                            <path d="M19 6m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                            <path d="M5 18m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                            <path d="M12 18m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                            <path d="M5 8l0 8"></path>
                                            <path d="M12 8l0 8"></path>
                                            <path d="M19 8v2a2 2 0 0 1 -2 2h-12"></path>
                                          </svg></span>
                                        <select id="role" name="role" class="form-control" value="{{ old('role') }}" required>
                                            <option value="" disabled selected>Pilih Role</option>
                                            <option value="1">Project Manager</option>
                                            <option value="2">Programmer</option>
                                            <option value="3">Designer</option>
                                            <option value="4">Content Creator</option>
                                        </select>
                                    </div>
                                </div>
                                
    
                                <div class="form-group mt-4">
                                    <button type="submit" class="btn">
                                        Daftar Sekarang
                                    </button>
                                    @if (Route::has('login'))
                                        <a class="btx-s" href="{{ route('login') }}">
                                            {{ __('Login dulu') }}
                                        </a>
                                    @endif
                                </div>
                            </form>
                        </div>
                        <div class="login-main guide-card">
                            <div class="guide-content">
                                <h4>Panduan membuat akun</h4>
                                <p>Ikuti langkah-langkah berikut untuk mendaftar:</p>
                                <ul>
                                    <li><strong>Username:</strong> Masukkan nama pengguna unik yang mudah diingat.</li>
                                    <li><strong>Email Address:</strong> Gunakan email aktif untuk verifikasi akun.</li>
                                    <li><strong>Password:</strong> Buat kata sandi yang kuat minimal 8 karakter.</li>
                                    <li><strong>Confirm Password:</strong> Masukkan ulang kata sandi untuk konfirmasi.</li>
                                    <li><strong>Pilih Peran Anda:</strong> Pilih sesuai jabatan dalam tim:</li>
                                    <ul>
                                        <li>Project Manager</li>
                                        <li>Programmer</li>
                                        <li>Designer</li>
                                        <li>Content Creator</li>
                                    </ul>
                                </ul>
                                <p>Setelah mengisi semua kolom, klik <strong>Daftar</strong> untuk menyelesaikan proses registrasi.</p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
