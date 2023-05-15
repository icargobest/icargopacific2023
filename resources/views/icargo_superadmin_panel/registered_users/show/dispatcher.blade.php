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

                    <!-- Contact No.  -->
                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            id="contact_no"
                            name="contact_no"
                            value="{{$dispatcher->contact_no}}"
                            class="form-control"
                        />
                        <label class="form-label" for="contact_no"
                            >Contact No.</label
                        >
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
