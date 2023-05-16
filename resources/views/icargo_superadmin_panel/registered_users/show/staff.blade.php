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

                    <div class="row mb-4">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-person-fill text-secondary"></i>
                            </span>
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
                        </div>
                    </div>

                    <hr />
                    <div class="row mb-4">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-person-fill text-secondary"></i>
                            </span>
                            <input
                                type="text"
                                id="updateFullName"
                                name="updateFullName"
                                value="{{$staff->user->name}}"
                                class="form-control"
                            />
                        </div>
                    </div>


                    <!-- Email input -->

                    <div class="row mb-4">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-envelope-fill text-secondary"></i>
                            </span>
                            <input
                                type="email"
                                id="updateEmail"
                                name="updateEmail"
                                value="{{$staff->user->email}}"
                                class="form-control"
                            />
                        </div>
                    </div>

                    <!-- Contact No input -->

                    <div class="row mb-4">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-person-fill text-secondary"></i>
                            </span>
                            <input
                                type="text"
                                id="updateContactNo"
                                name="updateContactNo"
                                value="{{$staff->contact_no}}"
                                class="form-control"
                            />
                        </div>
                    </div>

                    <!-- created_at -->

                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            id="updateStaff"
                            name="updateStaff"
                            value="{{$staff->created_at}}"
                            class="form-control"
                        />
                    </div>

                    <!-- updated_at -->

                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            id="updateStaffAt"
                            name="updateStaffAt"
                            value="{{$staff->updated_at}}"
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
