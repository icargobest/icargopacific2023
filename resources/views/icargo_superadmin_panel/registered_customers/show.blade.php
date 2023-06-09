<button
    type="button"
    class="btn btn-warning btn-sm"
    data-mdb-toggle="modal"
    data-mdb-target="#showModalCustomer{{$customer->id}}"
>
    SHOW
</button>

<div
    class="modal top fade"
    id="showModalCustomer{{$customer->id}}"
    tabindex="-1"
    aria-hidden="true"
    data-mdb-backdrop="static"
    data-mdb-keyboard="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header mbc1">
                <h5 class="modal-title">VIEW Customer</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-mdb-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <div class="image-class">
                 <img
                        src="
                        @if ($customer->photo != null) {{ asset('storage/' . $customer->photo) }} 
                        @else /img/default_dp.png 
                        @endif"
                        alt="Profile Image"
                />
                </div>
                <fieldset disabled>
                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            value=" {{ $customer->user->id }}"
                            class="form-control"
                        />
                        <label class="form-label" for="updateEmail"
                            >User Account ID</label
                        >
                    </div>

                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            value=" {{ $customer->id }}"
                            class="form-control"
                        />
                        <label class="form-label" for="updateEmail"
                            >Customer ID</label
                        >
                    </div>

                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            value=" {{ $customer->user->name ?? '-'}}"
                            class="form-control"
                        />
                        <label class="form-label" for="updateEmail"
                            >Name</label
                        >
                    </div>

                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            value=" {{ $customer->user->email ?? '-'}}"
                            class="form-control"
                        />
                        <label class="form-label" for="updateEmail"
                            >Email</label
                        >
                    </div>

                    <hr />

                    {{-- contact number --}}
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{$customer->contact_no ?? '-'}}"
                                    name="contact_no"
                                    required
                                />
                                <label class="form-label" for="contact_no"
                                    >Contact Number</label
                                >
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{$customer->tel ?? '-'}}"
                                    name="tel"
                                    required
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
                                    type="text"
                                    class="form-control"
                                    name="street"
                                    value="{{$customer->street ?? '-'}}"
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
                                    type="text"
                                    class="form-control"
                                    name="city"
                                    value="{{$customer->city ?? '-'}}"
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
                                    type="text"
                                    class="form-control"
                                    name="state"
                                    value="{{$customer->state ?? '-'}}"
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
                                    type="text"
                                    class="form-control"
                                    name="postal_code"
                                    value="{{$customer->postal_code ?? '-'}}"
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
                                    type="url"
                                    class="form-control"
                                    name="facebook"
                                    value="{{$customer->facebook ?? '-'}}"
                                />
                                <label class="form-label" for="faceb"
                                    >Facebook</label
                                >
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input
                                    type="url"
                                    class="form-control"
                                    name="facebook"
                                    value="{{$customer->linkedin ?? '-'}}"
                                />
                                <label class="form-label" for="linkin"
                                    >LinkedIn</label
                                >
                            </div>
                        </div>
                    </div>
                    {{-- Created at --}}
                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            name="created_at"
                            value="{{date('M d, Y h:i:s A', strtotime($customer->user->created_at))}}"
                            class="form-control"
                        />
                    </div>

                    {{-- Updated at --}}
                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            name="updated_at"
                            value="{{date('M d, Y h:i:s A', strtotime($customer->user->updated_at))}}"
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
