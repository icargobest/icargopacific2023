<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#assignDriverModal{{$ship->id}}">
    ASSIGN DRIVER
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="assignDriverModal{{$ship->id}}" tabindex="-1" role="dialog" aria-labelledby="assignDriverModalTitle" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="assignDriverModalTitle">ASSIGN DRIVER</h5>
          <button type="button" class="close" data-mdb-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <h5>Available Drivers</h5>
            <ul>
                @foreach ($drivers as $driver)
                    @if ($driver->archived == 0 && $driver->company_id == $company_id_dispatcher)
                        <li>
                            <a href="{{ route('dispatcher.assign',['shipment_id' => $ship->id, 'driver_id' => $driver->id]) }}" style="margin: 10px 0" class="card">
                                <span><img src="https://locator.apa.org/resource/1668705141000/PsycLocator/img/profile-default.png" alt="Profile" height="50" width="50"><span style="color: green">●</span>
                                <span>{{$driver->user->name}}</span>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>