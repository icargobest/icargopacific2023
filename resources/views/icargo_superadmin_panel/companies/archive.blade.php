<!-- Archive Modal -->
<button
    type="button"
    class="btn btn-danger btn-sm"
    data-mdb-toggle="modal"
    data-mdb-target="#archiveModal{{$company->id}}"
>
    Archive
</button>

<div
    class="modal top fade"
    id="archiveModal{{$company->id}}"
    tabindex="-1"
    aria-labelledby="archiveModal{{$company->id}}"
    aria-hidden="true"
    data-mdb-backdrop="static"
    data-mdb-keyboard="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header mbc3">
                <h5 class="modal-title">ARCHIVE COMPANY</h5>
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
                    action="{{route('companies.archive', $company->id)}}"
                >
                    @csrf @method ('PUT')
                    <h4>
                        Are you sure you want to
                        <span class="span-red">archived</span>
                        {{$company->user->name}}?
                    </h4>
                    <p>
                        <span class="fw-bold">Caution: </span>Archiving
                        company's account will also archived its employee
                        accounts.
                    </p>
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
