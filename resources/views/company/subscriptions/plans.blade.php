@extends('layouts.app')
   
@section('content')

<div class="container">
<section>
  <div class="row">
     
  <header class="text-center mb-5 text-black">
      <div class="container py-5">
        <div class="col-lg-12 mx-auto">
        <a href="/company/dashboard"><- back to dashboard</a>
          <h1>Monthly Subscription</h1>
          <h3>PRICING</h3>
        </div>
      </div>
    </header>
        @foreach($plans as $plan)
        <div class="col-4">
            <div class="bg-white p-5 rounded-lg shadow">
            <h1 class="h6 text-uppercase font-weight-bold mb-4">{{ $plan->name }}</h1>
            <h2 class="h1 font-weight-bold">${{ $plan->price }}<span class="text-small font-weight-normal ml-2">/ month</span></h2>
 
            <div class="custom-separator my-4 mx-auto bg-primary"></div>
  
              <ul class="list-unstyled my-5 text-small text-left font-weight-normal">
                  <li class="mb-3">
                  <i class="fa fa-check mr-2 text-primary"></i> Cloud Tracking and Monitoring</li>
                  <li class="mb-3">
                  <i class="fa fa-check mr-2 text-primary"></i> pcs of printing of waybill a month</li>
                  <li class="mb-3">
                  <i class="fa fa-check mr-2 text-primary"></i> Advanced freight forwarding</li>
                  <li class="mb-3">
                  <i class="fa fa-check mr-2 text-primary"></i> Logistic Software Management</li>
                  <li class="mb-3">
                  <i class="fa fa-check mr-2 text-primary"></i> iCargo and Customer</li>
                  <li class="mb-2 text-muted">
                  <i class="fa fa-times mr-1"></i>
                  <del>Sed ut perspiciatis</del><br><br>
                  <i class="fa fa-times mr-2"></i>
                  <del>Sed ut perspiciatis</del>
                  </li>
              </ul>
              <a href="{{ route('plans.show', $plan->slug) }}" class="btn btn-primary btn-block shadow rounded-pill">Buy Now</a>
            </div>
        </div>
        @endforeach

        <center><a href="/subscribe">Click here for a 30-day free trial of our Standard Subscription</a></center>
    </div>
  </div>
</section>  
 
</div>
@endsection