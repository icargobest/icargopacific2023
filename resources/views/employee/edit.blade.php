
<button type="button" class="btn btn-success btn-sm" data-mdb-toggle="modal" data-mdb-target="#editModal{{$employee->id}}">
   Edit
</button>

<div class="modal top fade" id="editModal{{$employee->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{route('update', $employee->id)}}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="form6Example1" name="updateFullName" value="{{$employee->name}}" class="form-control" />
                  </div>
                </div>
              </div>

              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" id="form6Example5" name="updateEmail" value="{{$employee->email}}" class="form-control" />
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" id="form6Example5" name="updatePassword" value="{{$employee->password}}" class="form-control" />
              </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-block" data-mdb-dismiss="modal">
                        Save
                      </button>
                    <a href="{{route('EmployeePanel')}}" class="btn btn-success btn-block">
                        Cancel
                    </a>
                </div>
            </form>
          </div>

      </div>
    </div>
  </div>
</div>
