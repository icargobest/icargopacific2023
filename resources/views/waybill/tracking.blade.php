<button type="button" class="btn btn-dark btn-sm" data-mdb-toggle="modal" data-mdb-target="#trackModal{{$ship->id}}">
    Tracking
</button>


<div class="modal top fade modal-lg" id="trackModal{{$ship->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Order Track</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           <fieldset disabled>
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label" for="form6Example1">ID</label>
                    <input type="text" id="form6Example1" value="{{$ship->id}}" class="form-control" />
                  </div>
                </div>
              </div>
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label" for="form6Example1">Pick up</label>
                    <input type="text" id="form6Example1" value="{{$ship->sender_name}}, {{$ship->sender_address}}" class="form-control" />
                  </div>
                </div>
              </div>
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label" for="form6Example1">Drop off</label>
                    <input type="text" id="form6Example1" value="{{$ship->recipient_name}}, {{$ship->recipient_address}}" class="form-control" />
                  </div>
                </div>
              </div>
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label" for="form6Example1">Parcel Details</label>
                    <input type="text" id="form6Example1" value="{{$ship->length}}x{{$ship->width}}x{{$ship->height}} | {{$ship->weight}}Kg" class="form-control" />
                  </div>
                </div>
              </div>
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label" for="form6Example1">Parcel Item</label>
                    <input type="text" id="form6Example1" value="" class="form-control" />
                  </div>
                </div>
              </div>
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label" for="form6Example1">Bid amount:</label>
                    <input type="text" id="form6Example1" value="{{$ship->bid_amount}}" class="form-control" />
                  </div>
                </div>
              </div>
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <label class="form-label" for="form6Example1">Company</label>
                    <input type="text" id="form6Example1" value="{{$ship->company_bade}}" class="form-control" />
                  </div>
                </div>
              </div>
            </fieldset>
        </div>
      </div>
    </div>
  </div>
</div>
