<title>SuperAdmin | Dashboard</title>

@include('partials.header')
@extends('layouts.app')
@include('partials.navigationSuperAdmin', ['dashboard' =>"nav-selected"])


@section('content')
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">SuperAdmin Dashboard</a>
  </nav>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Monthly Income</div>
            <div class="card-body">
                <div id="monthly_chart_div"></div>
            </div>
        </div>
    </div>
  
@endsection
