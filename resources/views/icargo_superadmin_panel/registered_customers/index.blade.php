<title>iCargo | Customers</title>

@extends('layouts.app') @include('partials.navigationSuperAdmin')

<main class="container py-5" style="margin-top: -49px !important">
    <div class="main-wrapper border border-2" style="max-width: 100%">
        <div class="employee-header-container">
            <h3 class="">Customers</h3>
        </div>

        <div class="addemployee" style="">
            @include('icargo_superadmin_panel.registered_customers.create')
        </div>

        <a href="{{ route('registered_customers.viewArchive') }}">
            <button
                type="button"
                class="btn btn-success btn-sm m-button2"
                style="height: 32.8px"
            >
                Archived
            </button>
        </a>

        <div class="mt-2">@include('flash-message')</div>

        <div class="table-container">
            <table class="table table-striped table-borderless hover" id="registeredCustomers">
                <thead>
                    <tr>
                        <th scope="col" style="text-align: center">Customer ID</th>
                        <th scope="col" style="text-align: center">Name</th>
                        <th scope="col" style="text-align: center">Email</th>
                        <th scope="col" style="text-align: center">
                            Contact No
                        </th>
                        <th
                            scope="col"
                            style="text-align: center; width: 300px"
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
                            @include('icargo_superadmin_panel.registered_customers.edit')
                            @include('icargo_superadmin_panel.registered_customers.archive')
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
    let tableCustomers = new DataTable('#registeredCustomers');
</script>

@include('partials.footer')
