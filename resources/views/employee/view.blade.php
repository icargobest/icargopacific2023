
<button type="button" class="btn btn-warning btn-sm" data-mdb-toggle="modal" data-mdb-target="#showModal{{$employee->id}}">
    View
 </button>

 <div class="modal top fade" id="showModal{{$employee->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
     <div class="modal-dialog ">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">View</h5>
           <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <fieldset disabled>
               <!-- 2 column grid layout with text inputs for the first and last names -->
               <div class="row mb-4">
                 <div class="col">
                   <div class="form-outline">
                     <input type="text" id="form6Example1" name="updateFullName" value="{{$employee->name}}" class="form-control" />
                   </div>
                 </div>
               </div>

               <!-- Email input -->
               <div class="form-outline mb-4">
                 <input type="email" id="form6Example5" name="updateEmail" value="{{$employee->email}}" class="form-control" />
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
