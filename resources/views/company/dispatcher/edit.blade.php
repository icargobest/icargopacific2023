
<button type="button" class="btn btn-success btn-sm" data-mdb-toggle="modal" data-mdb-target="#editModal{{$user->id}}">
  EDIT
</button>

<div class="modal top fade" id="editModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
   <div class="modal-dialog ">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title col-green" id="exampleModalLabel">Edit Information</h5>
         <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
          @if(session('status'))
          <div class="alert alert-success mb-1 mt-1">
              {{ session('status') }}
          </div>
          @endif
           <form action="{{ route('dispatcher.update',$user->id) }}" method="POST" enctype="multipart/form-data">
             @csrf
             @method('PUT')
             <div class="row mb-2">
               <div class="col">
                 <div class="label-container">
                   <label>Dispatcher Name:</label>
                 </div>
                 <div class="form-outline">
                   <input type="text" id="form6Example1" name="name" value="{{ $user->name }}" class="form-control" placeholder="Driver name"/>
                      @error('name')
                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                      @enderror
                  </div>
               </div>
             </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary btn-block">
                Save changes
              </button>
              <a class="btn btn-secondary btn-block" data-mdb-dismiss="modal">
                Cancel
              </a>
            </div>

               </div>
           </form>
         </div>

     </div>
   </div>
 </div>
</div>
