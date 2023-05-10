<button
    type="button"
    class="btn btn-warning btn-sm"
    data-mdb-toggle="modal"
    data-mdb-target="#showModal{{$dispatcher->id}}"
>
    Show
</button>

<div
    class="modal top fade"
    id="showModal{{$dispatcher->id}}"
    tabindex="-1"
    aria-hidden="true"
    data-mdb-backdrop="static"
    data-mdb-keyboard="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header mbc1">
                <h5 class="modal-title">Dispatcher Information</h5>
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
                            value=" {{ $dispatcher->user->id }}"
                            class="form-control"
                        />
                        <label class="form-label" for="updateEmail"
                            >User Account ID</label
                        >
                    </div>
                    
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

                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            value=" {{ $dispatcher->user->id }}"
                            class="form-control"
                        />
                        <label class="form-label" for="updateEmail"
                            >Dispatcher ID</label
                        >
                    </div>

                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input
                                    type="text"
                                    value="{{ $dispatcher->user->name }}"
                                    class="form-control"
                                />
                                <label class="form-label" for="updateFullName"
                                    >Dispatcher Name</label
                                >
                            </div>
                        </div>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input
                            type="email"
                            value=" {{ $dispatcher->user->email }}"
                            class="form-control"
                        />
                        <label class="form-label" for="updateEmail"
                            >Dispatcher Email</label
                        >
                    </div>

                    <div class="form-outline mb-4">
                        <input
                            type="text"
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
                            value="{{ $dispatcher->created_at }}"
                            class="form-control"
                            style="text-transform: capitalize"
                        />
                        <label class="form-label" for="contact_no"
                            >Created At</label
                        >
                    </div>

                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            value="{{ $dispatcher->updated_at }}"
                            class="form-control"
                            style="text-transform: capitalize"
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
