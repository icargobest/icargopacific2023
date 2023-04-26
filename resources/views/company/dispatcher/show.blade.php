
<button type="button" class="btn btn-warning btn-sm" data-mdb-toggle="modal" data-mdb-target="#showModal{{$user->id}}">
  Show
</button>

<div class="modal top fade" id="showModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
   <div class="modal-dialog ">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title col-black" id="exampleModalLabel">Dispatcher Information</h5>
         <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
          <fieldset disabled>
             <!-- 2 column grid layout with text inputs for the first and last names -->
             <div class="row mb-2">
               <div class="col"> 
                <div class="label-container">
                  <label>Dispatcher Name</label>
                </div>
                 <div class="form-outline">
                   <input type="text" id="form6Example1" name="updateFullName" value="{{ $user->name }}" class="form-control" />
                 </div>
               </div>
             </div>

             <!-- Email input -->
             <div class="label-container">
              <label>EMAIL</label>
            </div>
             <div class="form-outline mb-2">
               <input type="email" id="form6Example5" name="updateEmail" value=" {{ $user->email }}" class="form-control" />
             </div>

             <!-- Password input -->
             <div class="label-container">
              <label>Type</label>
            </div>
             <div class="form-outline mb-2">
               <input type="text" id="form6Example5" name="vehicle_type" value="{{ $user->type }}" class="form-control" style="text-transform:capitalize;"/>
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
