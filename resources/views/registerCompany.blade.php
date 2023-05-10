@extends('layouts.app')
@section('content')
<div class="py-4 vertical-center">
<div class="container">
    <div class="row justify-content-center">
    
        <div class="col-md-8 border text-center login-image-container d-none d-lg-block" style="padding:0px;">
            <img class="login-image" src="/img/login_imagev2.jpg" alt="login_image">
        </div>
    
        <div class="col-lg-4 login-container p-5">
                <div class="pb-2 login-header">{{ __('Register as a company') }}</div>
                <div class="pb-3 blue">Create your Account</div>
                
                    <form method="POST" action="{{ route('company_registration.store') }}">
                        @csrf
                        @include('flash-message')
                        <div class="row mb-4">
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
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-lock-fill text-secondary"></i>
                                </span>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Re-Type Password">
                            </div>
                        </div>

                        <hr>
                        {{-- contact number --}}

                         <!-- Contact input -->
                         <div class="row mb-4">
                            <div class="input-group">
                                 <span class="input-group-text">
                                    <i class="bi bi-person-fill text-secondary"></i>
                                </span>
                                <input id="contact" 
                                type="text" 
                                class="form-control @error('contact_no') is-invalid @enderror" name="contact_no" 
                                value="{{ old('contact_no') }}" 
                                autocomplete="contact_no"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '')"
                                minlength="11" 
                                maxlength="11"
                                @required(true)
                                placeholder="Contact No">

                                @error('contact_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        {{-- contact name --}}
                        <div class="row mb-4">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-person-fill text-secondary"></i>
                                </span>
                                <input id="contactnum" type="text" class="form-control @error('contact_name') is-invalid" @enderror" name="contact_name" value="{{ old('contact_name') }}" required autocomplete="contact_name" autofocus placeholder="Contact Name">

                                @error('contact_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- contact address--}}
                        <div class="row mb-4">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-person-fill text-secondary"></i>
                                </span>
                                <input id="contactnum" type="text" class="form-control @error('company_address') is-invalid" @enderror" name="company_address" value="{{ old('company_address') }}" required autocomplete="company_address" autofocus placeholder="Company Address">

                                @error('company_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
                    <a href="{{ route('register') }}">
                        <button type="button" class="register-ascompany-button letter-spacing">
                            {{ __('Register as a user') }}
                        </button>   
                    </a>

                    <div class="text-center mt-3 pt-3">
                        <p>Already have an account?
                            <span> <a href="{{ route('login') }}">Login Here</a> </span>
                        </p>
                    </div>
                
            
        </div>
    </div>
</div>
</div>
@endsection
