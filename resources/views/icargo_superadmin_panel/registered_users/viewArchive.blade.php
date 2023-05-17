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
                <h3 class="">Registered Users archived</h3>
            </div>
        <div class="addemployee" style="height:75.6px;" >
            <a href="{{ route ('registered_users.view')}}">
                <button type="button" class="btn btn-primary m-button1" style="height:32.8px">
                    Back
                </button>
            </a>
        </div>

        <section class="search-filter-container">

            <div class="top-container1" style="max-width: 800px;">
                <h5 class="fw-normal mb-2 d-inline">SEARCH:</h5>
                <div class="input-group rounded">
                    <input type="search" class="form-control rounded" placeholder="Search Company" aria-label="Search" aria-describedby="search-addon" />
                    <span class="input-group-text border-0" id="search-addon">
                    <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>

        </section>

        <div class="mt-2">
            @include('flash-message')
        </div>

        <div class="table-container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" >ID</th>
                        <th scope="col" >Name</th>
                        <th scope="col" >Email</th>
                        <th scope="col" >Type</th>
                        <th scope="col" >Company ID</th>
                        <th scope="col" style="text-align:center !important; width:300px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $company)
                    <tr>
                        <td>{{ $company->user->id }}</td>
                        <td class="capitalized">{{ $company->user->name }}</td>
                        <td>{{ $company->user->email }}</td>
                        <td>{{ $company->user->type }}</td>
                        <td>{{ $company->id }}</td>
                        <td
                            class="td-buttons d-flex justify-content-center"
                            style="overflow: auto"
                        >
                            @if ($company->user->type == "company")
                                @include('icargo_superadmin_panel.registered_users.show.company')
                                @include('icargo_superadmin_panel.registered_users.restore.company')
                            @endif
                        </td>
                    </tr>
                    @endforeach 
                    
                    @foreach ($dispatchers as $dispatcher)
                    <tr>
                        <td>{{ $dispatcher->user->id }}</td>
                        <td class="capitalized">
                            {{ $dispatcher->user->name }}
                        </td>
                        <td>{{ $dispatcher->user->email }}</td>
                        <td>{{ $dispatcher->user->type }}</td>
                        <td>{{ $dispatcher->company_id }}</td>
                        <td
                            class="td-buttons d-flex justify-content-center"
                            style="overflow: auto"
                        >
                            @if ($dispatcher->user->type == "dispatcher")
                                @include('icargo_superadmin_panel.registered_users.show.dispatcher')
                                @include('icargo_superadmin_panel.registered_users.restore.dispatcher')
                            @endif 
                        </td>
                    </tr>
                    @endforeach 
                    
                    @foreach ($drivers as $driver)
                    <tr>
                        <td>{{ $driver->user->id }}</td>
                        <td class="capitalized">{{ $driver->user->name }}</td>
                        <td>{{ $driver->user->email }}</td>
                        <td>{{ $driver->user->type }}</td>
                        <td>{{ $driver->company_id }}</td>
                        <td
                            class="td-buttons d-flex justify-content-center"
                            style="overflow: auto"
                        >
                            @if ($driver->user->type == "driver")
                                @include('icargo_superadmin_panel.registered_users.show.driver')
                                @include('icargo_superadmin_panel.registered_users.restore.driver')
                            @endif 
                        </td>
                    </tr>

                    @endforeach 
                    
                    @foreach ($staffs as $staff)
                    <tr>
                        <td>{{ $staff->user->id }}</td>
                        <td class="capitalized">{{ $staff->user->name }}</td>
                        <td>{{ $staff->user->email }}</td>
                        <td>{{ $staff->user->type }}</td>
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

                    @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->user->id }}</td>
                        <td class="capitalized">{{ $customer->user->name }}</td>
                        <td>{{ $customer->user->email }}</td>
                        <td>{{ $customer->user->type }}</td>
                        <td> </td>
                        <td
                            class="td-buttons d-flex justify-content-center"
                            style="overflow: auto"
                        >
                            @if ($customer->user->type == "user")
                                @include('icargo_superadmin_panel.registered_users.show.customer')
                                @include('icargo_superadmin_panel.registered_users.restore.customer')
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>  
</main>

@include('partials.footer')	