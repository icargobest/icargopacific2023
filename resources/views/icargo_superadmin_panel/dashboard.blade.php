<title>Company | Dashboard</title>


@extends('layouts.app')
@include('partials.navigationSuperAdmin')

@section('content')
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">SuperAdmin Dashboard</a>
  </nav>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Monthly Income</div>
            <div class="card-body">
                <div id="monthly_chart_div"></div>
            </div>
        </div>
    </div>
  
    <body>
        <h1>Registered Companies: {{ $count }}</h1>
        <h1>Registered Users: {{ $count1 }}</h1>
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
