<title>Company | Staffs Archived</title>
@include('partials.header')
@extends('layouts.app')
@include('partials.navigationCompany')
<style>
    svg{
        width:  1.5rem;
        height: 1.5rem;
    }
</style>
<main class="container py-5" style="margin-top:-49px !important">
    <div class="main-wrapper border border-2" style=" max-width: 100%;">
            <div class="employee-header-container">
                <h3 class="">Staff archived</h3>
            </div>
        <div class="addemployee" style="height:75.6px;" >
            <a href="{{route('staff.index')}}">
                <button type="button" class="btn btn-primary m-button1" style="height:32.8px">
                    Back
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
                    <th scope="col" >#</th>
                    <th scope="col" >Staff Name</th>
                    <th scope="col" >Email</th>
                    <th scope="col" >Contact No.</th>
                    <th scope="col" style="text-align:center !important; width:300px">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($staff as $staff)
                        @if ($staff->archived == true)
                            <tr>
                                <td>{{ $staff->id }}</td>
                                <td>{{ $staff->user->name}}</td>
                                <td>{{ $staff->user->email}}</td>
                                <td>{{ $staff->contact_no}}</td>
                                <td class="td-buttons d-flex justify-content-center"style="overflow:auto">
                                    @include('company/staff.show')
                                    @include('company/staff.restore')
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>  
</main>

@include('partials.footer')	