<title>Company |  Dispatcher Archived</title>
@extends('layouts.app')
@include('partials.navigationStaff',['drivers' => "nav-selected"])

<main class="container py-5" style="margin-top:-49px !important">
    <div class="main-wrapper border border-2" style=" max-width: 100%;">
            <div class="employee-header-container">
                <h3 class="">Drivers Archived</h3>
            </div>
        


        <div class="addemployee" style="height:75.6px;" >
            <a href="{{route('driver.index')}}">
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
        </section>

        <div class="mt-2">
            @include('flash-message')
        </div>

        <div class="table-container">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col" style="text-align:center;">#</th>
                    <th scope="col" style="text-align:center;">Driver Name</th>
                    <th scope="col" style="text-align:center;">Vehicle Type</th>
                    <th scope="col" style="text-align:center;">Plate No.</th>
                    <th scope="col" style="text-align:center; width:300px">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($drivers as $user)
                        @if ($user->archived == 1)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->user->name }}</td>
                                <td>{{ $user->vehicle_type }}</td>
                                <td>{{ $user->plate_no }}</td>
                                <td class="td-buttons d-flex justify-content-center"style="overflow:auto">@include('staff_panel/drivers.show')@include('staff_panel/drivers.restore')</td>
                            </tr>
                        @endif
                    @endforeach

                </tbody>
            </table>
            <div class="d-flex">
            </div>

        </div>
    </div>  
</main>

@include('partials.footer')	
