<button
    type="button"
    class="btn btn-success btn-sm"
    data-mdb-toggle="modal"
    data-mdb-target="#editModal{{$staff->id}}"
>
    EDIT
</button>

<div
    class="modal top fade"
    id="editModal{{$staff->id}}"
    tabindex="-1"
    aria-labelledby="editModal"
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
                <form
                    method="POST"
                    action="{{route('staff.update', $staff->id)}}"
                    enctype="multipart/form-data"
                    autocomplete="off"
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
                                <input type="text" id="updateFullName"
                                name="updateFullName" 
                                value="{{$staff->user->name}}"
                                class="form-control @error('updateFullName')
                                is-invalid @enderror"
                                 @required(true) />
                                <label class="form-label" for="name"
                                    >Staff Name</label
                                >
                                @error('updateFullName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="updateEmail" name="updateEmail"
                        @error('updateEmail') is-invalid @enderror"
                        value="{{$staff->user->email}}" class="form-control"
                        @required(true)/>
                        <label class="form-label" for="email">Email</label>
                        @error('updateEmail')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
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
                            href="{{route('staff.index')}}"
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