
<button type="button" class="btn btn-warning btn-sm" data-mdb-toggle="modal" data-mdb-target="#showModal{{$employee->id}}">
    VIEW
 </button>

 <div class="modal top fade" id="showModal{{$employee->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
     <div class="modal-dialog ">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title col-black" id="exampleModalLabel">VIEW EMPLOYEE</h5>
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
                     <input type="text" id="form6Example1" name="updateFullName" value="{{$employee->name}}" class="form-control" />
                   </div>
                 </div>
               </div>

               <!-- Email input -->
               <div class="label-container">
                <label>EMAIL</label>
              </div>
               <div class="form-outline mb-2">
                 <input type="email" id="form6Example5" name="updateEmail" value="{{$employee->email}}" class="form-control" />
               </div>

               <!-- Password input -->
               <div class="label-container">
                <label>PASSWORD</label>
              </div>
               <div class="form-outline mb-2">
                 <input type="password" id="form6Example5" name="updatePassword" value="{{$employee->password}}" class="form-control" />
               </div>

               <!-- Position -->
               <div class="label-container">
                <label>POSITION</label>
              </div>
                <div class="form-outline mb-2">
                 <input type="text" id="form6Example4" name="updateRole" value="{{$employee->role}}" class="form-control" />
               </div>
            </fieldset>
                 <div class="modal-footer">
                    <a class="btn btn-secondary btn-block" data-mdb-dismiss="modal">
                        Cancel
                    </a>
                 </div>
         </div>
       </div>
     </div>
   </div>
 </div>
