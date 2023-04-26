
<button type="button" class="btn btn-warning btn-sm" data-mdb-toggle="modal" data-mdb-target="#showModal{{$user->id}}">
  Show
</button>

<div class="modal top fade" id="showModal{{$user->id}}" tabindex="-1" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
   <div class="modal-dialog ">
     <div class="modal-content">
       <div class="modal-header mbc1">
         <h5 class="modal-title">Driver Information</h5>
         <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
          <fieldset disabled>
            <!-- Email input -->
            <div class="label-container">
              <label>DRIVER ID</label>
            </div>
             <div class="form-outline mb-2">
               <input type="email" id="email" name="id" value="{{$user->id}}" class="form-control" />
             </div>


             <!-- Email input -->
             <div class="label-container">
              <label>DRIVER NAME</label>
            </div>
             <div class="form-outline mb-2">
               <input type="email" id="email" name="name" value="{{$user->user->name}}" class="form-control" />
             </div>

             <!-- Email input -->
             <div class="label-container">
              <label>EMAIL</label>
            </div>
             <div class="form-outline mb-2">
               <input type="email" id="email" name="email" value="{{$user->user->email}}" class="form-control" />
             </div>

             <!-- Password input -->
             <div class="label-container">
              <label>VEHICLE TYPE</label>
            </div>
             <div class="form-outline mb-2">
               <input type="text" id="vehicle_type" name="vehicle_type" value="{{$user->vehicle_type}}" class="form-control" />
             </div>

             <!-- Password input -->
             <div class="label-container">
              <label>CONTACT NUMBER</label>
            </div>
             <div class="form-outline mb-2">
               <input type="text" id="vehicle_type" name="contact_no" value="{{$user->contact_no}}" class="form-control" />
             </div>

             <!-- Password input -->
             <div class="label-container">
              <label>LICENSE NUMBER</label>
            </div>
             <div class="form-outline mb-2">
               <input type="text" id="vehicle_type" name="license_number" value="{{$user->license_number}}" class="form-control" />
             </div>

             <!-- Position -->
             <div class="label-container">
              <label>PLATE NUMBER</label>
            </div>
              <div class="form-outline mb-2">
               <input type="text" id="station_email" name="plate_no" value="{{$user->plate_no}}" class="form-control" />
             </div>

             <!-- Created At. -->
             <div class="label-container">
              <label>CREATED AT</label>
            </div>
              <div class="form-outline mb-2">
               <input type="text" id="station_email" name="created_at" value="{{$user->created_at}}" class="form-control" />
             </div>

             <!-- Updated At. -->
             <div class="label-container">
              <label>UPDATED AT</label>
            </div>
              <div class="form-outline mb-2">
               <input type="text" id="station_email" name="updated_at" value="{{$user->updated_at}}" class="form-control" />
             </div>


          </fieldset>
               <div class="modal-footer">
                  <a class="btn btn-secondary btn-block" data-mdb-dismiss="modal">
                      Back
                  </a>
               </div>
       </div>
     </div>
   </div>
 </div>
</div>
