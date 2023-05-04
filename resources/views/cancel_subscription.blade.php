@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cancel Subscription') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('cancel-subscription') }}">
                        @csrf

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <p>Are you sure you want to cancel your subscription?</p>
                                <button type="submit" class="btn btn-danger">
                                    {{ __('Yes, cancel my subscription') }}
                                </button>
                                <a href="{{ route('home') }}" class="btn btn-secondary">
                                    {{ __('No, go back') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection