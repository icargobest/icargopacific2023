<!-- Modal -->
<div class="modal top   fade" id="addDispatcherModal" tabindex="-1" aria-labelledby="addDispatcherModal" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Dispatcher</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    
        <div class="modal-body">
            <form action="{{ route('dispatcher.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-outline mb-4">
                <div class="form-outline">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  <label class="form-label" for="name">DISPATCHER NAME</label>
              </div>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" >

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              <label class="form-label" for="email">EMAIL</label>
            </div>
          
            <!-- Password -->
            <div class="form-outline mb-4">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              <label class="form-label" for="password">PASSWORD</label>
            </div>    
              
            <!-- Confirm Password -->
            <div class="form-outline mb-4">
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required/>
              <label class="form-label" for="password_confirmation">CONFIRM PASSWORD</label>
            </div>
                    
            <div class="button-modal-container">

                <div class="leftmodal-button-container">
                    <button type="reset" class="btn btn-outline-primary" data-mdb-dismiss="modal">
                        Reset
                    </button>
                </div>
    
                <div class="rightmodal-button-container">
    
                    <button type="submit" class="btn btn-primary" id="addModal2"data-mdb-dismiss="modal">
                        Save
                    </button>

                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                        Back
                    </button>
                </div>

          </form>
        </div>

    </div>
  </div>
</div>