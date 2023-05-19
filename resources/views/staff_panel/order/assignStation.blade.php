<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" style="background-color: #214D94;" data-mdb-toggle="modal" data-mdb-target="#assignDriverModal{{$ship->id}}">
    ASSIGN STATION
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="assignDriverModal{{$ship->id}}" tabindex="-1" role="dialog" aria-labelledby="assignDriverModalTitle" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title fw-bold mb-0" id="assignDriverModalTitle">ASSIGN STATION</h4>
          <button type="button" class="btn-close btn-close-white" data-mdb-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" hidden>&times;</span>
          </button>
        </div>
        <div class="modal-body pb-0 overflow-hidden">
          @foreach ($stations as $station)

            <a href="{{ route('station.assign',['shipment_id' => $ship->id, 'station_id' => $station->id]) }}">
              <button class="btn btn-block p-0 mx-0 mb-2 card flex-row" style="min-width: 385px;">
                <div class="card-body text-sm-start text-middle">
                    <h4 class="card-title mb-0 fw-bold"
                      style="color: #214D94;">{{$station->station_name}}
                    </h4>
                </div>
              </button>
            </a>
          @endforeach
          <hr class="opacity-50 mb-0">
        </div>
        <div class="modal-footer justify-content-sm-end">
          
          <button type="button" class="btn btn-primary" style="background-color: #214D94;" data-mdb-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>