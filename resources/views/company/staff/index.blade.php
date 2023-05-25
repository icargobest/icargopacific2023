<title>Company | Staff</title>
@include('partials.header')
@extends('layouts.app') 
@include('partials.navigationCompany',['staff' =>"nav-selected"])

<style>
    svg {
        width: 1.5rem;
        height: 1.5rem;
    }
</style>
<main class="container py-5" style="margin-top: -49px !important">
    <div class="main-wrapper border border-2" style="max-width: 100%">
        <div class="employee-header-container">
            <h3 class="">STAFF LIST</h3>
        </div>

        <div class="addemployee" style="">
            <button
                type="button"
                class="btn btn-primary m-button1"
                style=""
                data-bs-toggle="modal"
                data-bs-target="#addStaffModal"
            >
                Add Staff
            </button>
            <a href="{{route('staff.viewArchive')}}">
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
                id="stafftable"
            >
                <thead>
                    <tr>
                        <th scope="col" >#</th>
                        <th scope="col" >Name</th>
                        <th scope="col" >Email</th>
                        <th scope="col" >
                            Contact No
                        </th>
                        <th
                            scope="col"
                            style="text-align: center !important; width: 300px"
                        >
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($staff as $staff) @if ($staff->archived == 0)
                    <tr>
                        <td>{{$staff->id}}</td>
                        <td class="capitalized">{{$staff->user->name}}</td>
                        <td>{{$staff->user->email}}</td>
                        <td>{{$staff->contact_no}}</td>
                        <td
                            class="td-buttons d-flex justify-content-center"
                            style="overflow: auto"
                        >
                            @include('company.staff.show')
                            @include('company.staff.edit')
                            @include('company.staff.archive')
                            @if($staff->user->status == 1)
                            <a
                                href="{{ route('staff.status.update', ['user_id' => $staff->user->id, 'status_code' => 0]) }}"
                                class="btn btn-danger btn-sm"
                                style="
                                    width: 80px !important;
                                    height: 29.75px !important;
                                "
                            >
                                Lock
                            </a>
                            @else
                            <a
                                href="{{ route('staff.status.update', ['user_id' => $staff->user->id, 'status_code' => 1]) }}"
                                class="btn btn-success btn-sm"
                                style="
                                    width: 80px !important;
                                    height: 29.75px !important;
                                "
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
    let stafftable = new DataTable("#stafftable");
</script>

@include('company.staff.create') @include('partials.footer')
