
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
           {{--  Driver ID --}}
             <div class="row">
               <div class="col"> 
                <div class="form-outline mb-4">
                  <input type="text" id="id" name="id" value="{{$user->id}}" class="form-control" />
                  <label class="form-label" for="id">Driver ID</label>
                </div>
               </div>
             </div>


             <!-- Name  -->
             <div class="form-outline mb-4">
              <input type="text" id="name" name="name" value="{{$user->name}}" class="form-control" />
              <label class="form-label" for="name">Driver Name</label>
             </div>

             <!-- Email  -->
             <div class="form-outline mb-4">
               <input type="text" id="email" name="email" value="{{$user->email}}" class="form-control" />
               <label class="form-label" for="email">Driver Email</label>
             </div>

             <!-- Vehicle  -->
             <div class="form-outline mb-4">
              <input type="text" id="vehicle_type" name="vehicle_type" value="{{$user->driverDetail->vehicle_type}}" class="form-control" />
              <label class="form-label" for="email">Vehicle Type</label>
             </div>

             <!-- Plate No. -->

              <div class="form-outline mb-4">
               <input type="text" id="plate_no" name="plate_no" value="{{$user->driverDetail->plate_no}}" class="form-control" />
               <label class="form-label" for="plate_no">Plate No.</label>
              </div>
             <!-- Created At. -->

             <div class="form-outline mb-4">
               <input type="text" id="created_at" name="created_at" value="{{$user->created_at}}" class="form-control" />
               <label class="form-label" for="created_at">Created At</label>
             </div>
             <!-- Updated At. -->
             <div class="form-outline mb-4">
               <input type="text" id="updated_at" name="updated_at" value="{{$user->updated_at}}" class="form-control" />
               <label class="form-label" for="updated_at">Updated At</label>
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
