<link rel="stylesheet" href="{{ asset('css/modal.css') }}">

<div class="modal top fade" id="address" tabindex="-1" aria-labelledby="address" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="address">EDIT ADDRESS</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-divider"></div>
          
          <div class="modal-body">
            
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input id="password" type="text" class="form-control" name="password" required autocomplete="new-password">
                  <label class="form-label" for="sname">Street name</label>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input id="password" type="text" class="form-control" name="password" required autocomplete="new-password">
                  <label class="form-label" for="city">City</label>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input id="password" type="text" class="form-control" name="password" required autocomplete="new-password">
                  <label class="form-label" for="state">State/Country</label>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input id="password" type="text" class="form-control" name="password" required autocomplete="new-password">
                  <label class="form-label" for="postal">Postal Code</label>
                </div>
              </div>
            </div>
            <div class="buttonContainer">
              <button type="submit" class="modalbutton">
                SAVE
              </button>
            </div>

          </div>
      </div>
    </div>
</div>