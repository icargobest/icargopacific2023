
<button type="button" class="btn btn-success btn-sm" data-mdb-toggle="modal" data-mdb-target="#editModal{{$user->id}}">
    EDIT
 </button>
 
 <div class="modal top fade" id="editModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
     <div class="modal-dialog ">
       <div class="modal-content">
         <div class="modal-header mbc2">
           <h5 class="modal-title" id="exampleModalLabel">Edit Information</h5>
           <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
            @endif
             <form action="{{ route('drivers.update',$user->id) }}" method="POST" enctype="multipart/form-data">
               @csrf
               @method('PUT')
               <div class="label-container">
                <label>Name:</label>
              </div>
              <div class="form-outline mb-2">
               <input type="text" name="name" value="{{ $user->user->name }}" class="form-control" placeholder="Contact No" required>
                   @error('contact_no')
                       <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                   @enderror
              </div>


               <div class="label-container">
                <label>Contact Number:</label>
              </div>
              <div class="form-outline mb-2">
               <input type="text" name="contact_no" value="{{ $user->contact_no }}" class="form-control" placeholder="Contact No" 
               oninput="this.value = this.value.replace(/[^0-9.]/g, '')"
               minlength="11" 
               maxlength="11" required>
                   @error('contact_no')
                       <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                   @enderror
              </div>

              <div class="label-container">
                <label>License Number:</label>
              </div>
              <div class="form-outline mb-2">
               <input type="text" name="license_number" value="{{ $user->license_number }}" class="form-control" 
               minlength="11" 
               maxlength="11"   placeholder="License No" required>
                   @error('license_number')
                       <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                   @enderror
              </div>

               <div class="row mb-2">
                <div class="col">
                  <div class="label-container">
                    <label>Vehicle Type:</label>
                  </div>
                  <select type="text" id="form6Example5" name="vehicle_type"style="width:100% !important; margin:auto;border:1px solid #ced4da; height:33.26px; border-radius:0.375rem;padding: 5.12px 12px; color:#828282;"required>
                    <option value="{{ $user->vehicle_type }}" hidden>{{ $user->vehicle_type }}</option>
                    <option value="Motorcycle">Motorcycle</option>
                    <option value="Van">Van</option>
                    <option value="Truck">Truck</option>
                  </select>
                  
                      @error('vehicle_type')  
                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                      @enderror
                </div>
              </div>


               <div class="label-container">
                 <label>Plate Number:</label>
               </div>
               <div class="form-outline mb-2">
                <input type="text" name="plate_no" value="{{ $user->plate_no }}" class="form-control" 
                minlength="6" 
                maxlength="8"   placeholder="Plate No" required>
                    @error('plate_no')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
               </div>

                   <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-block" id="addModal2">
                      Save changes
                    </button>
                    <a href="{{route('drivers.index')}}" class="btn btn-secondary btn-block" data-mdb-dismiss="modal">
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
 