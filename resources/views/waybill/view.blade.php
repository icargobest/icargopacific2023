<button type="button" class="btn btn-dark btn-sm" data-mdb-toggle="modal" data-mdb-target="#showModal{{$ship->id}}">
    View
</button>


<div class="modal top fade modal-lg" id="showModal{{$ship->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">View</h5>
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
                    <label class="form-label" for="form6Example1">Freight Charges</label>
                    <input type="text" id="form6Example1" value="" class="form-control" />
                  </div>
                </div>
              </div>
            </fieldset>
              @if(Auth::user()->type == 'company')
                <form method="POST" action="{{route('addBid')}}">
                @csrf
                    <input type="hidden" name="company_id" value="{{Auth::user()->id}}" />
                    <input type="hidden" name="company_name" value="{{Auth::user()->name}}" />
                    <input type="hidden" name="shipment_id" value="{{$ship->id}}" />
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="number" id="form6Example1" name="bid_amount" placeholder="BID AMOUNT" class="form-control" />
                                <label class="form-label" for="form6Example1">BID AMOUNT</label>
                            </div>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-success btn-sm">Bid</button>
                        </div>
                    </div>
                </form>
              @elseif(Auth::user()->type == 'user')
                <table class="table table-striped">
                    <thead class="bg-light">
                        <tr>
                            <th>Company</th>
                            <th>Bid Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach($bids as $bid)
                        @if($ship->id == $bid->shipment_id)
                            <form action="{{route('acceptBid', $bid->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                                <input type="hidden" name="shipment_id" value="{{ $ship->id }}">
                                <tbody>
                                    <tr>
                                        <td>{{$bid->company_name}}</td>
                                        <td>{{$bid->bid_amount}}</td>
                                        <td>{{$bid->status}}</td>
                                        @if($bids->where('shipment_id', $bid->shipment_id)->contains('status', 'Accepted'))
                                            <td><button tpye="submit" class="btn btn-success btn-sm" disabled>Accept</button></td>
                                        @else
                                            <td><button tpye="submit" class="btn btn-success btn-sm">Accept</button></td>
                                        @endif
                                    </tr>
                                </tbody>
                            </form>
                        @endif
                    @endforeach
                </table>
              @endif
        </div>
      </div>
    </div>
  </div>
</div>
