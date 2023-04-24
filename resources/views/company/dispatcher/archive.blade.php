<!-- Archive Modal -->
<button type="button" class="btn btn-danger btn-sm" data-mdb-toggle="modal" data-mdb-target="#archiveModal{{$user->id}}">
  Archive
</button>

<div class="modal top fade" id="archiveModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title col-red" id="exampleModalLabel">Archive Dispatcher</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('dispatcher.archive', $user->id)}}">
          @csrf
          @method ('PUT')
          <h4>Are you sure you want to <span class="col-red" style="font-weight:bold">archived</span> this dispatcher{{-- ?{{$user->name}} --}}</h4>
          <div class="modal-footer">
              <button type="submit" class="btn btn-danger btn-block">
                Archive
              </button>
              <a class="btn btn-secondary btn-block" data-mdb-dismiss="modal">
                Cancel
              </a>
            </div>
        </form>
      </div>

    </div>
  </div>
</div>
</div>
