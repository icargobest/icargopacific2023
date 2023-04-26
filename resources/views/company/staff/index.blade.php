<title>Company | Staff</title>

@extends('layouts.app')
@include('partials.navigationCompany')

<main class="container py-5" style="margin-top:-49px !important">
    <div class="main-wrapper border border-2" style=" max-width: 100%;">
        <div class="employee-header-container">
            <h3 class="">STAFF LIST</h3>
        </div>

        <div class="addemployee" style="" >
            <button type="button" class="btn btn-primary m-button1" style="" data-bs-toggle="modal" data-bs-target="#addStaffModal">Add Staff</button>
            <a href="{{route('staff.viewArchive')}}">
                <button type="button" class="btn btn-success btn-sm m-button2" style="height:32.8px">
                    Archived
                 </button>
            </a>
        </div>

        <section class="search-filter-container">

            <div class="top-container1" style="max-width: 800px;">
                <h5 class="fw-normal mb-2 d-inline">SEARCH:</h5>
                <div class="input-group rounded">
                    <input type="search" class="form-control rounded" placeholder="Search Staff" aria-label="Search" aria-describedby="search-addon" />
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
                    <th scope="col"style="text-align:center;">#</th>
                    <th scope="col"style="text-align:center;">Name</th>
                    <th scope="col"style="text-align:center;">Email</th>
                    <th scope="col"style="text-align:center;">Contact No</th>
                    <th scope="col"style="text-align:center; width:300px">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($staff as $staff)
                        @if ($staff->archived == 0)
                            <tr>
                                <td >{{$staff->id}}</td>
                                <td class="capitalized">{{$staff->user->name}}</td>
                                <td>{{$staff->user->email}}</td>
                                <td>{{$staff->contact_no}}</td>
                                <td class="td-buttons d-flex justify-content-center" style="overflow:auto;">
                                    @include('company.staff.show')
                                    @include('company.staff.edit')
                                    @include('company.staff.archive')
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
</main>

@include('company.staff.create')
@include('partials.footer')	
