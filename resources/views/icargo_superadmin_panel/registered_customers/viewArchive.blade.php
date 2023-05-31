<title>SuperAdmin | Customer Archived</title>
@include('partials.header')
@extends('layouts.app')
@include('partials.navigationSuperAdmin', ['customers' =>"nav-selected"])
<style>
    svg {
        width: 1.5rem;
        height: 1.5rem;
    }
</style>
<main class="container py-5" style="margin-top: -49px !important">
    <div class="main-wrapper border border-2" style="max-width: 100%">
        <div class="employee-header-container">
            <h3 class="">Customer archived</h3>
        </div>
        <div class="addemployee" style="height: 75.6px">
            <a href="{{route('registered_customers.index')}}">
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
            <table class="table table-striped table-borderless hover" id="registeredCustomersSuperadmin">
                <thead>
                    <tr>
                        <th scope="col" style="text-align: center">
                            Customer ID
                        </th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">
                            Contact No
                        </th>
                        <th
                            scope="col"
                            style="text-align: center !important; width: 300px;"
                        >
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td class="capitalized">{{ $customer->user->name }}</td>
                        <td>{{ $customer->user->email }}</td>
                        <td>{{ $customer->contact_no }}</td>
                        <td
                            class="td-buttons d-flex justify-content-center"
                            style="overflow: auto"
                        >
                            @include('icargo_superadmin_panel.registered_customers.show')
                            @include('icargo_superadmin_panel.registered_customers.restore')
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
        let table = new DataTable("#registeredCustomersSuperadmin");
    });
</script>

@include('partials.footer')
