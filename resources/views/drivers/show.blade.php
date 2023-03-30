@include('partials.navigation', ['drivers' => 'fw-bold'])


    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><b>Driver Information</b></div>
                <div class="col col-md-6">
                    <a href="{{ route('drivers.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b>Driver Name</b></label>
                <div class="col-sm-10">
                    {{$driver->driver_name}}
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b>Vehicle Type</b></label>
                <div class="col-sm-10">
                    {{$driver->vehicle_type}}
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form"><b>Plate No.</b></label>
                <div class="col-sm-10">
                    {{$driver->plate_no}}
                </div>
            </div>
          </a>
        </div>
    </form>
  </div>
