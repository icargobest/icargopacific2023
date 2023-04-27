
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
             <!-- Email input -->
             <div class="label-container">
              <label>NAME</label>
            </div>
             <div class="form-outline mb-2">
               <input type="email" id="form6Example5" name="updateEmail" value=" {{ $user->user->name }}" class="form-control" />
             </div>

             <!-- Email input -->
             <div class="label-container">
              <label>EMAIL</label>
            </div>
             <div class="form-outline mb-2">
               <input type="email" id="form6Example5" name="updateEmail" value=" {{ $user->user->email }}" class="form-control" />
             </div>

             <!-- Email input -->
             <div class="label-container">
              <label>CONTACT NUMBER</label>
            </div>
             <div class="form-outline mb-2">
               <input type="email" id="form6Example5" name="updateEmail" value=" {{ $user->contact_no }}" class="form-control" />
             </div>

             <!-- Email input -->
             <div class="label-container">
              <label>CREATED AT</label>
            </div>
             <div class="form-outline mb-2">
               <input type="email" id="form6Example5" name="updateEmail" value=" {{ $user->created_at }}" class="form-control" />
             </div>

             <div class="label-container">
              <label>UPDATED AT</label>
            </div>
             <div class="form-outline mb-2">
               <input type="email" id="form6Example5" name="updateEmail" value=" {{ $user->updated_at }}" class="form-control" />
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
