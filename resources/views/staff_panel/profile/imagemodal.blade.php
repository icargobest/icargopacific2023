<link rel="stylesheet" href="{{ asset('css/modal.css') }}">

<div class="modal top fade" id="editimage" tabindex="-1" aria-labelledby="editimage" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editimage">EDIT PROFILE PICTURE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{route('staff.upload_photo', Auth::id())}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <input class="form-control" type="file" name="photo" id="photo">
                    </div>
                    <div class="buttonContainer">
                        <button type="submit" class="modalbutton">
                            UPLOAD
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
