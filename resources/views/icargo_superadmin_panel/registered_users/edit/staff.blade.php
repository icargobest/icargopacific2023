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
                    action="{{route('super-admin.update', $staff->id)}}"
                    enctype="multipart/form-data"
                >
                    @csrf @method('PUT')
                    
                    <div class="mb-3">
                        <input
                            class="form-control"
                            type="file"
                            name="photo"
                            id="photo"
                        />
                        <label class="form-label" for="name"
                            >Upload new profile image</label
                        >
                    </div>

                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" id="name"
                                name="name" @error('name')
                                is-invalid @enderror
                                value="{{$staff->user->name}}"
                                class="form-control" @required(true) />
                                <label class="form-label" for="name"
                                    >Staff Name</label
                                >
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="email" name="email"
                        @error('email') is-invalid @enderror
                        value="{{$staff->user->email}}" class="form-control"
                        @required(true)/>
                        <label class="form-label" for="email">Email Address</label>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
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

                   <!-- Contact input -->
                   <div class="form-outline mb-4">
                    <input type="text" id="contact_no" name="contact_no"
                    @error('contact_no') is-invalid @enderror
                    value="{{$staff->contact_no}}" class="form-control"
                    @required(true)/>
                    <label class="form-label" for="contact">Contact Number</label>
                    @error('contact_no')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $staff->tel }}"
                                autocomplete="tel"
                                name="tel"
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
                                type="text"
                                class="form-control"
                                value="{{ $staff->street }}"
                                name="street"
                                autocomplete="street"
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
                                type="text"
                                class="form-control"
                                value="{{ $staff->city }}"
                                name="city"
                                autocomplete="city"
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
                                type="text"
                                class="form-control"
                                value="{{ $staff->state }}"
                                name="state"
                                autocomplete="state"
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
                                type="text"
                                class="form-control"
                                name="postal_code"
                                value="{{ $staff->postal_code }}"
                                autocomplete="postal_code"
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
                                type="url"
                                class="form-control @error('facebook') is-invalid @enderror"
                                name="facebook"
                                value="{{ $staff->facebook }}"
                                id="faceb"
                                required
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
