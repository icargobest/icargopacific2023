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
                    enctype="multipart/form-data"
                >
                    @csrf @method('PUT')
                    <div class="mb-3">
                        <input
                            class="form-control"
                            type="file"
                            name="image"
                            id="photo"
                        />
                        <label class="form-label" for="name"
                            >Upload new profile image</label
                        >
                    </div>
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
                    <div class="row mb-4">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-lock-fill text-secondary"></i>
                            </span>
                            <input
                                id="password"
                                type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password"
                                autocomplete="new-password"
                                placeholder="Password"
                            />

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
                            <input
                                id="password-confirm"
                                type="password"
                                class="form-control"
                                name="password_confirmation"
                                autocomplete="new-password"
                                placeholder="Re-Type Password"
                            />
                        </div>
                    </div>

                    <hr />

                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input
                                    id=""
                                    type="text"
                                    class="form-control"
                                    name="contact_no"
                                    required
                                    autocomplete="contact_no"
                                    value="{{$company->contact_no}}"
                                />
                                <label class="form-label" for="mobile"
                                    >Contact number</label
                                >
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input
                                    id=""
                                    type="text"
                                    class="form-control"
                                    name="contact_name"
                                    required
                                    autocomplete="contact_name"
                                    value="{{$company->contact_name}}"
                                />
                                <label class="form-label" for="mobile"
                                    >Contact Name</label
                                >
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input
                                    id=""
                                    type="text"
                                    class="form-control"
                                    name="tel"
                                    required
                                    autocomplete="tel"
                                    value="{{$company->tel}}"
                                />
                                <label class="form-label" for="Tel"
                                    >Telephone</label
                                >
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input
                                    id=""
                                    type="text"
                                    class="form-control"
                                    name="street"
                                    required
                                    autocomplete="street"
                                    value="{{$company->street}}"
                                />
                                <label class="form-label" for="sname"
                                    >Street name</label
                                >
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input
                                    id=""
                                    type="text"
                                    class="form-control"
                                    name="city"
                                    required
                                    autocomplete="city"
                                    value="{{$company->city}}"
                                />
                                <label class="form-label" for="city"
                                    >City</label
                                >
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input
                                    id=""
                                    type="text"
                                    class="form-control"
                                    name="state"
                                    required
                                    autocomplete="state"
                                    value="{{$company->state}}"
                                />
                                <label class="form-label" for="state"
                                    >State/Country</label
                                >
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input
                                    id=""
                                    type="text"
                                    class="form-control"
                                    name="postal_code"
                                    required
                                    autocomplete="postal_code"
                                    value="{{$company->postal_code}}"
                                />
                                <label class="form-label" for="postal"
                                    >Postal Code</label
                                >
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input
                                    id=""
                                    type="text"
                                    class="form-control @error('website') is-invalid @enderror"
                                    name="website"
                                    autocomplete="website"
                                    value="{{$company->website}}"
                                />

                                @error('website')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <label class="form-label" for="postal"
                                    >Website Link</label
                                >
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input
                                    id="facebook"
                                    type="text"
                                    class="form-control @error('facebook') is-invalid @enderror"
                                    name="facebook"
                                    value="{{$company->facebook}}"
                                    required
                                    autocomplete="facebook"
                                    autofocus
                                    placeholder="Facebook Link"
                                />

                                @error('facebook')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <label class="form-label" for="postal"
                                    >Facebook Link</label
                                >
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input
                                    id="linkedin"
                                    type="text"
                                    class="form-control @error('linkedin') is-invalid @enderror"
                                    name="linkedin"
                                    autocomplete="linkedin"
                                    value="{{$company->linkedin}}"
                                />
                                @error('linkedin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <label class="form-label" for="postal"
                                    >Linkedin Link</label
                                >
                            </div>
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
