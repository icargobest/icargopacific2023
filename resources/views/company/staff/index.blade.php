@extends('layouts.app')
@include('partials.navigationCompany')

<main class="container py-5" style="margin-top:-49px !important">
    <div class="main-wrapper border border-2" style=" max-width: 100%;">
        <div class="employee-header-container">
            <h3 class="">STAFF LIST</h3>
        </div>

        <div class="addemployee" style="" >
            <button type="button" class="btn btn-primary m-button1" style="" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Employee</button>
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

            <div class="top-container2">
                <h5 class="fw-normal mb-2 d-inline"> FILTERS:</h5>
                <div class="dropdown-container">

                    <select class="form-select bold-hover border-black capitalized b-shadow s-margin modified-select" aria-label="Default select example" style="width:150px;">
                        <option value="1" hidden>Title</option>
                        <option value="1">Head Developer</option>
                        <option value="2">Head Designer</option>
                        <option value="3">CEO</option>
                    </select>

                    <select class="form-select bold-hover border-black capitalized b-shadow s-margin modified-select" aria-label="Default select example" style="width:150px;">
                        <option value="1" hidden>Status</option>
                        <option value="1">Active</option>
                        <option value="2">Pending</option>
                        <option value="3">Archived</option>
                    </select>

                    <select class="form-select bold-hover border-black capitalized b-shadow s-margin modified-select" aria-label="Default select example" style="width:150px;">
                        <option value="1" hidden>Position</option>
                        <option value="1">Head Developer</option>
                        <option value="2">Head Designer</option>
                        <option value="3">CEO</option>
                    </select>
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
                                <td>{{$staff->contact_no}}</td>
                                <td>{{$staff->email}}</td>
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


<!-- Modal -->
<div class="modal top   fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Staff</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    
      <div class="modal-divider"></div>

        <div class="modal-body">
          <form method="POST" action="{{route('staff.store')}}">
            @csrf

            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="form-outline mb-4">
                <div class="form-outline">
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="">
                  <label class="form-label" for="form6Example1">FULL NAME</label>
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror 
              </div>
            </div>


            <!-- Email input -->
            <div class="form-outline mb-4">
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder=""/>
              @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
              <label class="form-label" for="form6Example5">EMAIL</label>
            </div>

            <!-- Contact input -->
            <div class="form-outline mb-4">
                <div class="form-outline">
                    <input id="contact" type="text" class="form-control @error('password') is-invalid @enderror" name="contact_no" value="{{ old('contact_no') }}" autocomplete="contact_no" required placeholder="">
                    <label class="form-label" for="form6Example5">Contact</label>
                    @error('contact_no')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <!-- Password -->
            <div class="form-outline mb-4">
              <input type="password" id="form6Example3" name="password" class="form-control" />
              <label class="form-label" for="form6Example3">PASSWORD</label>
            </div>   
              
            <!-- Confirm Password -->
            <div class="form-outline mb-4">
              <input type="password" id="form6Example4" name="password_confirmation" class="form-control" />
              <label class="form-label" for="form6Example4">CONFIRM PASSWORD</label>
            </div>

            <div class="button-modal-container">

                <div class="leftmodal-button-container">
                    <button type="reset" class="btn btn-outline-primary" data-mdb-dismiss="modal">
                        Reset
                    </button>
                </div>
    
                <div class="rightmodal-button-container">
    
                    <button type="submit" class="btn btn-primary" id="addModal2"data-mdb-dismiss="modal">
                        Save
                    </button>

                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                        Back
                    </button>
                </div>

          </form>
        </div>

    </div>
  </div>
</div>

@include('partials.footer')	
