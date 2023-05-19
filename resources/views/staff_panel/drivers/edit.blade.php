
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
           <form action="{{ route('driver.update',$user->id) }}" method="POST" enctype="multipart/form-data">
             @csrf
             @method('PUT')

             <div class="form-outline mb-4">
              <img src="{{ url('images/company/drivers/'.$user->image) }}" height="100" width="100" alt="profile image">
              <input class="form-control" type="file" id="formFile" name="image">
            </div>
             {{-- Name Input --}}
             <div class="row mb-2">
               <div class="col">
                 <div class="form-outline mb-3">
                   <input type="text" id="name" name="name" value="{{ $user->user->name }}" class="form-control" placeholder="Driver name"/>
                      @error('name')
                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                      @enderror
                  <label class="form-label" for="name">Driver Name</label>
                  </div>
               </div>
             </div>

             <!-- Contact Number input -->
             <div class="form-outline mb-4">
                <input type="text" name="contact_no" value="{{ $user->contact_no }}" class="form-control" placeholder="Contact No" 
                oninput="this.value = this.value.replace(/[^0-9.]/g, '')"
                minlength="11" 
                maxlength="11" required>
                    @error('contact_no')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                <label class="form-label" for="plate_no">Contact No.</label>
             </div>

             <div class="form-outline mb-4">
              <input type="tel" name="tel" value="{{ $user->tel }}" class="form-control" placeholder="Tel No" 
              oninput="this.value = this.value.replace(/[^0-9.]/g, '')"
              minlength="7" 
              maxlength="9" required>
                  @error('contact_no')
                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                  @enderror
              <label class="form-label" for="plate_no">Tel No.</label>
          </div>

          <div class="form-outline mb-4">
            <input type="text" name="street" value="{{ $user->street }}" class="form-control" placeholder="Street"  required>
                @error('street')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            <label class="form-label" for="street">Street</label>
         </div>

          <div class="form-outline mb-4">
            <input type="text" name="city" value="{{ $user->city }}" class="form-control" placeholder="City"  required>
                @error('city')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            <label class="form-label" for="plate_no">City</label>
        </div>

          <div class="form-outline mb-4">
            <input type="text" name="state" value="{{ $user->state }}" class="form-control" placeholder="State"  required>
                @error('state')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            <label class="form-label" for="plate_no">State</label>
        </div>

        <div class="form-outline mb-4">
          <input type="text" name="postal_code" value="{{ $user->postal_code }}" class="form-control" placeholder="Contact No"  
          oninput="this.value = this.value.replace(/[^0-9.]/g, '')"
          minlength="4" 
          maxlength="4" required>
              @error('postal_code')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
              @enderror
          <label class="form-label" for="plate_no">Postal Code</label>
      </div>
             
             <!-- License Number input -->
             <div class="form-outline mb-3">
              <input type="text" name="license_number" value="{{ $user->license_number }}" class="form-control" placeholder="License No" 
              oninput="this.value = this.value.replace(/[^0-9.]/g, '')"
              minlength="11" 
              maxlength="11" required>
                  @error('license_number')
                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                  @enderror
              <label class="form-label" for="license_number">License No.</label>
           </div>

             <!-- Type input -->
             <div class="row mb-4">
              <div class="col">
               <label class="form-label" for="vehicle_type"></label>
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

             <!-- Plate Number input -->
             <div class="form-outline mb-4">
              <input type="text" name="plate_no" value="{{ $user->plate_no }}" class="form-control" placeholder="Plate No">
                  @error('plate_no')
                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                  @enderror
              <label class="form-label" for="plate_no">Plate No.</label>
             </div>

                 <div class="modal-footer">
                  <button type="submit" class="btn btn-primary btn-block" id="addModal2" data-mdb-dismiss="modal">
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