@extends('layouts.app')

@section('content')
<br><br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Subscribe to the 30-day free trial') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('subscribe') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name on Card') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}" class="form-control" />
                        <input type="hidden" name="email" value="{{Auth::user()->email}}" class="form-control" />
                        <div class="form-group row">
                            <label for="card_number" class="col-md-4 col-form-label text-md-right">{{ __('Card Number') }}</label>

                            <div class="col-md-6">
                                <input id="card_number" type="text" class="form-control @error('card_number') is-invalid @enderror" name="card_number" required>

                                @error('card_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="expiry_month" class="col-md-4 col-form-label text-md-right">{{ __('Expiry Month') }}</label>

                            <div class="col-md-6">
                                <input id="expiry_month" type="text" class="form-control @error('expiry_month') is-invalid @enderror" name="expiry_month" required>
                                @error('expiry_month')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                     </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="expiry_year" class="col-md-4 col-form-label text-md-right">{{ __('Expiry Year') }}</label>

                        <div class="col-md-6">
                            <input id="expiry_year" type="text" class="form-control @error('expiry_year') is-invalid @enderror" name="expiry_year" required>

                            @error('expiry_year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cvc" class="col-md-4 col-form-label text-md-right">{{ __('CVC') }}</label>

                        <div class="col-md-6">
                            <input id="cvc" type="text" class="form-control @error('cvc') is-invalid @enderror" name="cvc" required>

                            @error('cvc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Subscribe') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
