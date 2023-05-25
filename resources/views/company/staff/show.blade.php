<button
    type="button"
    class="btn btn-warning btn-sm"
    data-mdb-toggle="modal"
    data-mdb-target="#showModal{{$staff->id}}"
>
    SHOW
</button>

<div
    class="modal top fade"
    id="showModal{{$staff->id}}"
    tabindex="-1"
    aria-hidden="true"
    data-mdb-backdrop="static"
    data-mdb-keyboard="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header mbc1">
                <h5 class="modal-title">VIEW STAFF</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-mdb-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <fieldset disabled>
                    <img
                        src="@if ($staff->photo != null) {{ asset('storage/' . $staff->photo) }} @else /img/default_dp.png @endif"
                        alt="Profile Image" style="width:250px"
                    />
                    <div class="row">
                        <div class="col">
                            <div class="form-outline mb-4">
                                <input
                                    type="text"
                                    id="updateFullName"
                                    name="updateFullName"
                                    value="{{$staff->id}}"
                                    class="form-control"
                                />
                                <label class="form-label" for="id"
                                    >Staff ID</label
                                >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-outline mb-4">
                                <input
                                    type="text"
                                    id="updateFullName"
                                    name="updateFullName"
                                    value="{{$staff->user->name}}"
                                    class="form-control"
                                />
                                <label class="form-label" for="id"
                                    >Full Name</label
                                >
                            </div>
                        </div>
                    </div>

                    <!-- Email input -->

                    <div class="form-outline mb-4">
                        <input
                            type="email"
                            id="updateEmail"
                            name="updateEmail"
                            value="{{$staff->user->email}}"
                            class="form-control"
                        />
                        <label class="form-label" for="id">Email</label>
                    </div>

                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input
                                    class="form-control"
                                    value="{{$staff->contact_no}}"
                                    autocomplete="mobile"
                                    name="mobile"
                                />
                                <label class="form-label" for="mobile"
                                    >Contact Number</label
                                >
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input
                                    class="form-control"
                                    value="{{$staff->tel ?? '-'}}"
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
                                    value="{{ $staff->street ?? '-' }} "
                                    name="street"
                                    autocomplete="street"
                                    required
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
                                    value="{{ $staff->city ?? '-' }}"
                                    name="city"
                                    autocomplete="city"
                                    required
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
                                    value="{{ $staff->state ?? '-' }}"
                                    name="state"
                                    autocomplete="state"
                                    required
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
                                    value="{{ $staff->postal_code ?? '-' }}"
                                    autocomplete="postal_code"
                                    required
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
                                    value="{{ $staff->facebook ?? '-' }}"
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
                                    type="url"
                                    class="form-control @error('linkedin') is-invalid @enderror"
                                    name="linkedin"
                                    value="{{ $staff->linkedin ?? '-' }}"
                                    id="linkin"
                                />
                                <label class="form-label" for="linkin"
                                    >LinkedIn</label
                                >
                            </div>
                        </div>
                    </div>

                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            id="updateStaff"
                            name="updateStaff"
                            value="{{date('M d, Y h:i:s A', strtotime($staff->user->created_at))}}"
                            class="form-control"
                        />
                        <label class="form-label" for="created_at"
                            >Created At</label
                        >
                    </div>

                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            id="updateStaffAt"
                            name="updateStaffAt"
                            value="{{date('M d, Y h:i:s A', strtotime($staff->user->updated_at))}}"
                            class="form-control"
                        />
                        <label class="form-label" for="updated_at"
                            >Updated At</label
                        >
                    </div>
                </fieldset>
                <div class="modal-footer">
                    <a
                        class="btn btn-secondary btn-block"
                        data-mdb-dismiss="modal"
                    >
                        Back
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>