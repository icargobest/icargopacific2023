<button type="button" class="btn btn-success" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
    Add Dispatcher
</button>
<div class="modal top fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Dispatcher</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('dispatcher.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Dispatcher Name -->
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input type="text" id="form6Example1" name="name" class="form-control" required />
                  <label class="form-label" for="form6Example1">Dispatcher Name</label>
                </div>
              </div>
            </div>

            <!-- Dispatcher Email -->
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input type="text" id="form6Example1" name="email" class="form-control" required/>
                  <label class="form-label" for="form6Example1">Email</label>
                </div>
              </div>
            </div>

            <!-- Dispatcher password -->
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input type="password" id="form6Example1" name="password" class="form-control" required/>
                  <label class="form-label" for="form6Example1">Password</label>
                </div>
              </div>
            </div>

             <!-- Dispatcher confirm password -->
             <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input type="password" id="form6Example1" name="password_confirmation" class="form-control" required/>
                  <label class="form-label" for="form6Example1">Confirm Password</label>
                </div>
              </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-block">
                  Save
                </button>
                <button type="reset" class="btn btn-danger btn-block mb-4">
                  Clear
                </button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>