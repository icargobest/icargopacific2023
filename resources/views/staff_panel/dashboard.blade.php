<title>Staff | Dashboard</title>


@extends('layouts.app')
@include('partials.navigationStaff',['dashboard' => "nav-selected"])

{{-- @extends('layouts.chart') --}}
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<link rel="stylesheet" href="{{ asset('css/companydashboard.css') }}">

@section('title', 'Monthly Income')
@section('content')

<style>
    
</style>
<div class="content-container" style="margin-top: -30px !important;">
    <div class="mainContainer">
        <div class="DashboardContainer">
            <div class = "dashboardTitle">
                Staff Dashboard  
            </div>
            <div class="shippingStatus">
                <span class = "title">
                    <i class="fa fa-truck"></i>
                    Shipping Status
                </span>
 
            <div class="graphContainer">
                <div class="upContainer">
                    <div class="chartTitle" >
                        <i class="fa fa-bar-chart" style="margin-right: 5px;"></i>
                        Income Static
                    </div>
                    <div class="dashButtons">
                        <button class="dashboardBtns" id="btnDaily" onclick="opendaily();">D<span class="dashButtons2">ail</span>y</button>
                        <button class="dashboardBtns" id="btnWeekly" onclick="openweekly();">W<span class="dashButtons2">eekl</span>y</button>
                        <button class="dashboardBtns" id="btnMonthly" onclick="openmonthly();">M<span class="dashButtons2">onth</span>y</button>
                        <button class="dashboardBtns" id="btnYearly" onclick="openyearly();">Y<span class="dashButtons2">earl</span>y</button>
                    </div>
                </div>
                <div class="mainChartDaily" id="daily">
                    <div class="chartType">Daily Income</div>
                    <div class="chart">
                        <div id="daily_chart_div"></div>
                    </div>
                </div>
                <div class="mainChartWeekly" id="weekly">
                    <div class="chartType">Weekly Income</div>
                    <div class="chart">
                    <div id="weekly_chart_div"></div>
                    </div> 
                </div>
                <div class="mainChartMonthly" id="monthly">
                    <div class="chartType">Monthly Income</div>
                    <div class="chart">
                    <div id="monthly_chart_div"></div>
                    </div> 
                </div>
                <div class="mainChartYearly" id="yearly">
                    <div class="chartType">Yearly Income</div>
                    <div class="chart">
                    <div id="yearly_chart_div"></div>
                    </div> 
                </div>
            </div>

        </div>  
    </div>         
</div>



</div>




@endsection
@include('partials.footer')
