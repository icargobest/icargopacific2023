<title>SuperAdmin | Show Query</title>
@include('partials.header')
@extends('layouts.app')
@include('partials.navigationSuperAdmin', ['queries' =>"nav-selected"])

  <main class="container py-5" style="margin-top: -49px !important">
  <div class="main-wrapper border border-2" style="max-width: 100%">
      <div class="employee-header-container">
          <h3 class="">Show Message #{{$cust_queries->id}}</h3>
      </div>

      
      <div class="table-container">
      <a href="/customer-queries"><button class="btn btn-danger">Back</button></a>
          <table class="table table-striped table-borderless hover">
            @section('content')
            <br>
            <label for="name">From: <strong>{{$cust_queries->name}}</strong></label><br>
            <label for="email">Email Address: <strong>{{$cust_queries->email}}</strong></label><br>
            <label for="message"><strong>Message Content:</strong></label>
            <textarea readonly id="message" name="query_content" rows="10" cols="125">
                {{$cust_queries->cust_query}}
            </textarea>

            @endsection
      </div>
</div>
</main>

@include('partials.footer')	


