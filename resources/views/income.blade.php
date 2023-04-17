@extends('layouts.chart')

@section('title', 'Monthly Income')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Admin Dashboard</div>
            <div class="card-body">
                <div id="chart_div"></div>
                <div>Total Yearly Income: {{ $total }}</div>
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
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
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

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

        chart.draw(data, options);
    }
</script>
@endsection
