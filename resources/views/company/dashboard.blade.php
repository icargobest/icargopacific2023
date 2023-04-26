@extends('layouts.chart')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@section('title', 'Monthly Income')

@section('content')
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">Company Manager Dashboard</a>
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
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Weekly Income</div>
            <div class="card-body">
                <div id="weekly_chart_div"></div>
                
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Yearly Income</div>
            <div class="card-body">
                <div id="yearly_chart_div"></div>
                
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Daily Income</div>
            <div class="card-body">
                <div id="daily_chart_div"></div>
                
            </div>
        </div>
    </div>
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




@endsection
