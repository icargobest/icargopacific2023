<button type="button" class="btn btn-warning btn-sm" data-mdb-toggle="modal" data-mdb-target="#showModal{{$user->id}}">
    Show
 </button>
    
  <div class="modal fade" id="showModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Dispatcher Information</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <fieldset disabled>
            <!-- 2 column grid layout with text inputs for the first and last names -->

          <!-- Dispatcher ID -->
          <div class="row mb-4">
           <div class="col">
             <div class="form-outline">
               <input type="text" id="id" name="id" value="{{ $user->id }}" class="form-control" />
               <label class="form-label" for="id">Dispatcher ID</label>
             </div>
           </div>
         </div>

         <!-- Dispatcher Name -->
          <div class="form-outline mb-4">
            <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control" />
            <label class="form-label" for="name">Dispatcher Name</label>
          </div>

         <!-- Dispatcher Email -->
         <div class="form-outline mb-4">
           <input type="text" id="email" name="email" value="{{ $user->email }}" class="form-control" />
           <label class="form-label" for="email">Email</label>
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
