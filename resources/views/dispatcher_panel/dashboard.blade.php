@extends('layouts.chart')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@section('title', 'Dispatcher Dashboard')

@section('content')
<nav class="navbar navbar-light bg-light">
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





@endsection
