<button
    type="button"
    class="btn btn-success btn-sm"
    data-mdb-toggle="modal"
    data-mdb-target="#editModalStaff{{$staff->id}}"
>
    EDIT
</button>

<div
    class="modal top fade"
    id="editModalStaff{{$staff->id}}"
    tabindex="-1"
    aria-labelledby="editModalStaff"
    aria-hidden="true"
    data-mdb-backdrop="static"
    data-mdb-keyboard="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header mbc2">
                <h5 class="modal-title">EDIT STAFF</h5>
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
                    action="{{route('update.staff', $staff->id)}}"
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
                    <div class="row">
                        <div class="col">
                            <div class="form-outline mb-4">
                                <input
                                    type="text"
                                    name="name"
                                    value="{{ $staff->user->name }}"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Staff Name"
                                    required
                                />
                                <label class="form-label" for="name"
                                    >Staff Name</label
                                >
                                @error('name')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-outline mb-4">
                                <input
                                    type="text"
                                    name="name"
                                    value="{{ $staff->user->email }}"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Staff email"
                                    required
                                />
                                <label class="form-label" for="email"
                                    >Staff Email</label
                                >
                                @error('email')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>   <div class="row mb-4">
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
                    <div class="form-outline mb-4">
                        <div class="col">
                            <div class="form-outline mb-4">
                                <input
                                    type="text"
                                    name="contact_no"
                                    value="{{ $staff->contact_no }}"
                                    class="form-control @error('contact_no') is-invalid @enderror"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '')"
                                    minlength="11"
                                    maxlength="11"
                                    placeholder="Contact Number:"
                                    required
                                />
                                <label class="form-label" for="name"
                                    >Contact No.</label
                                >

                                @error('contact_no')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-outline mb-4">
                        <input
                            type="tel"
                            name="tel"
                            value="{{ $staff->tel }}"
                            class="form-control @error('tel') is-invalid @enderror"
                            placeholder="Tel No"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '')"
                            minlength="7"
                            maxlength="9"
                        />
                        @error('tel')
                        <div class="alert alert-danger mt-1 mb-1">
                            {{ $message }}
                        </div>
                        @enderror
                        <label class="form-label" for="plate_no">Tel No.</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            name="street"
                            value="{{ $staff->street }}"
                            class="form-control @error('street') is-invalid @enderror"
                            placeholder="Street"
                        />
                        @error('street')
                        <div class="alert alert-danger mt-1 mb-1">
                            {{ $message }}
                        </div>
                        @enderror
                        <label class="form-label" for="street">Street</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            name="city"
                            value="{{ $staff->city }}"
                            class="form-control @error('city') is-invalid @enderror"
                            placeholder="City"
                        />
                        @error('city')
                        <div class="alert alert-danger mt-1 mb-1">
                            {{ $message }}
                        </div>
                        @enderror
                        <label class="form-label" for="plate_no">City</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            name="state"
                            value="{{ $staff->state }}"
                            class="form-control @error('state') is-invalid @enderror"
                            placeholder="State"
                        />
                        @error('state')
                        <div class="alert alert-danger mt-1 mb-1">
                            {{ $message }}
                        </div>
                        @enderror
                        <label class="form-label" for="plate_no">State</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            name="postal_code"
                            value="{{ $staff->postal_code }}"
                            class="form-control @error('postal_code') is-invalid @enderror"
                            placeholder="Postal No"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '')"
                            minlength="4"
                            maxlength="4"
                        />
                        @error('postal_code')
                        <div class="alert alert-danger mt-1 mb-1">
                            {{ $message }}
                        </div>
                        @enderror
                        <label class="form-label" for="plate_no"
                            >Postal Code</label
                        >
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input
                                    type="url"
                                    class="form-control @error('facebook') is-invalid @enderror"
                                    name="facebook"
                                    value="{{ $staff->facebook }}"
                                    id="faceb"
                                />
                                @error('facebook')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <label class="form-label" for="faceb"
                                    >Facebook</label
                                >
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input
                                    class="form-control @error('linkedin') is-invalid @enderror"
                                    name="linkedin"
                                    value="{{ $staff->linkedin }}"
                                    id="linkin"
                                />
                                @error('linkedin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <label class="form-label" for="linkin"
                                    >LinkedIn</label
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
                    <a href="{{ url('icargo/registered_users/send_otp', $staff->user->id)}}"
                        type="button"
                        class="btn btn-outline-primary btn-block"
                    >
                        Send One-Time Password (OTP)
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
