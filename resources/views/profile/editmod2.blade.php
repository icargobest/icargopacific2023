<link rel="stylesheet" href="{{ asset('css/modal.css') }}">

<div class="modal top fade" id="address" tabindex="-1" aria-labelledby="address" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="address">EDIT ADDRESS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route('edit_address', Auth::id()) }}">
                @csrf
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" class="form-control" name="street" required>
                                <label class="form-label" for="sname">Street name</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" class="form-control" name="city" required>
                                <label class="form-label" for="city">City</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" class="form-control" name="state" required>
                                <label class="form-label" for="state">State/Country</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" class="form-control" name="postal_code" required>
                                <label class="form-label" for="postal">Postal Code</label>
                            </div>
                        </div>
                    </div>
                    <div class="buttonContainer">
                        <button type="submit" class="modalbutton">
                            SAVE
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
