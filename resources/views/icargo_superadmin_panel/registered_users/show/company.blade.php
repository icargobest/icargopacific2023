<button
    type="button"
    class="btn btn-warning btn-sm"
    data-mdb-toggle="modal"
    data-mdb-target="#showModal{{$company->id}}"
>
    SHOW
</button>

<div
    class="modal top fade"
    id="showModal{{$company->id}}"
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
                <div class="image-class">
                    <img src="{{ asset($company->image 
                        ? 'storage/images/company/' . $company->user->id . '/' . $company->image 
                        : 'img/default_dp.png') }}"
                    alt="Profile Image">
                </div>
                <fieldset disabled>
                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            value=" {{ $company->user->id }}"
                            class="form-control"
                        />
                        <label class="form-label" for="updateEmail"
                            >User Account ID</label
                        >
                    </div>
                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            value=" {{ $company->id }}"
                            class="form-control"
                        />
                        <label class="form-label" for="updateEmail"
                            >Company ID</label
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
                                    >Contact Number</label
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
                                    class="form-control"
                                    name="website"
                                    autocomplete="website"
                                    value="{{$company->website ?? '-'}}"
                                />
                                <label class="form-label" for="postal"
                                    >Websit Link</label
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
                                    class="form-control"
                                    name="facebook"
                                    value="{{$company->facebook}}"
                                    required
                                    autocomplete="facebook"
                                    autofocus
                                    placeholder="Facebook Link"
                                />
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
                                    class="form-control"
                                    name="linkedin"
                                    autocomplete="linkedin"
                                    value="{{$company->linkedin ?? '-'}}"
                                />
                                <label class="form-label" for="postal"
                                    >Linkedin Link</label
                                >
                            </div>
                        </div>
                    </div>

                    {{-- Created at --}}
                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            name="created_at"
                            value="{{date('M d, Y h:i:s A', strtotime($company->user->created_at))}}"
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
                            value="{{date('M d, Y h:i:s A', strtotime($company->user->updated_at))}}"
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
