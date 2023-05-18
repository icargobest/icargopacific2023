<div class="modal top fade" id="addDriversModal" tabindex="-1" aria-labelledby="addDriversModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addDriversModal">Add Driver</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    
      <div class="modal-divider"></div>

        <div class="modal-body">
          <form action="{{ route('driver.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-outline mb-4">
              <input class="form-control" type="file" id="formFile" name="image" required>
            </div>
            <!-- 2 column grid layout with text inputs for the first and last names -->
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
                    <label class="form-label" for="form6Example1">EMAIL</label>
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
                    <label class="form-label" for="form6Example1">PASSWORD</label>
                  </div>
                </div>
              </div>
  
               <!-- Driver confirm password -->
               <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <input type="password" id="form6Example1" name="password_confirmation" class="form-control" required/>
                    <label class="form-label" for="form6Example1">CONFIRM PASSWORD</label>
                  </div>
                </div>
              </div>
            


            <!-- Contact input -->
            <div class="form-outline mb-4">
              <div class="form-outline">
                  <input id="phone" type="text" class="form-control @error('contact_no') is-invalid @enderror" name="contact_no" value="{{ old('contact_no') }}" autocomplete="contact_no" 
                  oninput="this.value = this.value.replace(/[^0-9.]/g, '')"
                  minlength="11" 
                  maxlength="11" 
                  required 
                  placeholder="">
                  <label class="form-label" for="form6Example5">CONTACT</label>
                  @error('contact_no')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="form-outline mb-4">
              <div class="form-outline">
                  <input id="telephone" type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}" autocomplete="tel" 
                  oninput="this.value = this.value.replace(/[^0-9.]/g, '')"
                  minlength="7" 
                  maxlength="9" 
                  placeholder="">
                  <label class="form-label" for="form6Example5">TELEPHONE</label>
                  @error('tel')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <!-- Contact input -->
            <div class="form-outline mb-4">
              <div class="form-outline">
                  <input id="street" type="text" class="form-control @error('street') is-invalid @enderror" name="street" value="{{ old('street') }}" autocomplete="street" 
                  required 
                  placeholder="">
                  <label class="form-label" for="form6Example5">STREET</label>
                  @error('street')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <!-- Contact input -->
            <div class="form-outline mb-4">
              <div class="form-outline">
                  <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" autocomplete="city" 
                  required 
                  placeholder="">
                  <label class="form-label" for="form6Example5">CITY</label>
                  @error('city')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <!-- Contact input -->
            <div class="form-outline mb-4">
              <div class="form-outline">
                  <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}" autocomplete="state" 
                  required 
                  placeholder="">
                  <label class="form-label" for="form6Example5">STATE</label>
                  @error('state')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <!-- Contact input -->
            <div class="form-outline mb-4">
              <div class="form-outline">
                  <input id="postal_code" type="text" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code" value="{{ old('postal_code') }}" autocomplete="postal_code" 
                  oninput="this.value = this.value.replace(/[^0-9.]/g, '')"
                  minlength="4" 
                  maxlength="4" 
                  required 
                  placeholder="">
                  <label class="form-label" for="form6Example5">POSTAL CODE</label>
                  @error('postal_code')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <!-- License input -->
            <div class="form-outline mb-4">
              <div class="form-outline">
                  <input id="license" type="text" class="form-control @error('license_number') is-invalid @enderror" name="license_number" value="{{ old('license_number') }}" autocomplete="license_number" 
                  minlength="11" 
                  maxlength="11"  
                  required 
                  placeholder="">
                  <label class="form-label" for="form6Example5">LICENSE NUMBER</label>
                  @error('license_number')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="row mb-4">
              <label class="form-label" for="vehicle_type"></label>
              <select type="text" id="form6Example5" name="vehicle_type" style="width:95% !important; margin:auto;border:1px solid #ced4da; height:33.26px; border-radius:0.375rem;padding: 5.12px 12px; color:#828282;"required>
                <option value="" hidden>VEHICLE TYPE</option>
                <option value="Motorcycle">Motorcycle</option>
                <option value="Van">Van</option>
                <option value="Truck">Truck</option>
              </select>
            </div>

            <!-- Plate input -->
            <div class="form-outline mb-4">
              <div class="form-outline">
                  <input id="plate" type="text" class="form-control @error('plate_no') is-invalid @enderror" name="plate_no" value="{{ old('plate_no') }}" autocomplete="plate_no" 
                  minlength="6" 
                  maxlength="8"  
                  required 
                  placeholder="">
                  <label class="form-label" for="form6Example5">PLATE</label>
                  @error('plate_no')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
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