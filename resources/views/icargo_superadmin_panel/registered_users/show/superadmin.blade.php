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
                <h5 class="modal-title">VIEW REGISTERED ACCOUNT</h5>
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
                                value="{{$superadmin->name}}"
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
                                value="{{$superadmin->email}}"
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
                            value="{{date('M d, Y h:i:s A', strtotime($superadmin->created_at))}}"
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
                            value="{{date('M d, Y h:i:s A', strtotime($superadmin->updated_at))}}"
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
