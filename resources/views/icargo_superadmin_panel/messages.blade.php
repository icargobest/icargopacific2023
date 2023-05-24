<title>SuperAdmin | Show Query</title>
@include('partials.header')
@extends('layouts.app')
@include('partials.navigationSuperAdmin', ['queries' =>"nav-selected"])

{{-- <main class="container py-5" style="margin-top: -49px !important">
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
</main> --}}

<div class="container p-5" style="background-color: #f8fafc">

    <div class="container queryContainer p-0" style="background-color: #fff">
        <header class="d-flex align-items-center justify-content-between px-3 mb-5">
            <span>Query #{{$cust_queries->id}}</span> 
            <a href="/customer-queries"><button class="btn btn-danger">Back</button></a>
        </header>

        <div class="row gap-2 px-3">
            <h6>From: <span class="fw-bold" style="color: #F9CD1A">{{$cust_queries->name}}</span></h6>
            <h6>Email Address: <span class="fw-bold" style="color: #F9CD1A">{{$cust_queries->email}}</span></h6>
            
            <div class="queriesContent mt-3">
                <h6 class="fw-bold" style="color: #214D94">Message Content</h6>
                <p>{{$cust_queries->cust_query}}</p>
            </div>
        </div>

    </div>

</div>

@include('partials.footer')	

<style>
    .queryContainer header{
        font-size: 16px;
        font-weight: bold;
        letter-spacing: 1px;

        padding-top: 10px;
        padding-bottom: 10px;
        background-color: #214D94;
        color: #fff;
    }
    .queryContainer header a button{
        display: flex;
        align-items: center;
        justify-content: center;

        height: 30px;
        width: 85px;
        font-weight: bold;
        letter-spacing: 0.5px;
    }

    .queriesContent p{
        padding: 20px 35px;
        border: 1px solid rgba(53, 53, 53, 0.687);
        border-radius: 8px;
        min-height: 100px;

        text-align: justify;
        text-indent: 15px;
    }
</style>
