<link rel="stylesheet" href="{{ asset('css/modal.css') }}">

<div class="modal top fade" id="social" tabindex="-1" aria-labelledby="social" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="social">EDIT SOCIALS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{route('edit_social', Auth::id())}}">
                @csrf
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" class="form-control" name="facebook">
                                <label class="form-label" for="faceb">Facebook</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" class="form-control" name="twitter">
                                <label class="form-label" for="twit">Twitter</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" class="form-control" name="linkedin">
                                <label class="form-label" for="linkin">LinkedIn</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" class="form-control" name="instagram">
                                <label class="form-label" for="inta">Instagram</label>
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
