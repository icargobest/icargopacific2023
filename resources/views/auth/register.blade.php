@extends('layouts.app')
@section('content')
<div class="vertical-center">
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8 border text-center login-image-container d-none d-lg-block" style="padding:0px;">
            <img class="login-image" src="/img/login_imagev2.jpg" alt="login_image">
        </div>

        <div class="col-lg-4 login-container p-5">
            
                <div class="pb-2 login-header">{{ __('Register') }}</div>
                <div class="pb-3 blue">Create your Account</div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        {{-- @include('flash-message') --}}
<<<<<<< Updated upstream
                        <div class="row mb-4">
=======
                        <div class="row mb-3">
>>>>>>> Stashed changes
                            {{-- <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label> --}}

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-person-fill text-secondary"></i>
                                </span>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> --}}

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-envelope-fill text-secondary"></i>
                                </span>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail Address">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

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
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"  placeholder="Re-Type Password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-12">
                                <button type="submit" class="mb-1 register-button letter-spacing">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>   
                    </form>
                    <a href="{{ url('/registerCompany') }}">
                        <button type="button" class="mb-5 register-ascompany-button letter-spacing">
                            {{ __('Register as a company') }}
                        </button>
                    </a>

                    <div class="text-center mt-3 pt-3">
                        <p>Already have an account?
                            <span> 
                                <a href="{{ route('login') }}">Login Here</a> 
                            </span>
                        </p>
                    </div>
                
            
        </div>

        
    </div>
</div>
</div>
@endsection
