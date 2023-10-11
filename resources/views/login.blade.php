@extends('layouts.blankLayout')

@section('title', 'Login Basic - Pages')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}">
@endsection

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <h2 class="demo menu-text fw-bold ms-2 text-center mb-3" style="color: #696cff ;">Mr. Manage</h2>
          <!-- /Logo -->
          <h4 class="mb-2 mt-2">Selamat datang kembali👋</h4>
          <p class="mb-4">Silahkan login ke akun anda</p>

          @if (Session::has('message'))
          <div class="alert alert-success">
            {{ Session::get('message') }}
          </div>
          @endif

          <form id="formAuthentication" class="mb-3" action="{{ route('login-auth')}}" method="POST" enctype="multipart/form-data">
            @csrf <!-- Add CSRF token -->
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan alamat email anda" autofocus>
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Password</label>
                {{-- <a href="{{ url('auth/forgot-password-basic') }}">
                  <small>Forgot Password?</small>
                </a> --}}
              </div>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-me">
                <label class="form-check-label" for="remember-me">
                  Remember Me
                </label>
              </div>
            </div>
            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button> <!-- Add Login button -->
            </div>
          </form>

          <p class="text-center">
            <span>Belum Punya Akun?</span>
            <a href="{{ route('register-view') }}">
              <span>Silahkan buat akun</span>
            </a>
          </p>
        </div>
      </div>
    </div>
    <!-- /Register -->
  </div>
</div>
</div>
@endsection
