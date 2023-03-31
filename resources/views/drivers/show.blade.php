<button type="button" class="btn btn-warning btn-sm" data-mdb-toggle="modal" data-mdb-target="#showModal{{$driver->id}}">
    Show
 </button>
    
  <div class="modal fade" id="showModal{{$driver->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Driver Information</h5>
          </button>
        </div>
        <div class="modal-body">
            <div class="row mb-4">
                <label class="col-sm-10 col-label-form"><b>Driver Name</b></label>
                <div class="col-sm-10">
                    {{$driver->driver_name}}
                </div>
            </div>
            <div class="row mb4">
                <label class="col-sm-10 col-label-form"><b>Vehicle Type</b></label>
                <div class="col-sm-10">
                    {{$driver->vehicle_type}}
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-10 col-label-form"><b>Plate No.</b></label>
                <div class="col-sm-10">
                    {{$driver->plate_no}}
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
