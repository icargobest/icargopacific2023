@extends('layouts.app')
@include('partials.navigationCompany')

<main class="container py-5" style="margin-top:-49px !important">
    <div class="main-wrapper border border-2" style=" max-width: 100%;">
            <div class="staff-header-container">
                <h3 class="">ARCHIVED</h3>
            </div>
        

        <div class="add-staff" style="height:75.6px;" >
            <a href="{{route('staff.index')}}">
                <button type="button" class="btn btn-primary m-button1" style="height:32.8px">
                    Back
                </button>
            </a>
            <div class="mt-2">
                @include('partials.messages')
            </div>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col"style="text-align:center;">#</th>
                    <th scope="col"style="text-align:center;">Name</th>
                    <th scope="col"style="text-align:center;">Contact No</th>
                    <th scope="col"style="text-align:center;">Email</th>
                    <th scope="col"style="text-align:center; width:300px"></th>
                </tr>
                </thead>

                <tbody>
                    @foreach ($staff as $staff)
                        @if ($staff->archived == true)
                            <tr>
                                <td>{{$staff->id}}</td>
                                <td>{{$staff->user->name}}</td>
                                <td>{{$staff->user->email}}</td>
                                <td>{{$staff->contact_no}}</td>
                                <td class="td-buttons"style="overflow:auto">
                                    @include('company.staff.show')
                                    @include('company.staff.restore')
                                </td>
                            </tr>
                        @endif
                    @endforeach    
                </tbody>
            </table>

            <div class="d-flex">
            </div>

        </div>
    </div>  
</main>

@include('partials.footer')	
