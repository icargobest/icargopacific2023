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
                  <input type="text" id="form6Example1" name="name" class="form-control" required/>
                  <label class="form-label" for="form6Example1">Driver Name</label>
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
            </div>

            <!-- Driver Email -->
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input type="email" id="form6Example1" name="email" class="form-control" required/>
                  <label class="form-label" for="form6Example1">Email</label>
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
            </div>

            <!-- Driver password -->
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input type="password" id="form6Example1" name="password" class="form-control" required/>
                  <label class="form-label" for="form6Example1">Password</label>
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                </div>
              </div>
            </div>

             <!-- Driver confirm password -->
             <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input type="password" id="form6Example1" name="password_confirmation" class="form-control" required/>
                  <label class="form-label" for="form6Example1">Confirm Password</label>
                </div>
              </div>
            </div>

            <h4>Driver Details</h4>

            <!-- Vehicle Type -->
            <div class="row mb-4">
              <div class="col">
              <label for="vehicle_type">Vehicle Type</label>
                <select type="text" id="form6Example5" name="vehicle_type" required>
                  <option value="" hidden>Select Vehicle Type</option>
                  <option value="Motorcycle">Motorcycle</option>
                  <option value="Van">Van</option>
                  <option value="Truck">Truck</option>
                </select>
              </div>
            </div>

            <!-- Plate No. -->
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input type="text" id="form6Example1" name="plate_no" class="form-control" required />
                  <label class="form-label" for="form6Example1">Plate No.</label>
                </div>
              </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-block">
                  Save
                </button>
                <button type="reset" class="btn btn-danger btn-block mb-4">
                  Clear
                </button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>