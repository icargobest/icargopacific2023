<title>Company | Stations Archived</title>
@include('partials.header')
@extends('layouts.app')
@include('partials.navigationCompany',['station' =>"nav-selected"])
<style>
    svg {
        width: 1.5rem;
        height: 1.5rem;
    }
</style>
<main class="container py-5" style="margin-top: -49px !important">
    <div class="main-wrapper border border-2" style="max-width: 100%">
        <div class="employee-header-container">
            <h3 class="">Station Archived</h3>
        </div>
        <div class="addemployee" style="height: 75.6px">
            <a href="{{route('stations.view')}}">
                <button
                    type="button"
                    class="btn btn-primary m-button1"
                    style="height: 32.8px"
                >
                    Back
                </button>
            </a>
        </div>

        <div class="mt-2">@include('flash-message')</div>

        <div class="table-container">
            <table class="table table-striped table-borderless hover"
                    id="stationsTableCompany">
                <thead>
                    <tr>
                        <th scope="col" style="text-align: center">#</th>
                        <th scope="col" style="text-align: center">
                            Station Number
                        </th>
                        <th scope="col" style="text-align: center">
                            Station Name
                        </th>
                        <th scope="col" style="text-align: center">Address</th>
                        <th scope="col" style="text-align: center">
                            Contact No.
                        </th>
                        <th scope="col" style="text-align: center">Email</th>
                        <th
                            scope="col"
                            style="text-align: center; width: 350px"
                        >
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stations as $station) 
                    @if ($station->archived ==1)
                    <tr>
                        <td>{{$station->id}}</td>
                        <td>{{$station->station_number}}</td>
                        <td>{{$station->station_name}}</td>
                        <td>{{$station->station_address}}</td>
                        <td>{{$station->station_contact_no}}</td>
                        <td>{{$station->station_email}}</td>
                        <td
                            class="td-buttons d-flex justify-content-center"
                            style="overflow: auto"
                        >
                            @include('company/stations.show')
                            @include('company/stations.restore')
                        </td>
                    </tr>
                    @endif @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        let stationsTableCompany = new DataTable("#stationsTableCompany");
    });
</script>

@include('partials.footer')