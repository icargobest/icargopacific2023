<title>Driver | Dashboard</title>
@include('partials.header')
@include('partials.navigationDriver', ['dashboard' =>"nav-selected"])
@extends('layouts.app')
{{-- @extends('layouts.chart') --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/companydashboard.css') }}">

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
                    <div class="cardContainer">
                        <div class="cardAlign">
                            <div style="background-color: #4966AB;" class="cards ">
                                <span class="cardTitle">
                                    PROCESSING
                                </span>
                                <div class="cardIconCount">
                                    <span class="d-icon"><i class="fa fa-handshake-o"></i></span>
                                    {{ $counts['Processing'] }}
                                </div>
                            </div>
                            <div style="background-color: #284C8E;" class="cardsM">
                                <span class="cardTitle">
                                    PICKED UP
                                </span>
                                <div class="cardIconCount">
                                    <span class="d-icon"><i class="fa fa-cubes"></i></span>
                                    {{ $counts['PickedUp'] }}
                                </div>
                            </div>
                            <div style="background-color: #006979;" class="cards">
                                <span class="cardTitle">
                                    ASSORT
                                </span>
                                <div class="cardIconCount">
                                    <span class="d-icon"><i class="fa fa-check-square"></i></span>
                                    {{ $counts['Assort'] }}
                                </div>
                            </div>
                        </div>   
    
                        <div class="cardAlign">
                            <div style="background-color: #2F4858;" class="cards">
                                <span class="cardTitle">
                                    TRANSFERRED
                                </span>
                                <div class="cardIconCount">
                                    <span class="d-icon"><i class="fa fa-truck"></i></span>
                                    {{ $counts['Transferred'] }}
                                </div>
                            </div>
                            <div style="background-color: #7089D2;" class="cardsM">
                                <span class="cardTitle">
                                    ARRIVED
                                </span>
                                <div class="cardIconCount">
                                    <span class="d-icon"><i class="fa fa-cube"></i></span>
                                    {{ $counts['Arrived']  }}
                                </div>
                            </div>
                            <div style="background-color: #97AEFA;" class="cards">
                                <span class="cardTitle">
                                    DISPATCHED
                                </span>
                                <div class="cardIconCount">
                                    <span class="d-icon"><i class="fa fa-thumbs-up"></i> </i></span>
                                    {{ $counts['Dispatched']  }}
                                </div>
                            </div>
                        </div>
    
                        <div class="cardAlign">
                            <div style="background-color: #0083BB;" class="cards">
                                <span class="cardTitle">
                                    DELIVERED
                                </span>
                                <div class="cardIconCount">
                                    <span class="d-icon"><i class="fa fa-cart-arrow-down"></i></span>
                                    {{ $counts['Delivered']  }}
                                </div>
                            </div>
                            <div style="background-color: #ffffff;" class="cardsM">
                                <span class="cardTitle">
                                    empty card
                                </span>
                                <div class="cardIconCount">
                                    <span class="d-icon"><i class="fa fa-cart-arrow-down"></i></span>
                                    empty
                                </div>
                            </div>
                            <div style="background-color: #ffffff;" class="cards">
                                <span class="cardTitle">
                                    empty card
                                </span>
                                <div class="cardIconCount">
                                    <span class="d-icon"><i class="fa fa-cart-arrow-down"></i></span>
                                    empty
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
                            <td>Processing</td>
                            <td>{{ $counts['Processing'] }}</td>
                        </tr>
                        <tr>
                            <td>Picked Up</td>
                            <td>{{ $counts['PickedUp']}}</td>
                        </tr>
                        <tr>
                            <td>Assort</td>
                            <td>{{ $counts['Assort'] }}</td>
                        </tr>
                        <tr>
                            <td>Transferred</td>
                            <td>{{ $counts['Transferred'] }}</td>
                        </tr>
                        <tr>
                            <td>Arrived</td>
                            <td>{{ $counts['Arrived'] }}</td>
                        </tr>
                        <tr>
                            <td>Dispatched</td>
                            <td>{{ $counts['Dispatched'] }}</td>
                        </tr>
                        <tr>
                            <td>Delivered</td>
                            <td>{{ $counts['Delivered'] }}</td>
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
