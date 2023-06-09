<title>Company | Driver</title>
@include('partials.header')
@extends('layouts.app') 
@include('partials.navigationCompany',['drivers' =>
"nav-selected"])
<style>
    svg {
        width: 1.5rem;
        height: 1.5rem;
    }
</style>
<main class="container py-5" style="margin-top: -49px !important">
    <div class="main-wrapper border border-2" style="max-width: 100%">
        <div class="employee-header-container">
            <h3 class="">DRIVERS LIST</h3>
        </div>

        <div class="addemployee" style="">
            <button
                type="button"
                class="btn btn-primary m-button1"
                style=""
                data-bs-toggle="modal"
                data-bs-target="#addDriverModal"
            >
                Add Driver
            </button>
            <a href="{{route('drivers.viewArchive')}}">
                <button
                    type="button"
                    class="btn btn-success btn-sm m-button2"
                    style="height: 32.8px"
                >
                    Archived
                </button>
            </a>
        </div>

        <div class="mt-2">@include('flash-message')</div>

        <div class="table-container">
            <table
            class="table table-striped table-bordered table-hover table-borderless hover"
            id="companydrivers"
            >
                <thead>
                    <tr>
                        <th scope="col" style="text-align: center">#</th>
                        <th 
                        style="max-width:150px !important;text-align: center !important;"
                        scope="col" 
                        >
                        Image
                        </th>
                        <th scope="col" style="text-align: center">
                            Driver Name
                        </th>
                        <th scope="col" style="text-align: center">
                            Vehicle Type
                        </th>
                        <th scope="col" style="text-align: center">
                            Plate Number
                        </th>
                        <th
                            scope="col"
                            style="text-align: center !important; width: 250px"
                        >
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($drivers as $user) @if ($user->archived == 0)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td><img src="@if ($user->image != null) {{ asset('storage/images/driver/'.$user->user_id.'/'.$user->image) }} @else /img/default_dp.png @endif" height="100" width="100" alt="profile image"></td>
                        <td>{{ $user->user->name }}</td>
                        <td>{{ $user->vehicle_type }}</td>
                        <td>{{ $user->plate_no }}</td>
                        <td
                            class="td-buttons d-flex justify-content-center"
                            style="overflow: auto"
                        >
                            @include('company/drivers.show')
                            @include('company/drivers.edit')
                            @include('company/drivers.archive')
                            @if($user->user->status == 1)
                            <a
                                href="{{ route('driver.status.update', ['user_id' => $user->user->id, 'status_code' => 0]) }}"
                                class="btn btn-danger btn-sm"
                                style="width: 80px !important"
                            >
                                Lock
                            </a>
                            @else
                            <a
                                href="{{ route('driver.status.update', ['user_id' => $user->user->id, 'status_code' => 1]) }}"
                                class="btn btn-success btn-sm"
                                style="width: 80px !important"
                            >
                                unlock
                            </a>
                            @endif
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
    let companydrivers = new DataTable("#companydrivers");
</script>

@include('company.drivers.create') @include('partials.footer')
