<title>SuperAdmin | Registered Archived</title>
@include('partials.header')
@extends('layouts.app')
@include('partials.navigationSuperAdmin', ['register' =>"nav-selected"])

<style>
    svg{
        width:  1.5rem;
        height: 1.5rem;
    }
</style>
<main class="container py-5" style="margin-top:-49px !important">
    <div class="main-wrapper border border-2" style=" max-width: 100%;">
            <div class="employee-header-container">
                <h3 class="">Dispatchers archived</h3>
            </div>
        <div class="addemployee" style="height:75.6px;" >
            <a href="{{ route ('registered_dispatchers.index')}}">
                <button type="button" class="btn btn-primary m-button1" style="height:32.8px">
                    Back
                </button>
            </a>
        </div>

        <div class="mt-2">
            @include('flash-message')
        </div>

        <div class="table-container">
            <table
                class="table table-striped table-borderless hover"
                id="registeredDispatchersSuperAdmin"
            >
                <thead>
                    <tr>
                        <th scope="col" style="text-align: center">Dispatcher ID</th>
                        <th scope="col" style="text-align: center">Name</th>
                        <th scope="col" style="text-align: center">Email</th>
                        <th scope="col" style="text-align: center">
                            Contact No
                        </th>
                        <th scope="col" style="text-align: center">Company</th>
                        <th
                            scope="col"
                            style="text-align: center !important; width: 250px"
                        >
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dispatchers as $dispatcher)
                    <tr>
                        <td>{{ $dispatcher->id}}</td>
                        <td class="capitalized">
                            <img src="@if ($dispatcher->image != null) {{ asset('storage/images/dispatcher/'.$dispatcher->user_id.'/'.$dispatcher->image) }} @else /img/default_dp.png @endif" style="width: 30px" alt="profile image">
                            {{ $dispatcher->user->name }}
                        </td>
                        <td>{{ $dispatcher->user->email }}</td>
                        <td>{{ $dispatcher->contact_no}}</td>
                        <td>
                            @if ($dispatcher->company &&
                            $dispatcher->company->user) {{
                            $dispatcher->company->user->name }} @endif
                        </td>
                        <td
                            class="td-buttons d-flex justify-content-center"
                            style="overflow: auto"
                        >
                            @include('icargo_superadmin_panel.dispatcher.show')
                            @include('icargo_superadmin_panel.dispatcher.restore')
                        </td>
                    </tr>
                    @endforeach
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
        let table = new DataTable("#registeredDispatchersSuperAdmin");
    });
</script>

@include('partials.footer')	