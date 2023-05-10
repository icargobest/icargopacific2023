<!-- Archive Modal -->
<button type="button" class="btn btn-danger btn-block shadow-0 my-1" style="min-width:140px; max-width:509px;"
    data-mdb-toggle="modal" data-mdb-target="#cancelModal{{ $ship->id }}">
    Cancel
</button>

<div class="modal top fade" id="cancelModal{{ $ship->id }}" tabindex="-1" aria-labelledby="cancelModal"
    aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header mbc3">
                <h5 class="modal-title">CANCEL ORDER</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('cancelOrder', $ship->id) }}">
                    @csrf
                    @method ('PUT')
                    <h4>Are you sure you want to <span class="span-red">Cancel</span> this order?</h4>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger btn-block">
                            Yes
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
