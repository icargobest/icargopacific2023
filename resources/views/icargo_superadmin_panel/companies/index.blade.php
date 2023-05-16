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

        <div class="mt-2">
            @include('flash-message')
        </div>

        <div class="table-container">
            <table class="table table-striped table-borderless hover" id="registeredCompanies">
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
                                @if($company->user->status == 1)
                                    <a
                                        href="{{ route('company.status.update', ['user_id' => $company->user->id, 'status_code' => 0]) }}"
                                        class="btn btn-danger btn-sm"
                                        style="width: 80px !important"
                                    >
                                        Lock
                                    </a>
                                    @else
                                    <a
                                        href="{{ route('company.status.update', ['user_id' => $company->user->id, 'status_code' => 1]) }}"
                                        class="btn btn-success btn-sm"
                                        style="width: 80px !important"
                                    >
                                        unlock
                                    </a>
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
    let tableCompanies = new DataTable('#registeredCompanies');
</script>

@include('partials.footer')
