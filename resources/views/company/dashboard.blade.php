<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

            <link rel="dns-prefetch" href="//fonts.gstatic.com">
            <link href="{{ asset('assets\css\app.css') }}" type="text/css" rel="stylesheet">
            <!--Bootstrap CSS-->
            <link rel="stylesheet" href="/css/bootstrap.css">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

            <!-- Font Awesome -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
            <!-- MDB -->
            <link rel="stylesheet" href="/css/mdb.min.css" />
            <script src="https://kit.fontawesome.com/efac33293c.js" crossorigin="anonymous"></script>
            
            {{-- CSS --}}
            <link rel="stylesheet" href="{{ asset('css/main-header.css') }}">
            <link rel="stylesheet" href="{{ asset('css/employee.css') }}">
            <link rel="stylesheet" href="/css/waybill-list.css" />

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
</head>


@extends('partials.navigationCompany')
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('flash-message')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link" href="/company/dashboard">Home</a>
                        </li>
                        <a class="nav-link @if(isset($dashboard)){{$dashboard}}@endif" href="/dashboard">Dashboard</a>
                        </li>
                        <li class="nav-item">
                      <li class="nav-item">
                        <a class="nav-link @if(isset($freight)){{$freight}}@endif" href="/freight">Freight</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link @if(isset($waybill)){{$waybill}}@endif" href="/waybill">Order</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link @if(isset($employee)){{$employee}}@endif" href="/employees">Staff</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link @if(isset($employee)){{$employee}}@endif" href="/employees">Dispatcher</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link @if(isset($driver)){{$driver}}@endif" href="/driver">Driver</a>
                      </li>
                        <a class="nav-link" href="/company/drivers">Driver List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/company/dispatcher">Dispatcher List</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     You are login as a company role.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

