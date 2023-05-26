<title>SuperAdmin | Companies Archived</title>
@include('partials.header')
@extends('layouts.app')
@include('partials.navigationSuperAdmin', ['companies' =>"nav-selected"])
<style>
    svg{
        width:  1.5rem;
        height: 1.5rem;
    }
</style>
<main class="container py-5" style="margin-top:-49px !important">
    <div class="main-wrapper border border-2" style=" max-width: 100%;">
            <div class="employee-header-container">
                <h3 class="">Companies archived</h3>
            </div>
        <div class="addemployee" style="height:75.6px;" >
            <a href="{{route('registered_companies.index')}}">
                <button type="button" class="btn btn-primary m-button1" style="height:32.8px">
                    Back
                </button>
            </a>
        </div>

        <div class="mt-2">
            @include('flash-message')
        </div>

        <div class="table-container">
            <table class="table table-striped table-borderless hover" id="registeredCompaniesSuperadmin">
                <thead>
                    <tr>
                        <th scope="col" >#</th>
                        <th scope="col" >Company Name</th>
                        <th scope="col" >Email</th>
                        <th scope="col" >Contact No</th>
                        <th scope="col" >Address</th>
                        <th scope="col" style="width:300px; text-align:center !important;">Action</th>
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
                                @include('icargo_superadmin_panel.companies.restore')
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
        let table = new DataTable("#registeredCompaniesSuperadmin");
    });
</script>

@include('partials.footer')	