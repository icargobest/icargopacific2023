
<button type="button" class="btn btn-success btn-sm" data-mdb-toggle="modal" data-mdb-target="#editModal{{ $user->id }}">
  Edit
</button>

<div class="modal top fade" id="editModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header mbc2">
        <h5 class="modal-title" id="exampleModalLabel">Edit Dispatcher Information</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      @if(session('status'))
      <div class="alert alert-success mb-1 mt-1">
          {{ session('status') }}
      </div>
      @endif
      <form action="{{ route('dispatchers.update',$user->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="form-outline mb-4">
            <img src="{{ url('images/company/dispatchers/'.$user->image) }}" height="100" width="100" alt="profile image">
            <input class="form-control" type="file" id="formFile" name="image">
          </div>
          <div class="row ">
              <div class="col">
                  <div class="form-outline mb-4">
                      <input type="text" name="name" value="{{ $user->user->name }}" class="form-control"
                          placeholder="Dispatcher name" required>
                         <label class="form-label" for="name">Dispatcher Name</label>
                      @error('name')
                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                      @enderror
                  </div>
              </div>
          </div>
            <div class="form-outline mb-4">
              <div class="col">
                <div class="form-outline mb-4">
                    <input type="text" name="contact_no" value="{{ $user->contact_no }}" class="form-control" 
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '')"
                        minlength="11" 
                        maxlength="11"
                        placeholder="Contact Number:" required>
                        <label class="form-label" for="name">Contact No.</label>

                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
             </div>
           </div>
           <div class="form-outline mb-4">
            <input type="tel" name="tel" value="{{ $user->tel }}" class="form-control" placeholder="Tel No" 
            oninput="this.value = this.value.replace(/[^0-9.]/g, '')"
            minlength="7" 
            maxlength="9">
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
          <div class="modal-footer">
            <button type="submit" class="btn btn-success btn-block">
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
