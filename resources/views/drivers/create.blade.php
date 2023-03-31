<button type="button" class="btn btn-success" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
    Add Driver
</button>
<div class="modal top fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Driver</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('drivers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Driver Name -->
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input type="text" id="form6Example1" name="driver_name" class="form-control" />
                  <label class="form-label" for="form6Example1">Driver Name</label>
                </div>
              </div>
            </div>

            <!-- Vehicle Type -->
            <div class="form-outline mb-4">
              <input type="text" id="form6Example5" name="vehicle_type" class="form-control" />
              <label class="form-label" for="form6Example5">Vehicle Type</label>
            </div>

            <!-- Plate No. -->
             <div class="form-outline mb-4">
              <input type="text" id="form6Example4" name="plate_no" class="form-control" />
              <label class="form-label" for="form6Example4">Plate No.</label>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-block">
                  Save
                </button>
                <button type="reset" class="btn btn-danger btn-block mb-4">
                  Reset
                </button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>