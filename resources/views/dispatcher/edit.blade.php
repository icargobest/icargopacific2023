
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
        <form action="{{ route('dispatcher.update',$user->id) }}" method="POST" enctype="multipart/form-data">
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
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>