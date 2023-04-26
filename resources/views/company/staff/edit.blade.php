
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
                    <input type="text" id="form6Example1" name="updateFullName" @error('updateFullName') is-invalid @enderror" value="{{$staff->user->name}}" class="form-control" @required(true) />
                  </div>
                  @error('updateFullName')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror 
                </div>
              </div>

              <!-- Email input -->
              <div class="label-container">
                <label>EMAIL</label>
              </div>
              <div class="form-outline mb-2">

                <input type="email" id="form6Example5" name="updateEmail" @error('updateEmail') is-invalid @enderror" value="{{$staff->user->email}}" class="form-control" @required(true)/>
                @error('updateEmail')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <!-- Contact input -->
              <div class="label-container">
                <label>Contact No_</label>
              </div>
              <div class="form-outline mb-2">
                <input type="text" id="form6Example5" name="updateContactNo" @error('updateContactNo') is-invalid @enderror value="{{$staff->contact_no}}" class="form-control" @required(true)/>
                @error('updateContactNo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>

              <div class="label-container">
                <label>PASSWORD</label>
              </div>
              <div class="form-outline mb-2">
                <input type="password" id="form6Example5" name="updatePassword" @error('updatePassword') is-invalid @enderror value="{{$staff->user->password}}" class="form-control" @required(true)/>
                @error('updatePassword')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>


              <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-block" id="addModal2" data-mdb-dismiss="modal">
                  Save changes
                </button>
                <a href="{{route('staff.index')}}" class="btn btn-secondary btn-block" data-mdb-dismiss="modal">
                  Cancel
                </a>
              </div>
                </div>
            </form>
          </div>

      </div>
    </div>
  </div>
</div>
