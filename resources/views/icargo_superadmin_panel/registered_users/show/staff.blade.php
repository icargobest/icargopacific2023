<button
    type="button"
    class="btn btn-warning btn-sm"
    data-mdb-toggle="modal"
    data-mdb-target="#showModalStaff{{$staff->user->id}}"
>
    SHOW
</button>

<div
    class="modal top fade"
    id="showModalStaff{{$staff->user->id}}"
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
                            value=" {{ $staff->user->id }}"
                            class="form-control"
                        />
                        <label class="form-label" for="updateEmail"
                            >User Account ID</label
                        >
                    </div>

                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            value=" {{ $staff->company_id }}"
                            class="form-control"
                        />
                        <label class="form-label" for="updateEmail"
                            >Company ID</label
                        >
                    </div>

                    <div class="form-outline mb-4">
                        @if ($staff->company && $staff->company->user)
                        <input
                            type="text"
                            value="{{ $staff->company->user->name }}"
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
                                    >Staff ID</label
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
                        <label class="form-label" for="id">Staff Email</label>
                    </div>

                    <!-- Contact No input -->

                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            id="updateContactNo"
                            name="updateContactNo"
                            value="{{$staff->contact_no}}"
                            class="form-control"
                        />
                        <label class="form-label" for="id">Password</label>
                    </div>

                    <!-- Contact No input -->

                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            id="updateStaff"
                            name="updateStaff"
                            value="{{date('M d, Y h:i:s A', strtotime($staff->user->created_at))}}"
                            class="form-control"
                        />
                    </div>

                    <!-- Contact No input -->

                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            id="updateStaffAt"
                            name="updateStaffAt"
                            value="{{date('M d, Y h:i:s A', strtotime($staff->user->updated_at))}}"
                            class="form-control"
                        />
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
