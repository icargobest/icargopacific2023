<link rel="stylesheet" href="{{ asset('css/modal.css') }}">


<div class="modal top fade" id="personalinfo{{$dispatcher->id}}" tabindex="-1" aria-labelledby="personalinfo" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="personalinfo">EDIT INFORMATION</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

          
          <div class="modal-body">
          <form action="{{ route('dispatcher.personinfo.update',$dispatcher->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input id="name" type="text" class="form-control" value="{{ $dispatcher->user->name }}" name="name" required autocomplete="">
                  <label class="form-label" for="name">Name</label>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input id="password" type="text" class="form-control" value="{{ $dispatcher->contact_no }}" name="contact_no" 
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
                  <input id="password" type="text" class="form-control" value="{{ $dispatcher->tel }}" name="tel" 
                  oninput="this.value = this.value.replace(/[^0-9.]/g, '')"
                  minlength="7" 
                  maxlength="9" required autocomplete="">
                  <label class="form-label" for="mobile">Mobile number</label>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input id="password" type="email" class="form-control" value="{{ $dispatcher->user->email }}" name="email" required autocomplete="">
                  <label class="form-label" for="Tel">Email address</label>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input id="password" type="text" class="form-control" value="{{ $dispatcher->street }}" name="street" required autocomplete="">
                  <label class="form-label" for="Tel">Bldg. No / Street Name</label>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input id="password" type="text" class="form-control" value="{{  $dispatcher->city }}" name="city" required autocomplete="">
                  <label class="form-label" for="Tel">Province/City</label>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input id="password" type="text" class="form-control" value="{{  $dispatcher->postal_code }}" name="postal_code" required autocomplete="">
                  <label class="form-label" for="Tel">Zip Code</label>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input id="password" type="text" class="form-control" value="{{  $dispatcher->state }}" name="state" required autocomplete="">
                  <label class="form-label" for="Tel">State/Country</label>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input id="password" type="text" class="form-control" value="{{ $dispatcher->fb_account }}" name="fb_account" required autocomplete="">
                  <label class="form-label" for="email">Facebook Account</label>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input id="password" type="text" class="form-control" value="{{ $dispatcher->in_account }}" name="in_account" autocomplete="">
                  <label class="form-label" for="email">Linkedin Account</label>
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