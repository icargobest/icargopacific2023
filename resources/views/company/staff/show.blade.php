
<button type="button" class="btn btn-warning btn-sm" data-mdb-toggle="modal" data-mdb-target="#showModal{{$staff->id}}">
    SHOW
 </button>

 <div class="modal top fade" id="showModal{{$staff->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
     <div class="modal-dialog ">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title col-black" id="exampleModalLabel">VIEW STAFF</h5>
           <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <fieldset disabled>
               <!-- 2 column grid layout with text inputs for the first and last names -->
               <div class="row mb-2">
                 <div class="col"> 
                  <div class="label-container">
                    <label>FULL NAME</label>
                  </div>
                   <div class="form-outline">
                     <input type="text" id="form6Example1" name="updateFullName" value="{{$staff->user->name}}" class="form-control" />
                   </div>
                 </div>
               </div>

               <!-- Email input -->
               <div class="label-container">
                <label>EMAIL</label>
              </div>
               <div class="form-outline mb-2">
                 <input type="email" id="form6Example5" name="updateEmail" value="{{$staff->user->email}}" class="form-control" />
               </div>


               <!-- Contact No input -->
               <div class="label-container">
                <label>Contact No.</label>
              </div>
               <div class="form-outline mb-2">
                 <input type="text" id="form6Example5" name="updatePassword" value="{{$staff->contact_no}}" class="form-control" />
               </div>

               <!-- Contact No input -->
               <div class="label-container">
                <label>Created At</label>
              </div>
               <div class="form-outline mb-2">
                 <input type="text" id="form6Example5" name="updatePassword" value="{{$staff->created_at}}" class="form-control" />
               </div>

               <!-- Contact No input -->
               <div class="label-container">
                <label>Updated At</label>
              </div>
               <div class="form-outline mb-2">
                 <input type="text" id="form6Example5" name="updatePassword" value="{{$staff->updated_at}}" class="form-control" />
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
