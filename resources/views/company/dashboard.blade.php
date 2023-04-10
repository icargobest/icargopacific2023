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
                        <a class="nav-link @if(isset($dashboard)){{$dashboard}}@endif" href="/dashboard">Dashboard</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="/drivers">Driver List</a>
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