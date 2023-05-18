<button
    type="button"
    class="btn btn-success btn-sm"
    data-mdb-toggle="modal"
    data-mdb-target="#editModalCustomer{{$customer->id}}"
>
    EDIT
</button>

<div
    class="modal top fade"
    id="editModalCustomer{{$customer->id}}"
    tabindex="-1"
    aria-labelledby="editModalCustomer"
    aria-hidden="true"
    data-mdb-backdrop="static"
    data-mdb-keyboard="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header mbc2">
                <h5 class="modal-title">EDIT CUSTOMER</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-mdb-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <p class="small text-muted">
                    <span class="fw-bold">Caution:</span> Changing someone's
                    password without consent may violate privacy and compliance
                    regulations. Consider sending a password reset email link
                    instead.
                </p>
                <form
                    method="POST"
                    action="{{route('update.customer', $customer->id)}}"
                    enctype="multipart/form-data"
                >
                    @csrf @method('PUT')
                    <div class="mb-3">
                        <input
                            class="form-control"
                            type="file"
                            name="photo"
                            id="photo"
                        />
                        <label class="form-label" for="name"
                            >Upload new profile image</label
                        >
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" class="form-control" name="name" autocomplete="name" value="{{ $customer->user->name }}"
                                    required>
                                <label class="form-label" for="fname">Full Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="number" class="form-control" value="{{ $customer->contact_no }}" autocomplete="mobile"
                                    name="contact_no">
                                <label class="form-label" for="mobile">Mobile number</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="number" class="form-control" value="{{ $customer->tel }}" autocomplete="tel" name="tel">
                                <label class="form-label" for="Tel">Telephone</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" class="form-control" value="{{ $customer->user->email }}" autocomplete="email" name="email">
                                <label class="form-label" for="email">Email address</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" class="form-control" name="street" autocomplete="street">
                                <label class="form-label" for="sname">Street name</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" class="form-control" name="city" autocomplete="city">
                                <label class="form-label" for="city">City</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" class="form-control" name="state" autocomplete="state">
                                <label class="form-label" for="state">State/Country</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" class="form-control" name="postal_code" autocomplete="postal_code">
                                <label class="form-label" for="postal">Postal Code</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="url" class="form-control @error('website') is-invalid @enderror" name="website" id="twit">
                                @error('website')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <label class="form-label" for="twit">Website</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="url" class="form-control @error('facebook') is-invalid @enderror" name="facebook" id="faceb">
                                @error('facebook')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <label class="form-label" for="faceb">Facebook</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="url" class="form-control @error('linkedin') is-invalid @enderror" name="linkedin" id="linkin">
                                <label class="form-label" for="linkin">LinkedIn</label>
                            </div>
                        </div>
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
