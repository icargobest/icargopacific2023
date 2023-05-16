<title>SuperAdmin | Registered Users</title>
@include('partials.header')
@extends('layouts.app')
@include('partials.navigationSuperAdmin', ['register' =>"nav-selected"])



<main class="container py-5" style="margin-top: -49px !important">
    <div class="main-wrapper border border-2" style="max-width: 100%">
        <div class="employee-header-container">
            <h3 class="">Registered User Accounts</h3>
        </div>

        <div class="addemployee" style="">

            <a href="{{ route('registered_users.viewArchive') }}">
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
            <table class="table table-striped table-borderless hover" id="registeredUsers">
                <thead>
                    <tr>
                        <th scope="col" style="text-align: center">Name</th>
                        <th scope="col" style="text-align: center">Email</th>
                        <th scope="col" style="text-align: center">Contact No</th>
                        <th scope="col" style="text-align: center">Type</th>
                        <th scope="col" style="text-align: center">
                            Company
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
                    @foreach ($companies as $company)
                    <tr>
                        <td class="capitalized">{{ $company->user->name }}</td>
                        <td>{{ $company->user->email }}</td>
                        <td>{{ $company->contact_no}}</td>
                        <td style="text-transform: capitalize">{{ $company->user->type }}</td>
                        <td>{{ $company->user->name }}</td>
                        <td
                            class="td-buttons d-flex justify-content-center"
                            style="overflow: auto"
                        >
                            @if ($company->user->type == "company")
                                @include('icargo_superadmin_panel.registered_users.show.company')
                                @include('icargo_superadmin_panel.registered_users.edit.company')
                                @include('icargo_superadmin_panel.registered_users.archive.company')
                            @endif
                        </td>
                    </tr>
                    @endforeach 
                    
                    @foreach ($dispatchers as $dispatcher)
                    <tr>
                        <td class="capitalized">
                            {{ $dispatcher->user->name }}
                        </td>
                        <td>{{ $dispatcher->user->email }}</td>
                        <td>{{ $dispatcher->contact_no}}</td>
                        <td class="capitalized">{{ $dispatcher->user->type }}</td>
                        <td>
                            @if ($dispatcher->company && $dispatcher->company->user)
                                {{ $dispatcher->company->user->name }}
                            @endif
                        </td>
                        <td
                            class="td-buttons d-flex justify-content-center"
                            style="overflow: auto"
                        >
                            @if ($dispatcher->user->type == "dispatcher")
                                @include('icargo_superadmin_panel.registered_users.show.dispatcher')
                                @include('icargo_superadmin_panel.registered_users.edit.dispatcher')
                                @include('icargo_superadmin_panel.registered_users.archive.dispatcher')
                            @endif
                        </td>
                    </tr>
                    @endforeach 
                    
                    @foreach ($drivers as $driver)
                    <tr>
                        <td class="capitalized">{{ $driver->user->name }}</td>
                        <td>{{ $driver->user->email }}</td>
                        <td>{{ $driver->contact_no }}</td>
                        <td class="capitalized">{{ $driver->user->type }}</td>
                        <td>
                            @if ($driver->company && $driver->company->user)
                                {{ $driver->company->user->name }}
                            @endif
                        </td>
                        <td
                            class="td-buttons d-flex justify-content-center"
                            style="overflow: auto"
                        >
                            @if ($driver->user->type == "driver")
                                @include('icargo_superadmin_panel.registered_users.show.driver')
                                @include('icargo_superadmin_panel.registered_users.edit.driver')
                                @include('icargo_superadmin_panel.registered_users.archive.driver')
                            @endif
                        </td>
                    </tr>

                    @endforeach 

                    @foreach ($staffs as $staff)
                    <tr>
                        <td class="capitalized">{{ $staff->user->name }}</td>
                        <td>{{ $staff->user->email }}</td>
                        <td>{{ $staff->contact_no }}</td>
                        <td class="capitalized">{{ $staff->user->type }}</td>
                        <td>
                            @if ($staff->company && $staff->company->user)
                                {{ $staff->company->user->name }}
                            @endif
                        </td>
                        <td
                            class="td-buttons d-flex justify-content-center"
                            style="overflow: auto"
                        >
                            @if ($staff->user->type == "staff")
                                @include('icargo_superadmin_panel.registered_users.show.staff')
                                @include('icargo_superadmin_panel.registered_users.edit.staff')
                                @include('icargo_superadmin_panel.registered_users.archive.staff')
                            @endif
                        </td>
                    </tr>
                    @endforeach

                    @foreach ($customers as $customer)
                    <tr>
                        <td class="capitalized">{{ $customer->user->name }}</td>
                        <td>{{ $customer->user->email }}</td>
                        <td>{{ $customer->contact_no }}</td>
                        <td>customer</td>
                        <td>{{ $customer->company_id }}</td>
                        <td
                            class="td-buttons d-flex justify-content-center"
                            style="overflow: auto"
                        >
                            @if ($customer->user->type == "user")
                                @include('icargo_superadmin_panel.registered_users.show.customer')
                                @include('icargo_superadmin_panel.registered_users.edit.customer')
                                @include('icargo_superadmin_panel.registered_users.archive.customer')
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
    let table = new DataTable('#registeredUsers');
</script>

@include('partials.footer')
