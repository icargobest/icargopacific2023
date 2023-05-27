<link rel="stylesheet" href="{{ asset('css/modal.css') }}">


<div class="modal top fade" id="personalinfo{{$driver->id}}" tabindex="-1" aria-labelledby="personalinfo" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="personalinfo">EDIT INFORMATION</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

          
          <div class="modal-body">
          <form action="{{ route('driver.personinfo.update',$driver->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input id="name" type="text" class="form-control" value="{{ $driver->user->name }}" name="name" required autocomplete="">
                  <label class="form-label" for="name">Name</label>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input id="password" type="text" class="form-control" value="{{ $driver->contact_no }}" name="contact_no" 
                  oninput="this.value = this.value.replace(/[^0-9.]/g, '')"
                  minlength="11" 
                  maxlength="11" required autocomplete="">
                  <label class="form-label" for="mobile">Mobile number</label>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input id="password" type="text" class="form-control" value="{{ $driver->tel }}" name="tel" 
                  oninput="this.value = this.value.replace(/[^0-9.]/g, '')"
                  minlength="7" 
                  maxlength="9" autocomplete="">
                  <label class="form-label" for="mobile">Telephone number</label>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input id="password" type="email" class="form-control" value="{{ $driver->user->email }}" name="email" required autocomplete="">
                  <label class="form-label" for="Tel">Email address</label>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input id="password" type="text" class="form-control" value="{{ $driver->street }}" name="street" required autocomplete="">
                  <label class="form-label" for="Tel">Bldg. No / Street Name</label>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input id="password" type="text" class="form-control" value="{{  $driver->city }}" name="city" required autocomplete="">
                  <label class="form-label" for="Tel">Province/City</label>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input id="password" type="text" class="form-control" value="{{  $driver->postal_code }}" name="postal_code" required autocomplete="">
                  <label class="form-label" for="Tel">Postal Code</label>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input id="password" type="text" class="form-control" value="{{  $driver->state }}" name="state" required autocomplete="">
                  <label class="form-label" for="Tel">State/Country</label>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input id="password" type="text" class="form-control" value="{{ $driver->facebook }}" name="facebook" required autocomplete="">
                  <label class="form-label" for="email">Facebook Account</label>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input id="password" type="text" class="form-control" value="{{ $driver->linkedin }}" name="linkedin" autocomplete="">
                  <label class="form-label" for="email">Linkedin Account</label>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input id="password" type="text" class="form-control" value="{{ $driver->license_number }}" name="license_number" 
                  minlength="11" 
                  maxlength="11" required autocomplete="">
                  <label class="form-label" for="email">License Number</label>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input id="password" type="text" class="form-control" value="{{ $driver->plate_no }}" name="plate_no" required autocomplete="">
                  <label class="form-label" for="email">Plate Number</label>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                <label class="form-label" for="vehicle_type">Vehicle Type</label>
                  <select type="text" id="form6Example5" name="vehicle_type" 
                  style="width:100% !important; margin:auto;border:1px solid #ced4da; height:33.26px; border-radius:0.375rem;padding: 5.12px 12px; color:#828282;"required>
                    <option value="{{ $driver->vehicle_type }}" hidden>{{ $driver->vehicle_type }}</option>
                    <option value="Motorcycle">Motorcycle</option>
                    <option value="Van">Van</option>
                    <option value="Truck">Truck</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="buttonContainer">
              <button type="submit" class="modalbutton">
                SAVE
              </button>
            </div>
          </form>
          </div>
      </div>
    </div>
</div>