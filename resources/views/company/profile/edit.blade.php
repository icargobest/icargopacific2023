<link rel="stylesheet" href="{{ asset('css/modal.css') }}" />

<div
    class="modal top fade"
    id="editCompanyProfile"
    tabindex="-1"
    aria-labelledby="editCompanyProfile"
    aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCompanyProfile">
                    EDIT INFORMATION
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>

            <div class="modal-body">
                <form
                    action="{{ route('company.updateProfile', $company->id) }}"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf @method('PUT')
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
                                    value="{{$company->user->name}}"
                                />
                                <label class="form-label" for="cname"
                                    >Company Name</label
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
                                    name="contact_no"
                                    required
                                    autocomplete="contact_no"
                                    value="{{$company->contact_no}}"
                                />
                                <label class="form-label" for="mobile"
                                    >Mobile number</label
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
                                    name="contact_name"
                                    required
                                    autocomplete="contact_name"
                                    value="{{$company->contact_name}}"
                                />
                                <label class="form-label" for="mobile"
                                    >Contact Name</label
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
                                    name="tel"
                                    required
                                    autocomplete="tel"
                                    value="{{$company->tel}}"
                                />
                                <label class="form-label" for="Tel"
                                    >Telephone</label
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
                                    value="{{$company->user->email}}"
                                />
                                <label class="form-label" for="email"
                                    >Email address</label
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
                                    name="street"
                                    required
                                    autocomplete="street"
                                    value="{{$company->street}}"
                                />
                                <label class="form-label" for="sname"
                                    >Street name</label
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
                                    name="city"
                                    required
                                    autocomplete="city"
                                    value="{{$company->city}}"
                                />
                                <label class="form-label" for="city"
                                    >City</label
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
                                    name="state"
                                    required
                                    autocomplete="state"
                                    value="{{$company->state}}"
                                />
                                <label class="form-label" for="state"
                                    >State/Country</label
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
                                    name="postal_code"
                                    required
                                    autocomplete="postal_code"
                                    value="{{$company->postal_code}}"
                                />
                                <label class="form-label" for="postal"
                                    >Postal Code</label
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
                                    class="form-control @error('website') is-invalid @enderror"
                                    name="website"
                                    autocomplete="website"
                                    value="{{$company->website}}"
                                />

                                @error('website')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <label class="form-label" for="postal"
                                    >Website Link</label
                                >
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input
                                    id="facebook"
                                    type="text"
                                    class="form-control @error('facebook') is-invalid @enderror"
                                    name="facebook"
                                    value="{{$company->facebook}}"
                                    required
                                    autocomplete="facebook"
                                    autofocus
                                    placeholder="Facebook Link"
                                />

                                @error('facebook')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <label class="form-label" for="postal"
                                    >Facebook Link</label
                                >
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input
                                    id="linkedin"
                                    type="text"
                                    class="form-control @error('linkedin') is-invalid @enderror"
                                    name="linkedin"
                                    autocomplete="linkedin"
                                    value="{{$company->linkedin}}"
                                />
                                @error('linkedin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <label class="form-label" for="postal"
                                    >Linkedin Link</label
                                >
                            </div>
                        </div>
                    </div>

                    <div class="buttonContainer">
                        <button type="submit" class="modalbutton">SAVE</button>
                        <a
                            href="{{route('company.profile')}}"
                            class="btn btn-secondary btn-block"
                            data-mdb-dismiss="modal"
                        >
                            CANCEL
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
