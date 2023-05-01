<!-- Modal -->
<div class="modal top fade" id="addDriverModal" tabindex="-1" aria-labelledby="addDriverModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addDriverModal">Add Driver</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

        <div class="modal-body">
          <form action="{{ route('drivers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Driver Name -->
            <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                  @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                    <label class="form-label" for="form6Example1">FULL NAME</label>
                  </div>  
                </div>
              </div>
  
              <!-- Driver Email -->
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" >
                                  @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                    <label class="form-label" for="email">Email</label>
                  </div>
                </div>
              </div>
  
              <!-- Driver password -->
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                  @error('password')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                    <label class="form-label" for="password">Password</label>
                  </div>
                </div>
              </div>
  
               <!-- Driver confirm password -->
               <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required/>
                    <label class="form-label" for="password_confirmation">Confirm Password</label>
                  </div>
                </div>
              </div>

              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <input id="phone" type="text" class="form-control @error('contact_no') is-invalid @enderror" name="contact_no" value="{{ old('contact_no') }}" autocomplete="contact_no" 
                    oninput="this.value = this.value.replace(/[^0-9.]/g, '')"
                    minlength="11" 
                    maxlength="11" 
                    required 
                    placeholder="">
                    <label class="form-label" for="contact">CONTACT</label>
                    @error('contact_no')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <input id="license" type="text" class="form-control @error('license_number') is-invalid @enderror" name="license_number" value="{{ old('license_number') }}" autocomplete="license_number" 
                    minlength="11" 
                    maxlength="11"  
                    required 
                    placeholder="">
                    <label class="form-label" for="licenseNum">LICENSE NUMBER</label>
                    @error('license_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
              </div>
            
            <div class="row mb-4">
              <label class="form-label" for="vehicle_type"></label>
              <select type="text" id="vehicle_type" name="vehicle_type" class="dropdown-modal1" user required>
                <option value="" hidden>Vehicle Type</option>
                <option value="Motorcycle">Motorcycle</option>
                <option value="Van">Van</option>
                <option value="Truck">Truck</option>
              </select>
            </div>

            <div class="form-outline mb-4">
                <input type="text" id="plate_no" name="plate_no" class="form-control" {{-- value= "{{ $user->plate_no }}" --}}required />
                <label class="form-label" for="plate_no">Plate No.</label>
            </div>

                  
            <div class="button-modal-container">

                <div class="leftmodal-button-container">
                    <button type="reset" class="btn btn-outline-primary" data-mdb-dismiss="modal">
                        Reset
                    </button>
                </div>
    
                <div class="rightmodal-button-container">
    
                    <button type="submit" class="btn btn-primary" id="addModal2"data-mdb-dismiss="modal">
                        Save
                    </button>

                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                        Back
                    </button>
                </div>

          </form>
        </div>

    </div>
  </div>
</div>