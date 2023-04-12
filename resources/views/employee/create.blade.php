<button type="button" class="btn btn-primary primary btn-block shadow-0" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
  Add
</button>

<div class="modal top fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
  <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{route('addEmployee')}}">
            @csrf
            <!-- Name Input -->
            <div class="row mb-4">
              <div class="col">
                <div class="form-outline">
                  <input type="text" id="form6Example1" name="FullName" class="form-control" />
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

            <!-- Position -->
             <div class="form-outline mb-4">
              <input type="text" id="form6Example4" name="role" class="form-control" />
              <label class="form-label" for="form6Example4">Position</label>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn primary btn-primary btn-block">
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
