@extends('layouts.blankLayout')

@section('title', 'Register Basic - Pages')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}">
@endsection

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">

      <!-- Register Card -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <h2 class="demo menu-text fw-bold ms-2 text-center mb-3" style="color: #696cff ;">Mr. Manage</h2>
          <!-- /Logo -->
          <h4 class="mb-2">Buat manajemen tugasmu jadi mudah dan simpel!</h4>
          <p class="mb-4">Silahkan buat akun anda</p>

          <form class="mb-3" action="{{route('register-auth')}}" method="POST" enctype="multipart/form-data">
            @csrf <!-- Add CSRF token -->
            <div class="mb-3">
              <label for="name" class="form-label">Username</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama anda" autofocus>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
            </div>
            <div class="mb-3 form-password-toggle">
              <label class="form-label" for="password">Password</label>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>

            <button type="submit" class="btn btn-primary d-grid w-100">Register</button> <!-- Add Register button -->
          </form>

          <p class="text-center">
            <span>Sudah punya akun?</span>
            <a href="{{ route('login-view') }}">
              <span>Sign in disini</span>
            </a>
          </p>
        </div>
      </div>
    </div>
    <!-- Register Card -->
  </div>
</div>
@endsection
