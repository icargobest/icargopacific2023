<button
    type="button"
    class="btn btn-warning btn-sm"
    data-mdb-toggle="modal"
    data-mdb-target="#showModal{{$driver->user->id}}"
>
    SHOW
</button>

<div
    class="modal top fade"
    id="showModal{{$driver->user->id}}"
    tabindex="-1"
    aria-hidden="true"
    data-mdb-backdrop="static"
    data-mdb-keyboard="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header mbc1">
                <h5 class="modal-title">VIEW REGISTERED ACCOUNTS</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-mdb-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <fieldset disabled>

                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            value=" {{ $driver->user->id }}"
                            class="form-control"
                        />
                        <label class="form-label" for="updateEmail"
                            >User Account ID</label
                        >
                    </div>

                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            value=" {{ $driver->company_id }}"
                            class="form-control"
                        />
                        <label class="form-label" for="updateEmail"
                            >Company ID</label
                        >
                    </div>

                    <div class="row mb-4">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-person-fill text-secondary"></i>
                            </span>
                                @if ($driver->company && $driver->company->user)
                                <input
                                    type="text"
                                    value="{{ $driver->company->user->name }}"
                                    class="form-control"
                                />
                                @else
                                <input
                                    type="text"
                                    value="Company not found"
                                    class="form-control"
                                />
                                @endif
                        </div>
                    </div>
                    <hr />
                    {{-- Driver ID --}}
                    <div class="row">
                        <div class="col">
                            <div class="form-outline mb-4">
                                <input
                                    type="text"
                                    id="id" 
                                    name="id"
                                    value="{{$driver->user->id}}"
                                    class="form-control"
                                />
                                <label class="form-label" for="id"
                                    >Driver ID</label
                                >
                            </div>
                        </div>
                    </div>

                    <!-- Name  -->
                    <div class="row mb-4">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-person-fill text-secondary"></i>
                            </span>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{$driver->user->name}}"
                                class="form-control"
                            />
                        </div>
                    </div>

                    <!-- Email  -->
                    <div class="row mb-4">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-envelope-fill text-secondary"></i>
                            </span>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{$driver->user->email}}"
                                class="form-control"
                            />
                        </div>
                    </div>
                    <!-- Contact No.  -->
                    <div class="row mb-4">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-person-fill text-secondary"></i>
                            </span>
                            <input
                                type="text"
                                id="contact_no"
                                name="contact_no"
                                value="{{$driver->contact_no}}"
                                class="form-control"
                            />
                        </div>
                    </div>

                    <hr />
                    
                    <!-- Vehicle  -->
                    <div class="row mb-4">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-truck"></i>
                            </span>
                            <input
                                type="text"
                                id="vehicle_type"
                                name="vehicle_type"
                                value="{{$driver->vehicle_type}}"
                                class="form-control"
                            />
                        </div>
                    </div>
                    <!-- License No.  -->

                    <div class="row mb-4">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-truck"></i>
                            </span>
                            <input
                                type="text"
                                id="license_number"
                                name="license_number"
                                value="{{$driver->license_number}}"
                                class="form-control"
                            />
                        </div>
                    </div>

                    <!-- Plate No. -->

                    <div class="row mb-4">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-truck"></i>
                            </span>
                            <input
                                type="text"
                                id="plate_no"
                                name="plate_no"
                                value="{{$driver->plate_no}}"
                                class="form-control"
                            />
                        </div>
                    </div>
                    <!-- Created At. -->

                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            id="created_at"
                            name="created_at"
                            value="{{date('M d, Y h:i:s A', strtotime($driver->user->created_at))}}"
                            class="form-control"
                        />
                        <label class="form-label" for="created_at"
                            >Created At</label
                        >
                    </div>
                    <!-- Updated At. -->
                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            id="updated_at"
                            name="updated_at"
                            value="{{date('M d, Y h:i:s A', strtotime($driver->user->updated_at))}}"
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
