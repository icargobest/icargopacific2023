<title>Company | Dashboard</title>


@extends('layouts.app')
@include('partials.navigationCompany',['dashboard' => "nav-selected"])

{{-- @extends('layouts.chart') --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/companydashboard.css') }}">

@section('title', 'Monthly Income')
@section('content')

@section('title', 'Monthly Income')

@section('content')
<div class="content-container" style="margin-top: -30px !important;">
    <div class="mainDashboardContainer">
        <span class = "dashboardTitle">
            Company Manager Dashboard  
        </span>
        <div class="shippingStatus">
            <span class = "title">
                <i class="fa fa-truck"></i>
                Shipping Status
            </span>
            <div class="cardContainer">
                <div style="background-color: #4966AB;" class="cards ">
                    <span class="cardTitle">
                        ACCEPTED
                    </span>
                    <div class="cardIconCount">
                        <span class="icon"><i class="fa fa-handshake-o"></i></span>
                        {{ $dashboard->accepted }}
                    </div>
                </div>
                <div style="background-color: #284C8E;" class="cards">
                    <span class="cardTitle">
                        PICKED UP
                    </span>
                    <div class="cardIconCount">
                        <span class="icon"><i class="fa fa-cubes"></i></span>
                        {{ $dashboard->pickedup }}
                    </div>
                </div>
                <div style="background-color: #006979;" class="cards">
                    <span class="cardTitle">
                        RECEIVED
                    </span>
                    <div class="cardIconCount">
                        <span class="icon"><i class="fa fa-check-square"></i></span>
                        {{ $dashboard->received }}
                    </div>
                </div>
                <div style="background-color: #2F4858;" class="cards">
                    <span class="cardTitle">
                        DISPATCHED
                    </span>
                    <div class="cardIconCount">
                        <span class="icon"><i class="fa fa-truck"></i></span>
                        {{ $dashboard->dispatched }}
                    </div>
                </div>
                <div style="background-color: #7089D2;" class="cards">
                    <span class="cardTitle">
                        FORWARDED
                    </span>
                    <div class="cardIconCount">
                        <span class="icon"><i class="fa fa-cube"></i></span>
                        {{ $dashboard->forwarded }}
                    </div>
                </div>
                <div style="background-color: #97AEFA;" class="cards">
                    <span class="cardTitle">
                        DELIVERED
                    </span>
                    <div class="cardIconCount">
                        <span class="icon"><i class="fa fa-thumbs-up"></i> </i></span>
                        {{ $dashboard->delivered }}
                    </div>
                </div>
                <div style="background-color: #0083BB;" class="cards">
                    <span class="cardTitle">
                        CONFIRMED
                    </span>
                    <div class="cardIconCount">
                        <span class="icon"><i class="fa fa-cart-arrow-down"></i></span>
                        {{ $dashboard->confirmed }}
                    </div>
            </div>
        </div>
 
        </div>
        <div class="cots1 .active" style="height:450px; width:100%; padding:0px 10px">
            <div id="carouselExampleIndicators" class="carousel slide" style="text-align:center; font-weight:bolder; font-size:20px;"data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                        <div class="div">
                            <span class="chartTitle">Daily Income</span>
                            <div id="daily_chart_div"></div>
                        </div>

                        <div class="div">
                            <span class="chartTitle">Daily Income</span>
                            <div id="daily_chart_div"></div>
                        </div>
                  </div>



                  
                  <div class="carousel-item ">
                    <span class="chartTitle">Weekly Income</span>
                    <div id="weekly_chart_div"></div>
                  </div>
                  <div class="carousel-item">
                    <span class="chartTitle">Monthly Income</span>
                        <div id="monthly_chart_div"></div>
                  </div>
                  <div class="carousel-item">
                    <span class="chartTitle">Yearly Income</span>
                        <div id="yearly_chart_div"></div>
                  </div>
    
                {{-- </div> --}}
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only" style="color:blue">Next</span>
                </a>
              </div>
              
            </div>
        </div>


</div>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawMonthlyChart);
    function drawMonthlyChart() {
        var data = google.visualization.arrayToDataTable([
            ['Month', 'Income'],
            @foreach ($incomes as $income)
            ['{{ date('M', strtotime($income->date)) }}', {{ $income->amount }}],
            @endforeach
        ]);
        var options = {
            title: 'Monthly Income',
            curveType: 'function',
            legend: { position: 'bottom' }
        };
        var chart = new google.visualization.LineChart(document.getElementById('monthly_chart_div'));
        chart.draw(data, options);
    }
</script>


<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawWeeklyChart);
    
    function drawWeeklyChart() {
        var data = google.visualization.arrayToDataTable([
            ['Week', 'Income'],
            ['Week 1', {{ $week1 }}],
            ['Week 2', {{ $week2 }}],
            ['Week 3', {{ $week3 }}],
            ['Week 4', {{ $week4 }}]
        ]);
    
        var options = {
            title: 'Weekly Income Chart',
            curveType: 'function',
            legend: { position: 'bottom' }
        };
    
        var chart = new google.visualization.LineChart(document.getElementById('weekly_chart_div'));
    
        chart.draw(data, options);
    }
</script>

<<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Year', 'Income'],
            ['2023', {{ $chartData[1][1] }}],
            ['2024', {{ $chartData[2][1] }}],
            ['2025', {{ $chartData[3][1] }}],
            ['2026', {{ $chartData[4][1] }}],
            ['2027', {{ $chartData[5][1] }}],
            ['2028', {{ $chartData[6][1] }}],
            ['2029', {{ $chartData[7][1] }}],
            ['2030', {{ $chartData[8][1] }}]
        ]);
        var options = {
            title: 'Yearly Income',
            curveType: 'function',
            legend: { position: 'bottom' }
        };
        var chart = new google.visualization.LineChart(document.getElementById('yearly_chart_div'));
        chart.draw(data, options);
    }
</script>



<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Day', 'Income'],
            @foreach ($dailyData as $row)
              
                ['{{ date('D', strtotime($row->day)) }}', {{ $row->income }}],
            @endforeach
        ]);
        var options = {
            title: 'Daily Income',
            curveType: 'function',
            legend: { position: 'bottom' }
        };
        var chart = new google.visualization.LineChart(document.getElementById('daily_chart_div'));
        chart.draw(data, options);
    }
</script>




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


@endsection
@include('partials.footer')
