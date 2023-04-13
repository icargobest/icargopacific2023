@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
<<<<<<< HEAD
                    <li class="nav-item">
                      <a class="nav-link" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link @if(isset($dashboard)){{$dashboard}}@endif" href="/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link @if(isset($waybill)){{$waybill}}@endif" href="/waybill">Waybill</a>
                    </li>
                      <li class="nav-item">
                        <a class="nav-link @if(isset($freight)){{$freight}}@endif" href="/company/freight">Freight</a>
=======
                        <li class="nav-item">
                        <a class="nav-link" href="/company/dashboard">Home</a>
                        </li>git push origin BRANCH MO
                        <a class="nav-link @if(isset($dashboard)){{$dashboard}}@endif" href="/dashboard">Dashboard</a>
                        </li>
                        <li class="nav-item">
                      <li class="nav-item">
                        <a class="nav-link @if(isset($freight)){{$freight}}@endif" href="/freight">Freight</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link @if(isset($waybill)){{$waybill}}@endif" href="/waybill">Order</a>
>>>>>>> develop
                      </li>
                      <li class="nav-item">
                          <a class="nav-link @if(isset($employee)){{$employee}}@endif" href="/employees">Employee</a>
                      </li>
                      <li class="nav-item">
<<<<<<< HEAD
                        <a class="nav-link @if(isset($driver)){{$driver}}@endif" href="/driver">Driver</a>
                      </li>
              </ul></div>

=======
                          <a class="nav-link @if(isset($employee)){{$employee}}@endif" href="/employees">Dispatcher</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link @if(isset($driver)){{$driver}}@endif" href="/driver">Driver</a>
                      </li>
                        <a class="nav-link" href="/drivers">Driver List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/dispatcher">Dispatcher List</a>
                        </li>
                    </ul>
                </div>
>>>>>>> develop
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in as a company role.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
