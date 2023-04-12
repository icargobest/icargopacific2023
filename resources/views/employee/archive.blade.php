<!-- Archive Modal -->
<button type="button" class="btn btn-danger btn-sm" data-mdb-toggle="modal" data-mdb-target="#archiveModal{{$employee->id}}">
    Archive
 </button>

 <div class="modal top fade" id="archiveModal{{$employee->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Archive Data</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{route('archive', $employee->id)}}">
            @csrf
            @method ('PUT')
            <h4>Are you sure you want to archive this employee?</h4>
            <div class="modal-footer">
                <button type="submit" class="btn primary btn-primary btn-block">
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
