<!-- Archive Modal -->
<button
    type="button"
    class="btn btn-danger btn-sm"
    data-mdb-toggle="modal"
    data-mdb-target="#archiveModalDriver{{$driver->id}}"
>
    Archive
</button>

<div
    class="modal top fade"
    id="archiveModalDriver{{$driver->id}}"
    tabindex="-1"
    aria-labelledby="archiveModalDriver{{$driver->id}}"
    aria-hidden="true"
    data-mdb-backdrop="static"
    data-mdb-keyboard="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header mbc3">
                <h5 class="modal-title">ARCHIVE DRIVER</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-mdb-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <form
                    method="POST"
                    action="{{route('archive.driver', $driver->id)}}"
                >
                    @csrf @method('PUT')
                    <h4>
                        Are you sure you want to
                        <span class="span-red">archive</span> {{
                        $driver->user->name}}?
                    </h4>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger btn-block">
                            Archive
                        </button>
                        <a
                            class="btn btn-secondary btn-block"
                            data-mdb-dismiss="modal"
                        >
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
