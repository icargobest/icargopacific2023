<title>iCargo | Registered Users</title>

@extends('layouts.app')
@include('partials.navigationSuperAdmin')

<main class="container py-5" style="margin-top:-49px !important">
    <div class="main-wrapper border border-2" style=" max-width: 100%;">
        <div class="employee-header-container">
            <h3 class="">Registered User Accounts</h3>
        </div>
        <p class="text-muted fw-italic">
            User Type: 0=>User, 1=>Super Admin, 2=>Manager , 3=>Driver, 4=>Dispatcher 5=>Staff 
        </p>

        <a href="{{ route('companies.viewArchive') }}">
            <button type="button" class="btn btn-success btn-sm m-button2" style="height:32.8px">
                Archived
            </button>
        </a>

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
                        <th scope="col" style="text-align:center;">ID</th>
                        <th scope="col" style="text-align:center;">Name</th>
                        <th scope="col" style="text-align:center;">Email</th>
                        <th scope="col" style="text-align:center;">Type</th>
                        <th scope="col" style="text-align:center; width:300px">Action</th>
                    </tr>
                </thead>
                <tbody>
                  
                
                    @foreach ($drivers as $driver)
                        <tr>
                            <td>{{ $driver->user->id }}</td>
                            <td class="capitalized">{{ $driver->user->name }}</td>
                            <td>{{ $driver->user->email }}</td>
                            <td>{{ $driver->user->type }}</td>
                            <td class="td-buttons d-flex justify-content-center" style="overflow:auto;">
                            @if ($driver->user->type == "driver")
                                @include('icargo_superadmin_panel.registered_users.show')
                            @endif
                                {{-- @include('icargo_superadmin_panel.registered_users.edit')
                                @include('icargo_superadmin_panel.registered_users.archive') --}}
                            </td>
                        </tr>
                    @endforeach
                    
                    @foreach ($companies as $company)
                    <tr>
                        <td>{{ $company->user->id }}</td>
                        <td class="capitalized">{{ $company->user->name }}</td>
                        <td>{{ $company->user->email }}</td>
                        <td>{{ $company->user->type }}</td>
                        <td class="td-buttons d-flex justify-content-center" style="overflow:auto;">
                            @if ($company->user->type == "company")
                                @include('icargo_superadmin_panel.companies.show')
                            @endif
                            {{-- @include('icargo_superadmin_panel.companies.edit')
                            @include('icargo_superadmin_panel.companies.archive') --}}
                        </td>
                    </tr>
                    @endforeach

                    @foreach ($dispatchers as $dispatcher)
                        <tr>
                            <td>{{ $dispatcher->user->id }}</td>
                            <td class="capitalized">{{ $dispatcher->user->name }}</td>
                            <td>{{ $dispatcher->user->email }}</td>
                            <td>{{ $dispatcher->user->type }}</td>
                            <td class="td-buttons d-flex justify-content-center" style="overflow:auto;">
                            @if ($dispatcher->user->type == "dispatcher")
                                @include('icargo_superadmin_panel.registered_users.show')
                            @endif
                                {{-- @include('icargo_superadmin_panel.dispatchers.edit')
                                @include('icargo_superadmin_panel.dispatchers.archive') --}}
                            </td>
                        </tr>
                    @endforeach        

                    @foreach ($staffs as $staff)
                        <tr>
                            <td>{{ $staff->user->id }}</td>
                            <td class="capitalized">{{ $staff->user->name }}</td>
                            <td>{{ $staff->user->email }}</td>
                            <td>{{ $staff->user->type }}</td>
                            <td class="td-buttons d-flex justify-content-center" style="overflow:auto;">
                            @if ($staff->user->type == "staff")
                                @include('icargo_superadmin_panel.registered_users.show')
                            @endif
                                {{-- @include('icargo_superadmin_panel.dispatchers.edit')
                                @include('icargo_superadmin_panel.dispatchers.archive') --}}
                            </td>
                        </tr>
                    @endforeach             
                </tbody>
            </table>
            
        </div>
    </div>
</main>

@include('partials.footer')
