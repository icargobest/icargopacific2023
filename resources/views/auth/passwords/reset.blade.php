@extends('layouts.app')
@section('content')
<div class="vertical-center">
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8 border text-center login-image-container d-none d-lg-block" style="padding:0px;">
            <img class="login-image" src="/img/login_imagev2.jpg" alt="login_image">
        </div>

        <div class="col-lg-4 login-container p-5">
        
                <div class="pb-3 login-header">{{ __('Reset Password') }}</div>
                <div class="pb-3 blue">Reset Password</div>
                
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-4">
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> --}}

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-envelope-fill text-secondary"></i>
                                </span>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="E-mail Address">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> --}}

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-lock-fill text-secondary"></i>
                                </span>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="New-Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            {{-- <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label> --}}

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-lock-fill text-secondary"></i>
                                </span>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm New-Password">
                            </div>
                        </div>

                        <div class="row mb-0 mt-5">
                            <div class="col-lg-12">
                                <button type="submit" class="mb-1 resetpass-button letter-spacing" style="background-color:#F7CF0F; color: #214D94; margin-top:175px;">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                
        
        </div>
    </div>
</div>
</div>
@endsection
