
<button type="button" class="btn btn-success btn-sm" data-mdb-toggle="modal" data-mdb-target="#editModal{{$staff->id}}">
   EDIT
</button>

<div class="modal top fade" id="editModal{{$staff->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title col-green" id="exampleModalLabel">EDIT STAFF</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{route('staff.update', $staff->id)}}">
              @csrf
              @method('PUT')
              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row mb-2">
                <div class="col">
                  <div class="label-container">
                    <label>FULL NAME</label>
                  </div>
                  <div class="form-outline">
                    <input type="text" id="form6Example1" name="updateFullName" value="{{$staff->name}}" class="form-control" />
                  </div>
                </div>
              </div>

              <!-- Email input -->
              <div class="label-container">
                <label>EMAIL</label>
              </div>
              <div class="form-outline mb-2">

                <input type="email" id="form6Example5" name="updateEmail" value="{{$staff->user->email}}" class="form-control" />
              </div>

              <!-- Contact input -->
              <div class="label-container">
                <label>Contact No_</label>
              </div>
              <div class="form-outline mb-2">
                <input type="text" id="form6Example5" name="updateContactNo" value="{{$staff->contact_no}}" class="form-control" />
              </div>

              <div class="label-container">
                <label>PASSWORD</label>
              </div>
              <div class="form-outline mb-2">
                <input type="password" id="form6Example5" name="updatePassword" value="{{$staff->user->password}}" class="form-control" />
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

                    <a href="{{route('staff.view')}}"><button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                        CANCEL
                      </button>
                    </a>
                  </div>
              </div>
                </div>
            </form>
          </div>

      </div>
    </div>
  </div>
</div>
