<title>Company |  Dispatcher Archived</title>
@include('partials.header')
@extends('layouts.app')
@include('partials.navigationCompany')
<style>
    svg{
        width:  1.5rem;
        height: 1.5rem;
    }
</style>
<main class="container py-5" style="margin-top:-49px !important">
    <div class="main-wrapper border border-2" style=" max-width: 100%;">
            <div class="employee-header-container">
                <h3 class="">Drivers Archived</h3>
            </div>
        


        <div class="addemployee" style="height:75.6px;" >
            <a href="{{route('drivers.index')}}">
                <button type="button" class="btn btn-primary m-button1" style="height:32.8px">
                    Back
                </button>
            </a>
        </div>
        <div class="mt-2">
            @include('flash-message')
        </div>

        <div class="table-container">
            <table class="table table-striped table-bordered table-hover table-borderless hover"
            id="companydrivers"
            >
                <thead>
                <tr>
                    <th scope="col" style="text-align:center;">#</th>
                    <th scope="col" style="text-align:center;">Driver Name</th>
                    <th scope="col" style="text-align:center;">Vehicle Type</th>
                    <th scope="col" style="text-align:center;">Plate No.</th>
                    <th scope="col" style="text-align:center; width:200px">Action</th>
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
                                <td class="td-buttons d-flex justify-content-center"style="overflow:auto">@include('company/drivers.show')@include('company/drivers.restore')</td>
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

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script type="text/javascript">
    let companydrivers = new DataTable("#companydrivers");
</script>

@include('partials.footer')	
