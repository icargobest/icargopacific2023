@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                      <a class="nav-link" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link @if(isset($dashboard)){{$dashboard}}@endif" href="/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link @if(isset($waybill)){{$waybill}}@endif" href="/waybill">Waybill</a>
                    </li>
                    @if(session('status') == 2)
                      <li class="nav-item">
                        <a class="nav-link @if(isset($freight)){{$freight}}@endif" href="/freight">Freight</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link @if(isset($employee)){{$employee}}@endif" href="/employees">Employee</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link @if(isset($driver)){{$driver}}@endif" href="/driver">Driver</a>
                      </li>
                    @endif
              </ul></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are login as user role.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
