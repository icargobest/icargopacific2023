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
                <form
                    action="{{ route('update.driver',$driver->id) }}"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf @method('PUT') {{-- Name Input --}}
                    <div class="row mb-2">
                        <div class="col">
                            <div class="form-outline mb-3">
                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    value="{{ $driver->user->name }}"
                                    class="form-control"
                                    placeholder="Driver name"
                                />
                                @error('name')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                                @enderror
                                <label class="form-label" for="name"
                                    >Driver Name</label
                                >
                            </div>
                        </div>
                    </div>

                    <!-- Contact Number input -->
                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            name="contact_no"
                            value="{{ $driver->contact_no }}"
                            class="form-control"
                            placeholder="Contact No"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '')"
                            minlength="11"
                            maxlength="11"
                            required
                        />
                        @error('contact_no')
                        <div class="alert alert-danger mt-1 mb-1">
                            {{ $message }}
                        </div>
                        @enderror
                        <label class="form-label" for="plate_no"
                            >Contact No.</label
                        >
                    </div>

                    <!-- License Number input -->
                    <div class="form-outline mb-3">
                        <input
                            type="text"
                            name="license_number"
                            value="{{ $driver->license_number }}"
                            class="form-control"
                            placeholder="License No"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '')"
                            minlength="11"
                            maxlength="11"
                            required
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
                                class="form-label"
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
                                required
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
                            class="form-control"
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

                    <button
                        type="button"
                        class="btn btn-outline-primary btn-block"
                    >
                        Send password reset link
                    </button>

                    <hr />

                    <div class="modal-footer">
                        <button
                            type="submit"
                            class="btn btn-primary btn-block"
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
