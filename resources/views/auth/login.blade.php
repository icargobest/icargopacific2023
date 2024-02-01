@extends('layouts.app')
@section('content')
<style>
    svg {
        width: 1.5rem;
        height: 1.5rem;
    }
</style>
<div class="py-4 vertical-center">
    <div class="container">
        <div class="row justify-content-center shadow">
            <div class="col-lg-4 login-container p-5">
                <div class="pb-2 login-header">{{ __('LOGIN') }}</div>
                <div class="pb-3 blue">Sign-in to your Account</div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    @include('flash-message')
                    <div class="row mb-4">
                        {{-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> --}}

                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-envelope-fill text-secondary"></i>
                            </span>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-mail Address">

                            @error('email')
                            <div class="col-12 text-center">
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        {{-- <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> --}}

                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-lock-fill text-secondary"></i>
                            </span>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                            @error('password')
                            <div class="col-12 text-center">
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                <div class="col-12 text-center">
                                    @enderror
                                </div>
                            </div>

                            <div class="">
                                <div class="col-12 ms-2 mb-4">
                                    <div class="form-check" style="padding-left: 0px">
                                        <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-5 pb-5">
                                <div class="row justify-content-center">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mb-2 login-button letter-spacing" style="background-color: #F7CF0F; border:none; color: #214D94; width: 100%; font-weight:500;">
                                            {{ __('LOGIN') }}
                                        </button>
                                    </div>
                                    <div class="col-8 text-center mb-5 pb-5">
                                        @if (Route::has('password.request'))
                                        <a class="btn btn-link " href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                </form>

                <div class="text-center mt-5 pt-5">
                    <small class="">Don't have an Account? <span class="blue"><a href="/register">Sign up</a></span></small>
                </div>
            </div>

            <div class="col-md-8 border text-center login-image-container d-none d-lg-block" style="padding:0px;">
                <img class="login-image" src="/img/login_imagev2.jpg" alt="login_image">
            </div>
        </div>
    </div>
</div>
@endsection