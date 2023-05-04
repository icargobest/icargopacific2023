
<button type="button" class="btn btn-warning btn-sm" data-mdb-toggle="modal" data-mdb-target="#showModal{{$company->id}}">
    SHOW
 </button>

 <div class="modal top fade" id="showModal{{$company->id}}" tabindex="-1" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
     <div class="modal-dialog ">
       <div class="modal-content">
         <div class="modal-header mbc1">
           <h5 class="modal-title">VIEW Company</h5>
           <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <fieldset disabled>
              <div class="row mb-4">
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-person-fill text-secondary"></i>
                    </span>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $company->user->name }}" required autocomplete="name" autofocus placeholder="Name">

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
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $company->user->email}}" required autocomplete="email" placeholder="E-mail Address">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
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
                    value="{{ $company->contact_no }}" 
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
                    <input id="contactnum" type="text" class="form-control @error('contact_name') is-invalid" @enderror" name="contact_name" value="{{ $company->contact_name }}" required autocomplete="contact_name" autofocus placeholder="Contact Name">

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
                    <input id="contactnum" type="text" class="form-control @error('company_address') is-invalid" @enderror" name="company_address" value="{{$company->company_address  }}" required autocomplete="company_address" autofocus placeholder="Company Address">

                    @error('company_address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            </fieldset>
                 <div class="modal-footer">
                    <a class="btn btn-secondary btn-block" data-mdb-dismiss="modal">
                        Back
                    </a>
                 </div>
         </div>
       </div>
     </div>
   </div>
 </div>