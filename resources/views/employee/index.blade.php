@include('partials.admin-nav')

@include('layouts.app')


<style>
.table-container
{
overflow: auto;
}

td button
{
min-width: 80px !important;
}

</style>

<head>
    <link rel="stylesheet" href="{{ asset('css/employee.css') }}">
    <link rel="stylesheet" href="/css/waybill-list.css" />
</head>

<main class="container py-5" style="margin-top:-49px !important">
    <div class="main-wrapper border border-2" style=" max-width: 100%;">
        <div class="employee-header-container">
            <h3 class="">EMPLOYEE LIST</h3>
        </div>

        <section class="search-filter-container">

            <div class="top-container1" style="max-width: 800px;">
                <h5 class="fw-normal mb-2 d-inline"> SEARCH:</h5>
                <div class="input-group rounded">
                    <input type="search" class="form-control rounded" placeholder="Search Employee" aria-label="Search" aria-describedby="search-addon" />
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

        <div class="addemployee" >
            <button type="button" class="btn btn-primary mb-1 m-button1 fs-medium" style="" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Employee</button>
            <a href="{{route('viewArchive')}}">
                <button type="button" class="btn mb-1 m-button2 fs-medium">
                Archived
                </button>
            </a>
        </div>

        <div class="mt-2">
            @include('partials.messages')
        </div>


        <div class="table-container">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col" width="1%">#</th>
                    <th scope="col" width="15%">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Position</th>
                    <th scope="col" width="1%" colspan="3"></th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        @if ($employee->archived == 0)
                            <tr>
                                <td >{{$employee->id}}</td>
                                <td class="capitalized">{{$employee->name}}</td>
                                <td>{{$employee->email}}</td>
                                <td class="capitalized">{{$employee->role}}</td>
                                <td>@include('employee.view')</td>
                                <td>@include('employee.edit')</td>
                                <td>@include('employee.archive')</td>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    
      <div class="modal-divider"></div>

        <div class="modal-body">
          <form method="POST" action="{{route('addEmployee')}}">
            @csrf

            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="form-outline mb-4">
                <div class="form-outline">
                  <input type="text" id="form6Example1" name="FullName" class="form-control" />
                  <label class="form-label" for="form6Example1">FULL NAME</label>
              </div>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" id="form6Example5"  name="email" class="form-control" />
              <label class="form-label" for="form6Example5">EMAIL</label>
            </div>
          
            <!-- Job -->
            <div class="form-outline mb-4">
              <input type="text" id="form6Example3" name="password" class="form-control" />
              <label class="form-label" for="form6Example3">PASSWORD</label>
            </div>    
              
            <!-- Position -->
            <div class="form-outline mb-4">
              <input type="text" id="form6Example4" name="role" class="form-control" />
              <label class="form-label" for="form6Example4">POSITION</label>
            </div>
                    
          
            <!-- Message input -->
{{--             <div class="form-outline mb-4">
              <textarea class="form-control" id="form6Example7" rows="4"></textarea>
              <label class="form-label" for="form6Example7">Additional information</label>
            </div> --}}


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