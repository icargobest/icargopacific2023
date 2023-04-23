
<button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
    Add Staff
</button>

<div class="modal top   fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Staff</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
    
      <div class="modal-divider"></div>

        <div class="modal-body">
          <form class="needs-validation" novalidate method="POST" action="{{route('staff.store')}}">
            @csrf

            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="form-outline mb-4">
              
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
                  <label class="form-label" for="form6Example1">FULL NAME</label>
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror 
             
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail Address">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
              <label class="form-label" for="form6Example5">EMAIL</label>
            </div>

            <!-- Contact input -->
            <div class="form-outline mb-4">
              <input id="contact" type="text" class="form-control @error('password') is-invalid @enderror" name="contact_no" value="{{ old('contact_no') }} autocomplete="contact_no" required placeholder="Contact no">
              <label class="form-label" for="form6Example5">Contact</label>
              @error('contact_no')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          
            <!-- Password -->
            <div class="form-outline mb-4">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
              <label class="form-label" for="form6Example3">PASSWORD</label>
              @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>    
              
            <!-- Confirm Password -->
            <div class="form-outline mb-4">
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Re-Type Password">
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

                    <a href="{{route('staff.index')}}">
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                        Back
                    </button>
                    </a>
                </div>
          </form>
        </div>
    </div>
  </div>
</div>
