<title>Company | Dashboard</title>


@extends('layouts.app')
@include('partials.navigationCompany',['dashboard' => "nav-selected"])

{{-- @extends('layouts.chart') --}}
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<link rel="stylesheet" href="{{ asset('css/companydashboard.css') }}">

@section('title', 'Monthly Income')
@section('content')

<div class="content-container" style="margin-top:-14px !important;">
    <div class="mainContainer">
        <div class="DashboardContainer">
            <div class = "dashboardTitle">
                Company Dashboard  
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
            width: 1100,
            height: 500,
            // title: 'Monthly Income',
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
            width: 1100,
            height: 500,
            // title: 'Weekly Income Chart',
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
            width: 1100,
            height: 500,
            // title: 'Yearly Income',
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
            width: 1100,
            height: 500,
            // title: 'Daily Income',
            curveType: 'function',
            legend: { position: 'bottom' }
        };
        var chart = new google.visualization.LineChart(document.getElementById('daily_chart_div'));
        chart.draw(data, options);
    }
</script>

<script>
    let day = document.getElementById("daily");
    let week = document.getElementById("weekly");
    let month = document.getElementById("monthly");
    let year = document.getElementById("yearly");

    let btnd = document.getElementById("btnDaily");
    let btnw = document.getElementById("btnWeekly");
    let btnm = document.getElementById("btnMonthly");
    let btny = document.getElementById("btnYearly");
        
    function opendaily(){
        btnd.classList.add("btn-open");
        day.classList.add("open-daily");
        week.classList.add("close-weekly");
        month.classList.add("close-monthly");
        year.classList.add("close-yearly");

        day.classList.remove("close-daily");
        week.classList.remove("open-weekly");
        month.classList.remove("open-monthly");
        year.classList.remove("open-yearly");

        btnd.classList.add("btn-open");
        btnw.classList.remove("btn-open");
        btnm.classList.remove("btn-open");
        btny.classList.remove("btn-open");
    }
    function openweekly(){
        week.classList.add("open-weekly");
        day.classList.add("close-daily");
        month.classList.add("close-monthly");
        year.classList.add("close-yearly");

        week.classList.remove("close-weekly");
        day.classList.remove("open-daily");
        month.classList.remove("open-monthly");
        year.classList.remove("open-yearly");

        btnd.classList.remove("btn-open");
        btnw.classList.add("btn-open");
        btnm.classList.remove("btn-open");
        btny.classList.remove("btn-open");
    }
    function openmonthly(){
        month.classList.add("open-monthly");
        day.classList.add("close-daily");
        week.classList.add("close-weekly");
        year.classList.add("close-yearly");

        month.classList.remove("close-monthly");
        day.classList.remove("open-daily");
        week.classList.remove("open-weekly");
        year.classList.remove("open-yearly");

        btnd.classList.remove("btn-open");
        btnw.classList.remove("btn-open");
        btnm.classList.add("btn-open");
        btny.classList.remove("btn-open");
    }
    function openyearly(){
        year.classList.add("open-yearly");
        day.classList.add("close-daily");
        week.classList.add("close-weekly");
        month.classList.add("close-monthly");

        year.classList.remove("close-yearly");
        day.classList.remove("open-daily");
        week.classList.remove("open-weekly");
        month.classList.remove("open-monthly");

        btnd.classList.remove("btn-open");
        btnw.classList.remove("btn-open");
        btnm.classList.remove("btn-open");
        btny.classList.add("btn-open");
    }
    
</script>

@endsection
@include('partials.footer')
