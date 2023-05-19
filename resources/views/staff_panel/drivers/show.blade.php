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
            <div class="row">
              <div class="col">
                <div class="mb-4">
                  <img src="@if ($user->image != null) {{ url('images/company/drivers/'.$user->image) }} @else /img/default_dp.png @endif" height="100" width="100" alt="profile image">
                </div>
              </div>
            </div>
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
              <div class="form-outline mb-4">
                <input type="email" id="email" name="email" value="{{$user->user->name}}" class="form-control" />
                <label class="form-label" for="email">Driver Name</label>
              </div>

             <!-- Email  -->
             <div class="form-outline mb-4">
               <input type="email" id="email" name="email" value="{{$user->user->email}}" class="form-control" />
               <label class="form-label" for="email">Driver Email</label>
             </div>

             <!-- Vehicle  -->
             <div class="form-outline mb-4">
              <input type="text" id="vehicle_type" name="vehicle_type" value="{{$user->vehicle_type}}" class="form-control" />
              <label class="form-label" for="vehicle_type">Vehicle Type</label>
             </div>

             <!-- Contact No.  -->
             <div class="form-outline mb-4">
              <input type="text" id="contact_no" name="contact_no" value="{{$user->contact_no}}" class="form-control" />
              <label class="form-label" for="contact_no">Contact No.</label>
             </div>
             
             <div class="form-outline mb-4">
              <input type="text" id="contact_no" name="tel" value="{{$user->tel}}" class="form-control" />
              <label class="form-label" for="contact_no">Tel No.</label>
             </div>

             <div class="form-outline mb-4">
              <input type="text" id="contact_no" name="street" value="{{$user->street}}" class="form-control" />
              <label class="form-label" for="contact_no">Street</label>
             </div>

             <div class="form-outline mb-4">
              <input type="text" id="contact_no" name="city" value="{{$user->city}}" class="form-control" />
              <label class="form-label" for="contact_no">City</label>
             </div>

             <div class="form-outline mb-4">
              <input type="text" id="contact_no" name="postal_code" value="{{$user->postal_code}}" class="form-control" />
              <label class="form-label" for="contact_no">Postal Code</label>
             </div>

             <div class="form-outline mb-4">
              <input type="text" id="contact_no" name="state" value="{{$user->state}}" class="form-control" />
              <label class="form-label" for="contact_no">State</label>
             </div>

             <!-- License No.  -->

             <div class="form-outline mb-4">
              <input type="text" id="license_number" name="license_number" value="{{$user->license_number}}" class="form-control" />
              <label class="form-label" for="license_number">License No.</label>
             </div>             

             <!-- Plate No. -->

              <div class="form-outline mb-4">
               <input type="text" id="plate_no" name="plate_no" value="{{$user->plate_no}}" class="form-control" />
               <label class="form-label" for="plate_no">Plate No.</label>
              </div>
              
             <!-- Created At. -->

              <div class="form-outline mb-4">
                <input type="text" id="created_at" name="created_at" value="{{date('M d, Y h:i:s A', strtotime($user->user->created_at))}}" class="form-control" />
                <label class="form-label" for="created_at">Created At</label>
              </div>

             <!-- Updated At. -->

              <div class="form-outline mb-4">
               <input type="text" id="updated_at" name="updated_at" value="{{date('M d, Y h:i:s A', strtotime($user->user->updated_at))}}" class="form-control" />
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