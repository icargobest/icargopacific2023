<button
    type="button"
    class="btn btn-success btn-sm"
    data-mdb-toggle="modal"
    data-mdb-target="#editModalStaff{{$staff->id}}"
>
    EDIT
</button>

<div
    class="modal top fade"
    id="editModalStaff{{$staff->id}}"
    tabindex="-1"
    aria-labelledby="editModalStaff"
    aria-hidden="true"
    data-mdb-backdrop="static"
    data-mdb-keyboard="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header mbc2">
                <h5 class="modal-title">EDIT STAFF</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-mdb-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <form
                    method="POST"
                    action="{{route('update.staff', $staff->id)}}"
                >
                    @csrf @method('PUT')
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" id="updateFullName"
                                name="updateFullName" @error('updateFullName')
                                is-invalid @enderror
                                value="{{$staff->user->name}}"
                                class="form-control" @required(true) />
                                <label class="form-label" for="name"
                                    >Staff Name</label
                                >
                                @error('updateFullName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="updateEmail" name="updateEmail"
                        @error('updateEmail') is-invalid @enderror
                        value="{{$staff->user->email}}" class="form-control"
                        @required(true)/>
                        <label class="form-label" for="email">Email</label>
                        @error('updateEmail')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Contact input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="updateContactNo"
                        name="updateContactNo" @error('updateContactNo')
                        is-invalid @enderror value="{{$staff->contact_no}}"
                        class="form-control" @required(true)/>
                        <label class="form-label" for="contact">Contact</label>
                        @error('updateContactNo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
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
                            class="btn btn-success btn-block"
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
