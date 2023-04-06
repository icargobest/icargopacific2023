@extends('layouts.app')
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/curr-login.css">
    <link href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&family=Josefin+Sans:wght@600&family=Poppins:wght@200;300;600&display=swap" rel="stylesheet">
</head>
@section('content')
<div class="container">
    <div class="row justify-content-center">


        <div class="col-lg-6 login-container p-5">
            
                <div class="pb-2 login-header">{{ __('Reset Password') }}</div>
                <div class="pb-5 blue">Enter the email assossiated with your account and we'll send an email with instructions to reset your password</div>
                
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-4">
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> --}}

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-envelope-fill text-secondary"></i>
                                </span>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-mail Address">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0 justify-content-center mt-5">
                            <div class="col-lg-12">
                                <button type="submit" class="mb-1 resetpass-button letter-spacing">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                
            
        </div>
    </div>
</div>
@endsection
