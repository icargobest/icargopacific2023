<button type="button" class="btn btn-success btn-sm" data-mdb-toggle="modal" data-mdb-target="#editModal{{ $user->id }}">
    Edit
 </button>
<div class="modal fade" id="editModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Driver Information</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('drivers.update',$user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Driver Name:</strong>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control"
                            placeholder="Driver name">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Vehicle Type:</strong>
                            <select type="text" name="vehicle_type">
                                <option value="{{ $user->driverDetail->vehicle_type }}" hidden>{{ $user->driverDetail->vehicle_type }}</option>
                                <option value="Motorcycle">Motorcycle</option>
                                <option value="Van">Van</option>
                                <option value="Truck">Truck</option>
                              </select>
                        @error('vehicle_type')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Plate Number:</strong>
                        <input type="text" name="plate_no" value="{{ $user->driverDetail->plate_no }}" class="form-control"
                            placeholder="Plate No">
                        @error('plate_no')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-block" data-mdb-dismiss="modal">
                        Save
                      </button>
                    <a href="{{route('drivers.index')}}" class="btn btn-success btn-block">
                        Cancel
                    </a>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>