<title>Staff | Dashboard</title>
@include('partials.navigationStaff',['dashboard' =>"nav-selected"])
@extends('layouts.app')

@section('content')
<div class="content-container container">
    <div class="row justify-content-center">
        @include('flash-message')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                   
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     You are login as a staff role.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
