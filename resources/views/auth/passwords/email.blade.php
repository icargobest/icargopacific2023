@extends('layouts.app')
@section('content')
<div class="vertical-center">
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8 border text-center login-image-container d-none d-lg-block" style="padding:0px;">
            <img class="login-image" src="/img/login_imagev2.jpg" alt="login_image">
        </div>

        <div class="col-lg-4 login-container p-5">
            
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

                        <div class="row mb-0 justify-content-center">
                            <div class="col-lg-12">
                                <button type="submit" class="mb-1 resetpass-button letter-spacing" style="background-color:#F7CF0F; color: #214D94;">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="text-center" style="margin-top: 300px;">
                        <p>Already have an account?
                            <span> 
                                <a href="{{ route('login') }}">Login Here</a> 
                            </span>
                        </p>
                    </div>
                    <div class="text-center mt-1">
                        <small class="">Don't have an Account? <span class="blue"><a href="/register">Sign up</a></span></small>
                    </div>
            
        </div>
    </div>
</div>
</div>
@endsection
