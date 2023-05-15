<button type="button" class="btn btn-warning btn-sm" data-mdb-toggle="modal" data-mdb-target="#showModal{{$user->id}}">
  Show
</button>

<div class="modal top fade" id="showModal{{$user->id}}" tabindex="-1" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
   <div class="modal-dialog ">
     <div class="modal-content">
       <div class="modal-header mbc1">
         <h5 class="modal-title">Dispatcher Information</h5>
         <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
          <fieldset disabled>
             <div class="row mb-4">
               <div class="col"> 
                 <div class="form-outline">
                   <input type="text" id="forupdateFullNamem6Example1" name="updateFullName" value="{{ $user->user->name }}" class="form-control" />
                   <label class="form-label" for="updateFullName">Dispatcher Name</label>
                  </div>
               </div>
             </div>

             <!-- Email input -->
             <div class="form-outline mb-4">
               <input type="email" id="updateEmail" name="updateEmail" value=" {{ $user->user->email }}" class="form-control" />
               <label class="form-label" for="updateEmail">Dispatcher Email</label>
             </div>

             <div class="form-outline mb-4">
               <input type="text" id="contact_no" name="contact_no" value="{{ $user->contact_no }}" class="form-control" style="text-transform:capitalize;"/>
               <label class="form-label" for="contact_no">Contact Number</label>
             </div>

             
             <div class="form-outline mb-4">
              <input type="text" id="created_at" name="created_at" value="{{date('M d, Y h:i:s A', strtotime($user->user->created_at))}}" class="form-control" style="text-transform:capitalize;"/>
              <label class="form-label" for="contact_no">Created At</label>
            </div>

            <div class="form-outline mb-4">
              <input type="text" id="updated_at" name="updated_at" value="{{date('M d, Y h:i:s A', strtotime($user->user->updated_at))}}" class="form-control" style="text-transform:capitalize;"/>
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