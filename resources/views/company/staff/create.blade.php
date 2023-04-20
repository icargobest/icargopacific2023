
<button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
    Add Staff
</button>

<div class="modal top   fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Staff</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    
      <div class="modal-divider"></div>

        <div class="modal-body">
          <form method="POST" action="{{route('staff.store')}}">
            @csrf

            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="form-outline mb-4">
                <div class="form-outline">
                  <input type="text" id="form6Example1" name="name" class="form-control" />
                  <label class="form-label" for="form6Example1">FULL NAME</label>
              </div>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" id="form6Example5"  name="email" class="form-control" />
              <label class="form-label" for="form6Example5">EMAIL</label>
            </div>

            <!-- Contact input -->
            <div class="form-outline mb-4">
              <input type="text" id="form6Example5"  name="contact_no" class="form-control" />
              <label class="form-label" for="form6Example5">Contact</label>
            </div>
          
            <!-- Password -->
            <div class="form-outline mb-4">
              <input type="text" id="form6Example3" name="password" class="form-control" />
              <label class="form-label" for="form6Example3">PASSWORD</label>
            </div>    
              
            <!-- Confirm Password -->
            <div class="form-outline mb-4">
              <input type="text" id="form6Example4" name="password_confirmation" class="form-control" />
              <label class="form-label" for="form6Example4">CONFIRM PASSWORD</label>
            </div>
                    
          
            <!-- Message input -->
            {{-- <div class="form-outline mb-4">
              <textarea class="form-control" id="form6Example7" rows="4"></textarea>
              <label class="form-label" for="form6Example7">Additional information</label>
            </div> --}}


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
