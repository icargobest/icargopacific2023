
<button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
    Add Station
</button>

<div class="modal top fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Station</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
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

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-block">
                  Save
                </button>
                <a class="btn btn-secondary btn-block" data-mdb-dismiss="modal">
                  Back
                </a>
              </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>
