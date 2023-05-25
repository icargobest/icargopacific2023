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
    aria-labelledby="editModal"
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
                    <span class="fw-bold">Caution:</span> Changing customer's
                    information without consent may violate privacy and compliance
                    regulations. Consider sending an OTP instead to modify their data.
                </p>
                <form
                    method="POST"
                    action="{{route('customers.update', $customer->id)}}"
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
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-person-fill text-secondary"></i>
                            </span>
                            <input
                                id="name"
                                type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                name="name"
                                value="{{ $customer->user->name }}"
                                required
                                autocomplete="name"
                                autofocus
                                placeholder="Name"
                            />
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-lock-fill text-secondary"></i>
                            </span>
                            <input
                                id="password"
                                type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password"
                                placeholder="Password"
                            />

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-lock-fill text-secondary"></i>
                            </span>
                            <input
                                id="password-confirm"
                                type="password"
                                class="form-control"
                                name="password_confirmation"
                                placeholder="Re-Type Password"
                            />
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i
                                    class="bi bi-envelope-fill text-secondary"
                                ></i>
                            </span>
                            <input
                                id="email"
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                name="email"
                                value="{{ $customer->user->email}}"
                                required
                                autocomplete="email"
                                placeholder="E-mail Address"
                            />

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <hr />

                    {{-- contact number --}}
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                            <input
                                id="contact"
                                type="text"
                                class="form-control @error('contact_no') is-invalid @enderror"
                                name="contact_no"
                                value="{{ $customer->contact_no }}"
                                autocomplete="contact_no"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '')"
                                minlength="11"
                                maxlength="11"
                                @required(true)
                                placeholder="Contact No"
                            />
                            <label class="form-label" for="Tel">Contact Number</label>
                            </div>

                            @error('contact_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" class="form-control @error('tel') is-invalid @enderror" value="{{ $customer->tel }}" autocomplete="tel" name="tel">
                                <label class="form-label" for="Tel">Telephone</label>
                            </div>
                            @error('tel')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" class="form-control @error('street') is-invalid @enderror" name="street" autocomplete="street" required>
                                <label class="form-label" for="sname">Street name</label>
                            </div>
                            @error('street')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" autocomplete="city" required>
                                <label class="form-label" for="city">City</label>
                            </div>
                            @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" class="form-control @error('state') is-invalid @enderror" name="state" autocomplete="state" required>
                                <label class="form-label" for="state">State/Country</label>
                            </div>
                        </div>
                        @error('state')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code" autocomplete="postal_code" required>
                                <label class="form-label" for="postal">Postal Code</label>
                            </div>
                            @error('postal_code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
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
                                <label class="form-label" for="twit">Website Link</label>
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
                                <label class="form-label" for="faceb">Facebook Link</label>
                            </div>
                        </div>
                    </div>

                    <button
                        type="button"
                        class="btn btn-outline-primary btn-block"
                    >
                        Send One-Time-Password (OTP)
                    </button>

                    <hr />
                    <div class="modal-footer">
                        <button
                            type="submit"
                            class="btn btn-success btn-block"
                            id="addModal2"
                        >
                            Save changes
                        </button>
                        <a
                            href="{{ route ('registered_customers.index')}}"
                            class="btn btn-secondary btn-block"
                        >
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
