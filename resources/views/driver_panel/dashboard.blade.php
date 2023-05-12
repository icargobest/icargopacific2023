<title>Driver | Dashboard</title>
@include('partials.header')
@include('partials.navigationDriver', ['dashboard' =>"nav-selected"])
@extends('layouts.app')
{{-- @extends('layouts.chart') --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/driverdashboard.css') }}">

@section('title', 'Driver Dashboard')
@section('content')


    <div class="mainContainer">
        <div class="DashboardContainer">
            <div class = "dashboardTitle">
                Driver Dashboard  
            </div>

            <div class="shippingStatus">
                <span class = "title">
                    <i class="fa fa-truck"></i>
                    Shipping Status
                </span>
                <div class="cardContainer">

                    <div class="cardAlign">
                        <div style="background-color: #4966AB;" class="cards ">
                            <span class="cardTitle">
                                ACCEPTED
                            </span>
                            <div class="cardIconCount">
                                <span class="d-icon"><i class="fa fa-handshake-o"></i></span>
                                {{ $dashboard->accepted }}
                            </div>
                        </div>
                        <div style="background-color: #284C8E;" class="cardsM">
                            <span class="cardTitle">
                                PICKED UP
                            </span>
                            <div class="cardIconCount">
                                <span class="d-icon"><i class="fa fa-cubes"></i></span>
                                {{ $dashboard->pickedup }}
                            </div>
                        </div>
                        <div style="background-color: #006979;" class="cards">
                            <span class="cardTitle">
                                RECEIVED
                            </span>
                            <div class="cardIconCount">
                                <span class="d-icon"><i class="fa fa-check-square"></i></span>
                                {{ $dashboard->received }}
                            </div>
                        </div>
                    </div>   

                    <div class="cardAlign">
                        <div style="background-color: #2F4858;" class="cards">
                            <span class="cardTitle">
                                DISPATCHED
                            </span>
                            <div class="cardIconCount">
                                <span class="d-icon"><i class="fa fa-truck"></i></span>
                                {{ $dashboard->dispatched }}
                            </div>
                        </div>
                        <div style="background-color: #7089D2;" class="cardsM">
                            <span class="cardTitle">
                                FORWARDED
                            </span>
                            <div class="cardIconCount">
                                <span class="d-icon"><i class="fa fa-cube"></i></span>
                                {{ $dashboard->forwarded }}
                            </div>
                        </div>
                        <div style="background-color: #97AEFA;" class="cards">
                            <span class="cardTitle">
                                DELIVERED
                            </span>
                            <div class="cardIconCount">
                                <span class="d-icon"><i class="fa fa-thumbs-up"></i> </i></span>
                                {{ $dashboard->delivered }}
                            </div>
                        </div>
                    </div>

                    <div class="cardAlign">
                        <div style="background-color: #0083BB;" class="cards">
                            <span class="cardTitle">
                                CONFIRMED
                            </span>
                            <div class="cardIconCount">
                                <span class="d-icon"><i class="fa fa-cart-arrow-down"></i></span>
                                {{ $dashboard->confirmed }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>  
    </div>         
</div>


{{-- <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">Driver Dashboard</a>
  </nav>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Shipping Status</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Accepted</td>
                            <td>{{ $dashboard->accepted }}</td>
                        </tr>
                        <tr>
                            <td>Picked up</td>
                            <td>{{ $dashboard->pickedup }}</td>
                        </tr>
                        <tr>
                            <td>Received</td>
                            <td>{{ $dashboard->received }}</td>
                        </tr>
                        <tr>
                            <td>Dispatched</td>
                            <td>{{ $dashboard->dispatched }}</td>
                        </tr>
                        <tr>
                            <td>Forwarded</td>
                            <td>{{ $dashboard->forwarded }}</td>
                        </tr>
                        <tr>
                            <td>Delivered</td>
                            <td>{{ $dashboard->delivered }}</td>
                        </tr>
                        <tr>
                            <td>Confirmed</td>
                            <td>{{ $dashboard->confirmed }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        @include('flash-message')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     You are login as a driver role.
                </div>
            </div>
        </div>
    </div>
</div> --}}




@endsection
