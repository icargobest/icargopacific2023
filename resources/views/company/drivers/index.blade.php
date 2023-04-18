@extends('layouts.app')
@include('partials.navigationCompany')

<main class="container py-5" style="margin-top:-49px !important">
    <div class="main-wrapper border border-2" style=" max-width: 100%;">
        <div class="employee-header-container">
            <h3 class="">DRIVERS LIST</h3>
        </div>

        <div class="addemployee" style="" >
            <button type="button" class="btn btn-primary m-button1" style="" data-bs-toggle="modal" data-bs-target="#addDriverModal">Add Driver</button>
            <a href="{{route('drivers.viewArchive')}}">
                <button type="button" class="btn btn-success btn-sm m-button2" style="height:32.8px">
                    Archived
                 </button>
            </a>
        </div>

        <section class="search-filter-container">

            <div class="top-container1" style="max-width: 800px;">
                <h5 class="fw-normal mb-2 d-inline">SEARCH:</h5>
                <div class="input-group rounded">
                    <input type="search" class="form-control rounded" placeholder="Search Driver" aria-label="Search" aria-describedby="search-addon" />
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
                    <th scope="col"style="text-align:center;">Driver Name</th>
                    <th scope="col"style="text-align:center;">Vehicle Type</th>
                    <th scope="col"style="text-align:center;">Plate Number</th>
                    <th scope="col"style="text-align:center; width:350px;">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        @if ($user->driverDetail->archived == false)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->driverDetail->vehicle_type }}</td>
                                <td>{{ $user->driverDetail->plate_no }}</td>
                                <td class="td-buttons d-flex justify-content-center" style="overflow:auto;">
                                    @include('company/drivers.show')
                                    @include('company/drivers.edit')
                                    @include('company/drivers.archive')                                
                                    
                                    @if($user->status == 1)
                                    <a href="{{ route('driver.status.update', ['user_id' => $user->id, 'status_code' => 0]) }}" class="btn btn-danger" style="width:80px !important;">
                                        Lock
                                    </a>
                                    @else
                                    <a href="{{ route('driver.status.update', ['user_id' => $user->id, 'status_code' => 1]) }}" class="btn btn-success" style="width:80px !important;">
                                        unlock
                                    </a>
                                @endif
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
<div class="modal top fade" id="addDriverModal" tabindex="-1" aria-labelledby="addDriverModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addDriverModal">Add Driver</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    
      <div class="modal-divider"></div>

        <div class="modal-body">
          <form action="{{ route('drivers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- 2 column grid layout with text inputs for the first and last names -->
            <!-- Driver Name -->
            <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                  @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                    <label class="form-label" for="form6Example1">FULL NAME</label>
                  </div>
                </div>
              </div>
  
              <!-- Driver Email -->
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" >
                                  @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                    <label class="form-label" for="form6Example1">EMAIL</label>
                  </div>
                </div>
              </div>
  
              <!-- Driver password -->
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                  @error('password')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                    <label class="form-label" for="form6Example1">PASSWORD</label>
                  </div>
                </div>
              </div>
  
               <!-- Driver confirm password -->
               <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <input type="password" id="form6Example1" name="password_confirmation" class="form-control" required/>
                    <label class="form-label" for="form6Example1">CONFIRM PASSWORD</label>
                  </div>
                </div>
              </div>
            
            <h4>Driver Details</h4>
            <div class="row mb-4">
              <label class="form-label" for="vehicle_type"></label>
              <select type="text" id="form6Example5" name="vehicle_type"style="width:95% !important; margin:auto;border:1px solid #ced4da; height:33.26px; border-radius:0.375rem;padding: 5.12px 12px; color:#828282;"required>
                <option value="" hidden>VEHICLE TYPE</option>
                <option value="Motorcycle">Motorcycle</option>
                <option value="Van">Van</option>
                <option value="Truck">Truck</option>
              </select>
            </div>

            <div class="form-outline mb-4">
                <input type="text" id="form6Example4" name="plate_no" class="form-control"required />
                <label class="form-label" for="form6Example4">PLATE NO.</label>
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
