
<button type="button" class="btn btn-warning btn-sm" data-mdb-toggle="modal" data-mdb-target="#showModal{{$user->id}}">
  Show
</button>

<div class="modal top fade" id="showModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
   <div class="modal-dialog ">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title col-black" id="exampleModalLabel">Driver Information</h5>
         <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
          <fieldset disabled>
             <!-- 2 column grid layout with text inputs for the first and last names -->
             <div class="row mb-2">
               <div class="col"> 
                <div class="label-container">
                  <label for="id">Driver ID</label>
                </div>
                 <div class="form-outline">
                   <input type="text" id="id" name="id" value="{{ $user->id }}" class="form-control" />
                 </div>

               </div>
             </div>


             <div class="label-container">
              <label for="name">Driver Name</label>
            </div>
             <div class="form-outline">
               <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control" />
             </div>

             <!-- Email input -->
             <div class="label-container">
              <label>EMAIL</label>
            </div>
             <div class="form-outline mb-2">
               <input type="email" id="email" name="email" value="{{$user->email}}" class="form-control" />
             </div>

             <!-- Password input -->
             <div class="label-container">
              <label>Vehicle Type</label>
            </div>
             <div class="form-outline mb-2">
               <input type="text" id="vehicle_type" name="vehicle_type" value="{{$user->driverDetail->vehicle_type}}" class="form-control" />
             </div>

             <!-- Position -->
             <div class="label-container">
              <label>Plate No.</label>
            </div>
              <div class="form-outline mb-2">
               <input type="text" id="station_email" name="station_email" value="{{$user->driverDetail->plate_no}}" class="form-control" />
             </div>

             <div class="label-container">
              <label>Created At</label>
            </div>
             <div class="form-outline mb-2">
               <input type="text" id="station_email" name="station_email" value="{{$user->created_at}}" class="form-control" />
             </div>

             <div class="label-container">
              <label>Updated At</label>
            </div>
             <div class="form-outline mb-2">
               <input type="text" id="station_email" name="station_email" value="{{$user->updated_at}}" class="form-control" />
             </div>


          </fieldset>
               <div class="modal-footer">
                  <a class="btn btn-dark btn-block" data-mdb-dismiss="modal">
                      Back
                  </a>
               </div>
       </div>
     </div>
   </div>
 </div>
</div>
