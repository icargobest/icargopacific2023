<button type="button" class="btn btn-danger btn-sm" data-mdb-toggle="modal" data-mdb-target="#archiveModal{{$user->id}}">
    Archive
 </button>
 <div class="modal top fade" id="archiveModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Archive Data</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{route('drivers.archive', $user->id)}}">
            @csrf
            @method ('PUT')
            <h4>Are you sure you want to archive <strong>{{$user->name}}</strong>?</h4>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-mdb-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Archive</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>