
<button type="button" class="btn btn-success btn-sm" data-mdb-toggle="modal" data-mdb-target="#editModal{{$employee->id}}">
   EDIT
</button>

<div class="modal top fade" id="editModal{{$employee->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title col-green" id="exampleModalLabel">EDIT EMPLOYEE</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{route('update', $employee->id)}}">
              @csrf
              @method('PUT')
              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row mb-2">
                <div class="col">
                  <div class="label-container">
                    <label>FULL NAME</label>
                  </div>
                  <div class="form-outline">
                    <input type="text" id="form6Example1" name="updateFullName" value="{{$employee->name}}" class="form-control" />
                  </div>
                </div>
              </div>

              <!-- Email input -->
              <div class="label-container">
                <label>EMAIL</label>
              </div>
              <div class="form-outline mb-2">

                <input type="email" id="form6Example5" name="updateEmail" value="{{$employee->email}}" class="form-control" />
              </div>

              <!-- Password input -->
              <div class="label-container">
                <label>PASSWORD</label>
              </div>
              <div class="form-outline mb-2">
                <input type="password" id="form6Example5" name="updatePassword" value="{{$employee->password}}" class="form-control" />
              </div>

              <!-- Position -->
              <div class="label-container">
                <label>POSITION</label>
              </div>
               <div class="form-outline mb-2">
                <input type="text" id="form6Example4" name="updateRole" value="{{$employee->role}}" class="form-control" />
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

                    <a href="{{route('EmployeePanel')}}"><button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                        CANCEL
                      </button>
                    </a>
                  </div>
              </div>

{{--                 <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-block" data-mdb-dismiss="modal">
                        Save
                      </button>
                    <a href="{{route('EmployeePanel')}}" class="btn btn-success btn-block">
                        Cancel
                    </a> --}}

                </div>
            </form>
          </div>

      </div>
    </div>
  </div>
</div>
