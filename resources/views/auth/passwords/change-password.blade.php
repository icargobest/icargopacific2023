@extends('layouts.app')

@section('content')
<div class="vertical-center">
    <div class="container center p-5">
        <div class="row justify-content-center">
            <div class="col-md-6 border shadow login-container p-5" style="">

                    <div class="login-header">{{ __('Change Password') }}</div>

                    <form action="{{ route('update-password') }}" method="POST">
                        @csrf
                        
                            <div class="mt-2">
                                @include('flash-message')
                            </div>

                            <div class="row mb-4">
                                {{-- <label for="oldPasswordInput" class="form-label">Old Password</label> --}}
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-lock-fill text-secondary"></i>
                                    </span>
                                <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                                    placeholder="Old Password">
                                @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>

                            <div class="row mb-4">
                                {{-- <label for="newPasswordInput" class="form-label">New Password</label> --}}
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-lock-fill text-secondary"></i>
                                    </span>
                                <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                    placeholder="New Password">
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>

                            <div class="row mb-4">
                                {{-- <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label> --}}
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-lock-fill text-secondary"></i>
                                    </span>
                                <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                                    placeholder="Confirm New Password">
                                </div>
                            </div>

                        
                           <div class="row mb-0 mt-5">
                                <div class="col-lg-12">
                                    <button class="mb-1 resetpass-button letter-spacing" style="background-color:#F7CF0F; color: #214D94;">Submit</button>
                                </div>
                           </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection