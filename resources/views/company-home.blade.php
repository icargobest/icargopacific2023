


@if(Auth::user()->subscribed())
    <div class="alert alert-success" role="alert">
        Your subscription is active. You will be charged ${{ number_format(29.99, 2) }} per month after your 30-day free trial ends on {{ Auth::user()->subscription_trials->trial_ends_at->format('F jS, Y') }}.
        <br>
        <a href="{{ route('cancel-subscription') }}" class="btn btn-danger mt-2">Cancel Subscription</a>
    </div>
@else
    <div class="alert alert-info" role="alert">
        You are currently on a 30-day free trial. Your trial ends on {{ Auth::user()->subscription_trials->trial_ends_at->format('F jS, Y')}}.
    </div>
@endif