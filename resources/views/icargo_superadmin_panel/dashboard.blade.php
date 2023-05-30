<title>SuperAdmin | Dashboard</title>


@extends('layouts.app')
@include('partials.navigationSuperAdmin',['dashboard' => "nav-selected"])

{{-- @extends('layouts.chart') --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/superaddashboard.css') }}">

@section('title', 'Monthly Income')
@section('content')

<div class="" style="margin-top:-14px !important;">
    <div class="mainContainer">
        <div class="DashboardContainer">
            <div class = "dashboardTitle">
                SuperAdmin Dashboard
            </div>
        </div>
    </div>
  
    <body>
        <h2>Registered Companies: {{ $companycount }}</h2>
        <h2>Registered Users: {{ $usercount }}</h2>
        <h2>Registered Drivers: {{ $drivercount }}</h2>
        <h2>Registered Staff: {{ $staffcount }}</h2>
        <h2>Registered Dispatcher: {{ $dispatchercount }}</h2>
        <h2>Registered Customers: {{ $customercount }}</h2>

    </body>
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







@endsection
