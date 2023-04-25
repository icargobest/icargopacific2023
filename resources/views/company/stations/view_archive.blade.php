<title>Stations Archived</title>

@extends('layouts.app')
@include('partials.navigationCompany')

<main class="container py-5" style="margin-top:-49px !important">
    <div class="main-wrapper border border-2" style=" max-width: 100%;">
            <div class="employee-header-container">
                <h3 class="">Station Archived</h3>
            </div>
        <div class="addemployee" style="height:75.6px;" >
            <a href="{{route('stations.view')}}">
                <button type="button" class="btn btn-primary m-button1" style="height:32.8px">
                    Back
                </button>
            </a>
        </div>

        <section class="search-filter-container">

            <div class="top-container1" style="max-width: 800px;">
                <h5 class="fw-normal mb-2 d-inline">SEARCH:</h5>
                <div class="input-group rounded">
                    <input type="search" class="form-control rounded" placeholder="Search Employee" aria-label="Search" aria-describedby="search-addon" />
                    <span class="input-group-text border-0" id="search-addon">
                    <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>

            <div class="top-container2">
                <h5 class="fw-normal mb-2 d-inline"> FILTERS:</h5>
                <div class="dropdown-container">

                    <select class="form-select bold-hover border-black capitalized b-shadow s-margin modified-select" aria-label="Default select example" style="width:150px;">
                        <option value="1" hidden>Title</option>
                        <option value="1">Head Developer</option>
                        <option value="2">Head Designer</option>
                        <option value="3">CEO</option>
                    </select>

                    <select class="form-select bold-hover border-black capitalized b-shadow s-margin modified-select" aria-label="Default select example" style="width:150px;">
                        <option value="1" hidden>Status</option>
                        <option value="1">Active</option>
                        <option value="2">Pending</option>
                        <option value="3">Archived</option>
                    </select>

                    <select class="form-select bold-hover border-black capitalized b-shadow s-margin modified-select" aria-label="Default select example" style="width:150px;">
                        <option value="1" hidden>Position</option>
                        <option value="1">Head Developer</option>
                        <option value="2">Head Designer</option>
                        <option value="3">CEO</option>
                    </select>
                </div>
            </div>

        </section>

        <div class="mt-2">
            @include('flash-message')
        </div>

        <div class="table-container">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col"style="text-align:center;">#</th>
                    <th scope="col"style="text-align:center;">Station Number</th>
                    <th scope="col"style="text-align:center;">Station Name</th>
                    <th scope="col"style="text-align:center;">Address</th>
                    <th scope="col"style="text-align:center;">Contact No.</th>
                    <th scope="col"style="text-align:center;">Email</th>
                    <th scope="col"style="text-align:center; width:350px;">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($stations as $station)
                        @if ($station->archived == 1)
                            <tr>
                                <td>{{$station->id}}</td>
                                <td>{{$station->station_number}}</td>
                                <td>{{$station->station_name}}</td>
                                <td>{{$station->station_address}}</td>
                                <td>{{$station->station_contact_no}}</td>
                                <td>{{$station->station_email}}</td>
                                <td class="td-buttons d-flex justify-content-center" style="overflow:auto;">
                                    @include('company/stations.view')
                                    @include('company/stations.edit')
                                    @include('company/stations.archive')                                
                                </td>
                            </tr>
                        @endif
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>  
</main>

@include('partials.footer')	
