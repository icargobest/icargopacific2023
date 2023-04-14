
<button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
    Add Staff
</button>

<div class="modal top fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Staff</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{route('addEmployee')}}" enctype="multipart/form-data">
            @csrf
            <!-- Name Input -->
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input type="text" id="form6Example1" name="name" class="form-control" />
                  <label class="form-label" for="form6Example1">Name</label>
                </div>
              </div>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" id="form6Example5" name="email" class="form-control" />
              <label class="form-label" for="form6Example5">Email</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" id="form6Example5" name="password" class="form-control" />
              <label class="form-label" for="form6Example5">Password</label>
            </div>

            <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <input type="password" id="form6Example1" name="password_confirmation" class="form-control" />
                    <label class="form-label" for="form6Example1">Confirm Password</label>
                  </div>
                </div>
              </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-block">
                  Save
                </button>
                <a class="btn btn-secondary btn-block" data-mdb-dismiss="modal">
                  Back
                </a>
              </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>
