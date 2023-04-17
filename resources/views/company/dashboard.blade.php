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
