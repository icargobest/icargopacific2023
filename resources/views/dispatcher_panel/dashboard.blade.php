<title>Dispatcher | Dashboard</title>
@include('partials.header')
@extends('layouts.app')
@include('partials.navigationDispatcher', ['dashboard' =>"nav-selected"])

{{-- @extends('layouts.chart') --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/companydashboard.css') }}">
@section('title', 'Dispatcher Dashboard')
@section('content')
<div class="" style="margin-top:-14px !important;">
    <div class="mainContainer">
        <div class="DashboardContainer">
            <div class = "dashboardTitle">
                Dispatcher Dashboard  
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
    <a class="navbar-brand" href="#">Dispatcher Dashboard</a>
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
</div> --}}





@endsection
