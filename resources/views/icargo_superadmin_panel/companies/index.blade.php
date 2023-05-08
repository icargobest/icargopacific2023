<title>iCargo | Companies</title>

@extends('layouts.app')
@include('partials.navigationSuperAdmin')

<main class="container py-5" style="margin-top:-49px !important">
    <div class="main-wrapper border border-2" style=" max-width: 100%;">
        <div class="employee-header-container">
            <h3 class="">Companies</h3>
        </div>

        <div class="addemployee" style="" >
            @include('icargo_superadmin_panel.companies.create')
        </div>

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
                        <th scope="col" style="text-align:center;">Company Name</th>
                        <th scope="col" style="text-align:center;">Email</th>
                        <th scope="col" style="text-align:center;">Contact No</th>
                        <th scope="col" style="text-align:center;">Address</th>
                        <th scope="col" style="text-align:center; width:300px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $company)
                        <tr>
                            <td>{{ $company->id }}</td>
                            <td class="capitalized">{{ $company->user->name }}</td>
                            <td>{{ $company->user->email }}</td>
                            <td>{{ $company->contact_no }}</td>
                            <td>{{ $company->company_address }}</td>
                            <td class="td-buttons d-flex justify-content-center" style="overflow:auto;">
                                @include('icargo_superadmin_panel.companies.show')
                                @include('icargo_superadmin_panel.companies.edit')
                                @include('icargo_superadmin_panel.companies.archive')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>

@include('partials.footer')
