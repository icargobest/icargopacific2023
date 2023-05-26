<!-- Archive Modal -->
<button type="button" class="btn btn-success btn-sm" data-mdb-toggle="modal" data-mdb-target="#restoreModal{{$staff->id}}">
    Restore
 </button>

 <div class="modal top fade" id="restoreModal{{$staff->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header mbc2">
          <h5 class="modal-title" id="exampleModalLabel">Restore Data</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{route('staff.unarchive', $staff->id)}}">
            @csrf
            @method ('PUT')
            <h4>Are you sure you want to <span class="span-green">restore </span>{{ $staff->user->name}}?</h4>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-block">
                  Restore
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
