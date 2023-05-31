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
                       
                        <div style="background-color: #284C8E;" class="cards">
                            <span class="cardTitle">
                                PICKED UP
                            </span>
                            <div class="cardIconCount">
                                <span class="d-icon"><i class="fa fa-cubes"></i></span>
                                {{ $counts['PickedUp'] }}
                            </div>
                        </div>
                        <div style="background-color: #006979;" class="cardsM">
                            <span class="cardTitle">
                                ASSORT
                            </span>
                            <div class="cardIconCount">
                                <span class="d-icon"><i class="fa fa-check-square"></i></span>
                                {{ $counts['Assort'] }}
                            </div>
                        </div>
                        <div style="background-color: #2F4858;" class="cards">
                            <span class="cardTitle">
                                TRANSFERRED
                            </span>
                            <div class="cardIconCount">
                                <span class="d-icon"><i class="fa fa-truck"></i></span>
                                {{ $counts['Transferred'] }}
                            </div>
                        </div>

                    </div>   

                    <div class="cardAlign">
                        
                        <div style="background-color: #7089D2;" class="cards">
                            <span class="cardTitle">
                                ARRIVED
                            </span>
                            <div class="cardIconCount">
                                <span class="d-icon"><i class="fa fa-cube"></i></span>
                                {{ $counts['Arrived']  }}
                            </div>
                        </div>
                        <div style="background-color: #97AEFA;" class="cardsM">
                            <span class="cardTitle">
                                DISPATCHED
                            </span>
                            <div class="cardIconCount">
                                <span class="d-icon"><i class="fa fa-thumbs-up"></i> </i></span>
                                {{ $counts['Dispatched']  }}
                            </div>
                        </div>
                        <div style="background-color: #0083BB;" class="cards">
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
</div>

