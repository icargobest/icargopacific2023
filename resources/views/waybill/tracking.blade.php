<button type="button" class="btn btn-dark btn-sm" data-mdb-toggle="modal" data-mdb-target="#showModal{{$ship->id}}">
    Tracking
</button>


<div class="modal top fade modal-l" id="showModal{{$ship->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Track</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           <fieldset disabled>
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="form6Example1" value="{{$ship->id}}" class="form-control" />
                    <label class="form-label" for="form6Example1">ID</label>
                  </div>
                </div>
              </div>
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="form6Example1" value="{{$ship->sender_name}}, {{$ship->sender_address}}" class="form-control" />
                    <label class="form-label" for="form6Example1">Pick up</label>
                  </div>
                </div>
              </div>
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="form6Example1" value="{{$ship->recipient_name}}, {{$ship->recipient_address}}" class="form-control" />
                    <label class="form-label" for="form6Example1">Drop off</label>
                  </div>
                </div>
              </div>
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="form6Example1" value="{{$ship->length}}x{{$ship->width}}x{{$ship->height}} | {{$ship->weight}}Kg" class="form-control" />
                    <label class="form-label" for="form6Example1">Parcel Details</label>
                  </div>
                </div>
              </div>
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="form6Example1" value="" class="form-control" />
                    <label class="form-label" for="form6Example1">Parcel Item</label>
                  </div>
                </div>
              </div>
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="form6Example1" value="" class="form-control" />
                    <label class="form-label" for="form6Example1">Freight Charges</label>
                  </div>
                </div>
              </div>
            </fieldset>
              @if(Auth::user()->type == 'user')
                <table class="table table-striped">
                    <thead class="bg-light">
                        <tr>
                            <th>Company</th>
                            <th>Bid Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                        </tr>
                    </tbody>
              @endif
        </div>
      </div>
    </div>
  </div>
</div>
