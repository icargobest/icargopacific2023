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
                          
                            <div style="background-color: #284C8E;" class="cards">
                                <span class="cardTitle">
                                    PICKED UP
                                </span>
                                <div class="cardIconCount">
                                    <span class="d-icon"><i class="fa fa-cubes"></i></span>
                                    {{ $counts['PickedUp'] }}
                                </div>
                            </div>
                            <div style="background-color: #0083BB;" class="cardsM">
                                <span class="cardTitle">
                                    DELIVERED
                                </span>
                                <div class="cardIconCount">
                                    <span class="d-icon"><i class="fa fa-cart-arrow-down"></i></span>
                                    {{ $counts['Delivered']  }}
                                </div>
                            </div>
                         
                        </div>   
                    </div>

  
        </div>  
    </div>         
</div>


@endsection
