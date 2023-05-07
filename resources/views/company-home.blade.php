
@php
    use Carbon\Carbon;
@endphp

@if(Auth::user()->subscribed())

       <p> Your subscription is active. You will be charged ${{ number_format(29.99, 2) }} per month after your 30-day free trial ends on {{ Carbon::createFromTimestamp(Auth::user()->subscription->trial_ends_at)->format('F jS, Y') }}.</p>
        <br>
        <a href="{{ route('cancel-subscription') }}" class="btn btn-danger mt-2">Cancel Subscription</a>
   
@else
       <p>You are currently on a 30-day free trial. Your trial ends on :{{ Carbon::createFromTimestamp(Auth::user()->subscription->trial_ends_at)->format('F j, Y, g:i a')}}.</p>

@endif