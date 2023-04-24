<button type="button" class="btn btn-warning btn-sm" data-mdb-toggle="modal" data-mdb-target="#showModal{{$user->id}}">
    Show
 </button>
    
  <div class="modal fade" id="showModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Driver Information</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <fieldset disabled>
            <!-- 2 column grid layout with text inputs for the first and last names -->

          <!-- Driver ID -->
          <div class="row mb-4">
           <div class="col">
             <div class="form-outline">
               <input type="text" id="id" name="id" value="{{ $user->id }}" class="form-control" />
               <label class="form-label" for="id">Driver ID</label>
             </div>
           </div>
         </div>

         <!-- Driver Name -->
          <div class="form-outline mb-4">
            <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control" />
            <label class="form-label" for="name">Driver Name</label>
          </div>

         <!-- Driver Email -->
         <div class="form-outline mb-4">
           <input type="text" id="email" name="email" value="{{ $user->email }}" class="form-control" />
           <label class="form-label" for="email">Email</label>
         </div>

         <!-- Driver vehicle type -->
          <div class="form-outline mb-4">
           <input type="text" id="vehicle_type" name="vehicle_type" value="{{ $user->driverDetail->vehicle_type }}" class="form-control" />
           <label class="form-label" for="vehicle_type">Vehicle Type</label>
         </div>

         <!-- Driver plate no. -->
          <div class="form-outline mb-4">
           <input type="text" id="plate_no" name="plate_no" value="{{ $user->driverDetail->plate_no }}" class="form-control" />
           <label class="form-label" for="plate_no">Plate Number</label>
         </div>

         <!-- Created at -->
          <div class="form-outline mb-4">
           <input type="text" id="stationEmail" name="station_email" value="{{$user->created_at}}" class="form-control" />
           <label class="form-label" for="stationEmail">Created At</label>
         </div>

         <!-- Updated at -->
          <div class="form-outline mb-4">
           <input type="text" id="stationEmail" name="station_email" value="{{$user->updated_at}}" class="form-control" />
           <label class="form-label" for="stationEmail">Updated At</label>
         </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
