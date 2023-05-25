<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" style="background-color: #214D94;" data-mdb-toggle="modal" data-mdb-target="#assignDriverModal{{$ship->id}}">
    ASSIGN DRIVER
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="assignDriverModal{{$ship->id}}" tabindex="-1" role="dialog" aria-labelledby="assignDriverModalTitle" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title fw-bold mb-0" id="assignDriverModalTitle">ASSIGN DRIVER</h4>
          <button type="button" class="btn-close btn-close-white" data-mdb-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" hidden>&times;</span>
          </button>
        </div>
        <div class="modal-body pb-0 overflow-hidden">
          <h5 class="h4-sm text-center text-sm-start" style="color:#F9CD1A;">AVAILABLE DRIVER</h5>
          @foreach ($drivers as $driver)
            @if ($driver->archived == 0 && $driver->company_id == $company_id_dispatcher && $driver->dispatcher_id == null)
            <a href="{{ route('dispatcher.assign',['shipment_id' => $ship->id, 'driver_id' => $driver->id]) }}">
              <button class="btn btn-block p-0 mx-0 mb-2 card flex-row" style="min-width: 385px;">
                <span class="d-none d-sm-block">
                  <img class="rounded-circle p-2"
                  style="max-width:60px;"
                  src="{{ asset('storage/images/driver/'.$driver->user_id.'/'.$driver->image) }}"/>
                  <span class="text-warning" style="font-size:25px;">●</span>
                </span>
                <div class="card-body text-sm-start text-middle">
                    <h4 class="card-title mb-0 fw-bold"
                      style="color: #214D94;">{{$driver->user->name}}
                    </h4>
                </div>
              </button>
            </a>
            @endif
          @endforeach
          <hr class="opacity-50 mb-0">
      </div>
      <div class="modal-footer justify-content-sm-end">
        <button type="button" class="btn btn-primary" style="background-color: #214D94;" data-mdb-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
