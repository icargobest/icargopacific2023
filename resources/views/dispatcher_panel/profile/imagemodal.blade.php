<link rel="stylesheet" href="{{ asset('css/modal.css') }}">

<div class="modal top fade" id="editimage{{$dispatcher->id}}" tabindex="-1" aria-labelledby="editimage" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editimage">CHANGE PROFILE PICTURE</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

          
          <div class="modal-body">
            <form action="{{ route('dispatcher.profile.update',$dispatcher->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <input class="form-control" type="file" id="formFile" name="image" required>
            </div>
            <div class="buttonContainer">
              <button type="submit" class="modalbutton">
                UPLOAD
              </button>
            </div>
            </form>
          </div>
      </div>
    </div>
</div>