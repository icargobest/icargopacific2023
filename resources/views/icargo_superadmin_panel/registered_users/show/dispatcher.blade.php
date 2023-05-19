<button
    type="button"
    class="btn btn-warning btn-sm"
    data-mdb-toggle="modal"
    data-mdb-target="#showModal{{$dispatcher->user->id}}"
>
    SHOW
</button>

<div
    class="modal top fade"
    id="showModal{{$dispatcher->user->id}}"
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
                <img
                    src="
                    @if ($dispatcher->image != null) {{ asset('storage/' . $dispatcher->image) }} 
                    @else /img/default_dp.png 
                    @endif"
                    alt="Profile Image" style="width:250px"
                />
                <fieldset disabled>
                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            value=" {{ $dispatcher->user->id }}"
                            class="form-control"
                        />
                        <label class="form-label" for="updateEmail"
                            >User Account ID</label
                        >
                    </div>
                    {{-- Company ID --}}
                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            value=" {{ $dispatcher->company_id }}"
                            class="form-control"
                        />
                        <label class="form-label" for="updateEmail"
                            >Company ID</label
                        >
                    </div>
                    {{-- Company Name --}}
                    <div class="form-outline mb-4">
                        @if ($dispatcher->company && $dispatcher->company->user)
                        <input
                            type="text"
                            value="{{ $dispatcher->company->user->name }}"
                            class="form-control"
                        />
                        @else
                        <input
                            type="text"
                            value="Company not found"
                            class="form-control"
                        />
                        @endif
                        <label class="form-label" for="updateEmail"
                            >Company Name</label
                        >
                    </div>
                    {{-- dispatcher ID --}}
                    <div class="row">
                        <div class="col">
                            <div class="form-outline mb-4">
                                <input
                                    type="text"
                                    id="id"
                                    name="id"
                                    value="{{$dispatcher->user->id}}"
                                    class="form-control"
                                />
                                <label class="form-label" for="id"
                                    >Dispatcher ID</label
                                >
                            </div>
                        </div>
                    </div>
                    <!-- Name  -->
                    <div class="form-outline mb-4">
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{$dispatcher->user->name}}"
                            class="form-control"
                        />
                        <label class="form-label" for="email"
                            >Dispatcher Name</label
                        >
                    </div>
                    <!-- Email  -->
                    <div class="form-outline mb-4">
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{$dispatcher->user->email}}"
                            class="form-control"
                        />
                        <label class="form-label" for="email"
                            >Dispatcher Email</label
                        >
                    </div>
                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            id="contact_no"
                            name="contact_no"
                            value="{{ $dispatcher->contact_no }}"
                            class="form-control"
                            style="text-transform: capitalize"
                        />
                        <label class="form-label" for="contact_no"
                            >Contact Number</label
                        >
                    </div>
                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            id="contact_no"
                            name="tel"
                            value="{{$dispatcher->tel}}"
                            class="form-control"
                        />
                        <label class="form-label" for="contact_no"
                            >Tel No.</label
                        >
                    </div>
                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            id="contact_no"
                            name="street"
                            value="{{$dispatcher->street}}"
                            class="form-control"
                        />
                        <label class="form-label" for="contact_no"
                            >Street</label
                        >
                    </div>
                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            id="contact_no"
                            name="city"
                            value="{{$dispatcher->city}}"
                            class="form-control"
                        />
                        <label class="form-label" for="contact_no">City</label>
                    </div>
                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            id="contact_no"
                            name="postal_code"
                            value="{{$dispatcher->postal_code}}"
                            class="form-control"
                        />
                        <label class="form-label" for="contact_no"
                            >Postal Code</label
                        >
                    </div>
                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            id="contact_no"
                            name="state"
                            value="{{$dispatcher->state}}"
                            class="form-control"
                        />
                        <label class="form-label" for="contact_no">State</label>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input
                                    type="url"
                                    class="form-control"
                                    name="facebook"
                                    value="{{ $dispatcher->facebook ?? '-' }}"
                                    id="faceb"
                                    required
                                />
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
                                    class="form-control"
                                    name="linkedin"
                                    value="{{ $dispatcher->linkedin ?? '-' }}"
                                    id="linkin"
                                />
                                <label class="form-label" for="linkin"
                                    >LinkedIn</label
                                >
                            </div>
                        </div>
                    </div>

                    <!-- Created At. -->
                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            id="created_at"
                            name="created_at"
                            value="{{date('M d, Y h:i:s A', strtotime($dispatcher->user->created_at))}}"
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
                            value="{{date('M d, Y h:i:s A', strtotime($dispatcher->user->updated_at))}}"
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
