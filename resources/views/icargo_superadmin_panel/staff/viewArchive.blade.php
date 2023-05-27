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
                <h3 class="">Staff archived</h3>
            </div>
        <div class="addemployee" style="height:75.6px;" >
            <a href="{{ route ('registered_staff.index')}}">
                <button type="button" class="btn btn-primary m-button1" style="height:32.8px">
                    Back
                </button>
            </a>
        </div>

        <div class="mt-2">
            @include('flash-message')
        </div>

        <div class="table-container">
            <table class="table table-striped table-borderless hover" id="registeredStaffSuperadmin">
                <thead>
                    <tr>
                        <th scope="col" >Staff ID</th>
                        <th scope="col" >Name</th>
                        <th scope="col" >Email</th>
                        <th scope="col" >Company ID</th>
                        <th scope="col" style="text-align:center !important; width:300px">Action</th>
                    </tr>
                </thead>
                <tbody>
                   
                    @foreach ($staffs as $staff)
                    <tr>
                        <td>{{ $staff->id }}</td>
                        <td class="capitalized">
                            <img
                                src="@if ($staff->photo != null) {{ asset('storage/' . $staff->photo) }} @else /img/default_dp.png @endif"
                                alt="Profile Image"
                                style="width: 30px"
                            />
                            {{ $staff->user->name }}
                        </td>
                        <td>{{ $staff->user->email }}</td>
                        <td>{{ $staff->company_id }}</td>
                        <td
                            class="td-buttons d-flex justify-content-center"
                            style="overflow: auto"
                        >
                            @if ($staff->user->type == "staff")
                                @include('icargo_superadmin_panel.registered_users.show.staff')
                                @include('icargo_superadmin_panel.registered_users.restore.staff')
                            @endif
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
        let table = new DataTable("#registeredStaffSuperadmin");
    });
</script>

@include('partials.footer')	