<title>Staff | Dispatcher</title>
@extends('layouts.app') @include('partials.navigationStaff',['dispatcher' =>
"nav-selected"])
<style>
    svg {
        width: 1.5rem;
        height: 1.5rem;
    }
    table {
    border-color: transparent !important;
    }
</style>
<main class="container py-5" style="margin-top: -49px !important">
    <div class="main-wrapper border border-2" style="max-width: 100%">
        <div class="employee-header-container">
            <h3 class="">DISPATCHER LIST</h3>
        </div>

        <div class="addemployee" style="">
            <button
                type="button"
                class="btn btn-primary m-button1"
                style=""
                data-bs-toggle="modal"
                data-bs-target="#addDispatchersModal"
            >
                Add Dispatcher
            </button>
            <a href="{{route('dispatchers.viewArchive')}}">
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
                id="staffdispatchertable"
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
                            Dispatcher Name
                        </th>
                        <th scope="col" style="text-align: center">
                            Station No
                        </th>
                        <th scope="col" style="text-align: center">
                            Contact No
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
                    @foreach ($dispatchers as $user) @if ($user->archived == 0)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td><img src="@if ($user->image != null) {{  asset('storage/images/dispatcher/'.$user->user_id.'/'.$user->image) }} @else /img/default_dp.png @endif" height="100" width="100" alt="profile image"></td>
                        <td class="capitalized">{{ $user->user->name }}</td>
                        <td>
                            @foreach( $stations as $station)
                                @if($user->station_id == $station->id)
                                    {{ $station->station_number }}
                                @endif
                            @endforeach

                        </td>
                        <td>{{ $user->contact_no }}</td>
                        <td
                            class="td-buttons d-flex justify-content-center"
                            style="overflow: auto"
                        >
                            @include('staff_panel/dispatcher.show')
                            @include('staff_panel/dispatcher.edit')
                            @include('staff_panel/dispatcher.archive')

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
    let staffdispatchertable = new DataTable("#staffdispatchertable");
</script>

@include('staff_panel/dispatcher.create') @include('partials.footer')
