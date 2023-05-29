<button
    type="button"
    class="btn btn-success btn-sm"
    data-mdb-toggle="modal"
    data-mdb-target="#editModalDriver{{$driver->id}}"
>
    EDIT
</button>

<div
    class="modal top fade"
    id="editModalDriver{{$driver->id}}"
    tabindex="-1"
    aria-labelledby="editModalDriver"
    aria-hidden="true"
    data-mdb-backdrop="static"
    data-mdb-keyboard="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header mbc2">
                <h5 class="modal-title" id="exampleModalLabel">
                    Edit Information
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-mdb-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                @if(session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
                @endif
                <p class="small text-muted">
                    <span class="fw-bold">Caution:</span> Changing company's
                    employee information without consent may violate privacy and compliance
                    regulations. Consider sending an OTP instead to modify their data.
                </p>
                <form
                    action="{{ route('update.driver',$driver->id) }}"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf @method('PUT')

                    <div class="form-outline mb-4">
                        <img
                            src="@if ($driver->image != null) {{ asset('storage/images/driver/'.$driver->user_id.'/'.$driver->image) }} @else /img/default_dp.png @endif"
                            style="width: 30px"
                            alt="profile image"
                        />
                        <input
                            class="form-control"
                            type="file"
                            id="formFile"
                            name="image"
                        />
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-outline mb-4">
                                <input
                                    type="text"
                                    name="name"
                                    value="{{ $driver->user->name }}"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Dispatcher name"
                                    required
                                />
                                <label class="form-label" for="name"
                                    >Driver Name</label
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
                                    name="email"
                                    value="{{ $driver->user->email }}"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Dispatcher email"
                                    required
                                />
                                <label class="form-label" for="email"
                                    >Driver Email</label
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
                                    value="{{ $driver->contact_no }}"
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
                            value="{{ $driver->tel }}"
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
                            value="{{ $driver->street }}"
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
                            value="{{ $driver->city }}"
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
                            value="{{ $driver->state }}"
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
                            value="{{ $driver->postal_code }}"
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

                    <div class="form-outline mb-3">
                        <input
                            type="text"
                            name="license_number"
                            value="{{ $driver->license_number }}"
                            class="form-control @error('license_number') is-invalid @enderror"
                            placeholder="License No"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '')"
                            minlength="11"
                            maxlength="11"
                        />
                        @error('license_number')
                        <div class="alert alert-danger mt-1 mb-1">
                            {{ $message }}
                        </div>
                        @enderror
                        <label class="form-label" for="license_number"
                            >License No.</label
                        >
                    </div>

                    <!-- Type input -->
                    <div class="row mb-4">
                        <div class="col">
                            <label
                                class="form-label @error('vehicle_type') is-invalid @enderror"
                                for="vehicle_type"
                            ></label>
                            <select
                                type="text"
                                id="form6Example5"
                                name="vehicle_type"
                                style="
                                    width: 100% !important;
                                    margin: auto;
                                    border: 1px solid #ced4da;
                                    height: 33.26px;
                                    border-radius: 0.375rem;
                                    padding: 5.12px 12px;
                                    color: #828282;
                                "
                            >
                                <option
                                    value="{{ $driver->vehicle_type }}"
                                    hidden
                                >
                                    {{ $driver->vehicle_type }}
                                </option>
                                <option value="Motorcycle">Motorcycle</option>
                                <option value="Van">Van</option>
                                <option value="Truck">Truck</option>
                            </select>

                            @error('vehicle_type')
                            <div class="alert alert-danger mt-1 mb-1">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <!-- Plate Number input -->
                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            name="plate_no"
                            value="{{ $driver->plate_no }}"
                            class="form-control @error('plate_no') is-invalid @enderror"
                            placeholder="Plate No"
                        />
                        @error('plate_no')
                        <div class="alert alert-danger mt-1 mb-1">
                            {{ $message }}
                        </div>
                        @enderror
                        <label class="form-label" for="plate_no"
                            >Plate No.</label
                        >
                    </div>

                    <!-- Facebook input -->
                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            name="facebook"
                            value="{{ $driver->facebook }}"
                            class="form-control @error('facebook') is-invalid @enderror"
                            placeholder="Plate No"
                        />
                        @error('facebook')
                        <div class="alert alert-danger mt-1 mb-1">
                            {{ $message }}
                        </div>
                        @enderror
                        <label class="form-label" for="facebook"
                            >Facebook Link</label
                        >
                    </div>

                    <!-- Linkedin input -->
                    <div class="form-outline mb-4">
                        <input
                            type="url"
                            name="linkedin"
                            value="{{ $driver->linkedin }}"
                            class="form-control @error('linkedin') is-invalid @enderror"
                            placeholder="Plate No"
                        />
                        @error('linkedin')
                        <div class="alert alert-danger mt-1 mb-1">
                            {{ $message }}
                        </div>
                        @enderror
                        <label class="form-label" for="linkedin"
                            >Linkedin Link</label
                        >
                    </div>

                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button
                            type="button"
                            class="close"
                            data-dismiss="alert"
                            aria-hidden="true"
                        >
                            x
                        </button>
                        {{session()->get('message')}}
                    </div>
                    @endif
                    <a
                        href="{{ url('icargo/registered_users/send_otp', $driver->user->id)}}"
                        type="button"
                        class="btn btn-outline-primary btn-block"
                    >
                        Send password reset link
                    </a>

                    <br /><br />
                    <div class="row mb-4">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-lock-fill text-secondary"></i>
                            </span>
                            <input
                                id="otp"
                                type="number"
                                class="form-control @error('otp') is-invalid @enderror"
                                name="otp"
                                autocomplete="new-otp"
                                placeholder="Enter OTP"
                            />

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
                            class="btn btn-primary btn-block"
                            id="addModal2"
                        >
                            Save changes
                        </button>
                        <a
                            href="{{ route ('registered_drivers.index')}}"
                            class="btn btn-secondary btn-block"
                        >
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
