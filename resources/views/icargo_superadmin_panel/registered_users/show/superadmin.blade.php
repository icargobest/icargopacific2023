<button
    type="button"
    class="btn btn-warning btn-sm"
    data-mdb-toggle="modal"
    data-mdb-target="#showModalSuperadmin{{$superadmin->id}}"
>
    SHOW
</button>

<div
    class="modal top fade"
    id="showModalSuperadmin{{$superadmin->id}}"
    tabindex="-1"
    aria-hidden="true"
    data-mdb-backdrop="static"
    data-mdb-keyboard="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header mbc1">
                <h5 class="modal-title">VIEW Company</h5>
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
                            value=" {{ $superadmin->id }}"
                            class="form-control"
                        />
                        <label class="form-label" for="updateEmail"
                            >User Account ID</label
                        >
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input
                                    id="name"
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    required
                                    autocomplete="name"
                                    value="{{$superadmin->name}}"
                                />
                                <label class="form-label" for="cname"
                                    >Name</label
                                >
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input
                                    id=""
                                    type="text"
                                    class="form-control"
                                    name="email"
                                    required
                                    autocomplete="email"
                                    value="{{$superadmin->email}}"
                                />
                                <label class="form-label" for="email"
                                    >Email address</label
                                >
                            </div>
                        </div>
                    </div>
                    
                    {{-- Created at --}}
                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            name="created_at"
                            value="{{date('M d, Y h:i:s A', strtotime($superadmin->created_at))}}"
                            class="form-control"
                        />
                        <label class="form-label" for="Created At"
                        >Created At</label>
                    </div>

                    {{-- Updated at --}}
                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            name="updated_at"
                            value="{{date('M d, Y h:i:s A', strtotime($superadmin->updated_at))}}"
                            class="form-control"
                        />
                        <label class="form-label" for="Updated At"
                        >Updated At</label>
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
