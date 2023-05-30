<title>SuperAdmin | Staff</title>
@include('partials.header') @extends('layouts.app')
@include('partials.navigationSuperAdmin', ['staff' =>"nav-selected"])

<main class="container py-5" style="margin-top: -49px !important">
    <div class="main-wrapper border border-2" style="max-width: 100%">
        <div class="employee-header-container">
            <h3 class="">Registered Staff</h3>
        </div>

        <div class="addemployee">
            <a href="{{ route('viewArchive.staff') }}">
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
                class="table table-striped table-borderless hover"
                id="registeredStaffSuperadmin"
            >
                <thead>
                    <tr>
                        <th scope="col" style="text-align: center">Staff ID</th>
                        <th scope="col" style="text-align: center !Important">Icon</th>
                        <th scope="col" style="text-align: center">Name</th>
                        <th scope="col" style="text-align: center">Email</th>
                        <th scope="col" style="text-align: center">
                            Contact No
                        </th>
                        <th scope="col" style="text-align: center">Company</th>
                        <th
                            scope="col"
                            style="text-align: center !important; width: 300px"
                        >
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($staffs as $staff)
                    <tr>
                        <td>{{ $staff->id }}</td>
                        <td><img
                            src="@if ($staff->photo != null) {{ asset('storage/' . $staff->photo) }} @else /img/default_dp.png @endif"
                            alt="Profile Image"
                            style="width: 30px"
                        /></td>
                        <td class="capitalized">
                            {{ $staff->user->name }}
                        </td>
                        <td>{{ $staff->user->email }}</td>
                        <td>{{ $staff->contact_no }}</td>
                        <td>
                            @if ($staff->company && $staff->company->user) {{
                            $staff->company->user->name }} @endif
                        </td>
                        <td
                            class="td-buttons d-flex justify-content-center"
                            style="overflow: auto"
                        >
                            @if ($staff->user->type == "staff")
                            @include('icargo_superadmin_panel.staff.show')
                            @include('icargo_superadmin_panel.staff.edit')
                            @include('icargo_superadmin_panel.staff.archive')
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
