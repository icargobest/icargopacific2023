@extends('layouts.app')
@include('partials.navigationCompany')

<main class="container py-5" style="margin-top:-49px !important">
    <div class="main-wrapper border border-2" style=" max-width: 100%;">
        <div class="employee-header-container">
            <h3 class="">Stations</h3>
        </div>

        <div class="addemployee" style="" >
            <button type="button" class="btn btn-primary m-button1" style="" data-bs-toggle="modal" data-bs-target="#addDriverModal">Add Station</button>
            <a href="{{route('view.stations.archived')}}">
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
                    <th scope="col"style="text-align:center;">Station Number</th>
                    <th scope="col"style="text-align:center;">Station Name</th>
                    <th scope="col"style="text-align:center;">Address</th>
                    <th scope="col"style="text-align:center;">Contact No.</th>
                    <th scope="col"style="text-align:center;">Email</th>
                    <th scope="col"style="text-align:center; width:350px;">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($stations as $station)
                        @if ($station->archived == 0)
                            <tr>
                                <td>{{$station->id}}</td>
                                <td>{{$station->station_number}}</td>
                                <td>{{$station->station_name}}</td>
                                <td>{{$station->station_address}}</td>
                                <td>{{$station->station_contact_no}}</td>
                                <td>{{$station->station_email}}</td>
                                <td class="td-buttons d-flex justify-content-center" style="overflow:auto;">
                                    @include('company/stations.view')
                                    @include('company/stations.edit')
                                    @include('company/stations.archive')                                
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
        <h5 class="modal-title" id="addDriverModal">Add Station</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    
      <div class="modal-divider"></div>

        <div class="modal-body">
            @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
                 @endif
            <form method="POST" action="{{route('add.station')}}">
            @csrf
            
                <!-- Station ID Input -->
            <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="stationID" name="station_number" class="form-control" />
                    <label class="form-label" for="stationID">Station Number</label>
                  </div>
                </div>
              </div>
  
              <!-- Station Name input -->
              <div class="form-outline mb-4">
                <input type="text" id="stationName" name="station_name" class="form-control" />
                <label class="form-label" for="stationName">Station Name</label>
              </div>
  
              <!-- Sttation Address input -->
              <div class="form-outline mb-4">
                <input type="text" id="stationAddress" name="station_address" class="form-control" />
                <label class="form-label" for="stationAddress">Address</label>
              </div>
  
              <!-- Station Contact No. -->
               <div class="form-outline mb-4">
                <input type="text" id="stationContactNo" name="station_contact_no" class="form-control" />
                <label class="form-label" for="stationContactNo">Contact No.</label>
              </div>
  
              <!-- Station Email. -->
               <div class="form-outline mb-4">
                <input type="text" id="stationEmail" name="station_email" class="form-control" />
                <label class="form-label" for="stationEmail">Email</label>
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
