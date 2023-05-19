<button
    type="button"
    class="btn btn-success btn-sm"
    data-mdb-toggle="modal"
    data-mdb-target="#editModalCompany{{$company->id}}"
>
    EDIT
</button>

<div
    class="modal top fade"
    id="editModalCompany{{$company->id}}"
    tabindex="-1"
    aria-labelledby="editModalCompany"
    aria-hidden="true"
    data-mdb-backdrop="static"
    data-mdb-keyboard="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header mbc2">
                <h5 class="modal-title">EDIT COMPANY</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-mdb-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <p class="small text-muted">
                    <span class="fw-bold">Caution:</span> Changing company
                    passwords without consent may violate privacy and compliance
                    regulations. Consider sending a password reset email link
                    instead.
                </p>
                <form
                    method="POST"
                    action="{{route('update.company', $company->id)}}"
                >
                    @csrf @method('PUT')
                    <div class="row mb-4">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-person-fill text-secondary"></i>
                            </span>
                            <input
                                id="name"
                                type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                name="name"
                                value="{{ $company->user->name }}"
                                required
                                autocomplete="name"
                                autofocus
                                placeholder="Name"
                            />

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
                                <i class="bi bi-lock-fill text-secondary"></i>
                            </span>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Password" >

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
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Re-Type Password">
                        </div>
                    </div>
                    
                    <div class="row mb-4">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i
                                    class="bi bi-envelope-fill text-secondary"
                                ></i>
                            </span>
                            <input
                                id="email"
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                name="email"
                                value="{{ $company->user->email}}"
                                required
                                autocomplete="email"
                                placeholder="E-mail Address"
                            />

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <hr />
                    {{-- contact number --}}

                    <!-- Contact input -->
                    <div class="row mb-4">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-person-fill text-secondary"></i>
                            </span>
                            <input
                                id="contact"
                                type="text"
                                class="form-control @error('contact_no') is-invalid @enderror"
                                name="contact_no"
                                value="{{ $company->contact_no }}"
                                autocomplete="contact_no"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '')"
                                minlength="11"
                                maxlength="11"
                                @required(true)
                                placeholder="Contact No"
                            />

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
                            <input id="contactnum" type="text"
                            class="form-control @error('contact_name')
                            is-invalid" @enderror" name="contact_name" value="{{
                            $company->contact_name }}" required
                            autocomplete="contact_name" autofocus
                            placeholder="Contact Name"> @error('contact_name')
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
                            <input id="contactnum" type="text"
                            class="form-control @error('company_address')
                            is-invalid" @enderror" name="company_address"
                            value="{{$company->company_address }}" required
                            autocomplete="company_address" autofocus
                            placeholder="Company Address">
                            @error('company_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{session()->get('message')}}
                        </div>  
                    @endif             
                    <a href="{{ url('icargo/registered_users/send_otp', $company->user->id)}}"
                        type="button"
                        class="btn btn-outline-primary btn-block"
                    >
                        Send password reset link
                    </a>
                    
                    <br><br>
                    <div class="row mb-4">
                        
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-lock-fill text-secondary"></i>
                            </span>
                            <input id="otp" type="number" class="form-control @error('otp') is-invalid @enderror" name="otp" autocomplete="new-otp" placeholder="Enter OTP" >

                            @error('otp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <hr />
                    <div class="modal-footer">
                        <button
                            type="submit"
                            class="btn btn-success btn-block"
                            id="addModal2"
                            data-mdb-dismiss="modal"
                        >
                            Save changes
                        </button>
                        <a
                            href="{{ route ('registered_users.view')}}"
                            class="btn btn-secondary btn-block"
                            data-mdb-dismiss="modal"
                        >
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
