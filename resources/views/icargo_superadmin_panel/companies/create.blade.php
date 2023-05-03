<button type="button" class="btn btn-primary m-button1" style="" data-bs-toggle="modal" data-bs-target="#addCompanyModal">Add Company</button>


<!-- Modal -->
<div class="modal top fade" id="addCompanyModal" aria-labelledby="addCompanyModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Company</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('companies.store') }}">
            @csrf
            @include('flash-message')
            <div class="row mb-4">
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-person-fill text-secondary"></i>
                    </span>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-4">
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-envelope-fill text-secondary"></i>
                    </span>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail Address">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-4">
            
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-lock-fill text-secondary"></i>
                    </span>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-4">
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-lock-fill text-secondary"></i>
                    </span>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Re-Type Password">
                </div>
            </div>

            <hr>
            {{-- contact number --}}

             <!-- Contact input -->
             <div class="row mb-4">
                <div class="input-group">
                     <span class="input-group-text">
                        <i class="bi bi-person-fill text-secondary"></i>
                    </span>
                    <input id="contact" 
                    type="text" 
                    class="form-control @error('contact_no') is-invalid @enderror" name="contact_no" 
                    value="{{ old('contact_no') }}" 
                    autocomplete="contact_no"
                    oninput="this.value = this.value.replace(/[^0-9.]/g, '')"
                    minlength="11" 
                    maxlength="11"
                    @required(true)
                    placeholder="Contact No">

                    @error('contact_no')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            {{-- contact name --}}
            <div class="row mb-4">
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-person-fill text-secondary"></i>
                    </span>
                    <input id="contactnum" type="text" class="form-control @error('contact_name') is-invalid" @enderror" name="contact_name" value="{{ old('contact_name') }}" required autocomplete="contact_name" autofocus placeholder="Contact Name">

                    @error('contact_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- contact address--}}
            <div class="row mb-4">
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-person-fill text-secondary"></i>
                    </span>
                    <input id="contactnum" type="text" class="form-control @error('company_address') is-invalid" @enderror" name="company_address" value="{{ old('company_address') }}" required autocomplete="company_address" autofocus placeholder="Company Address">

                    @error('company_address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
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
