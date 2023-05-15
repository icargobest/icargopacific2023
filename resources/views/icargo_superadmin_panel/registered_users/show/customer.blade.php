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
                                autocomplete="name"
                                autofocus
                                placeholder="Name"
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
                                autocomplete="email"
                                placeholder="E-mail Address"
                            />
                        </div>
                    </div>

                    <hr />

                    {{-- contact number --}}
                    <div class="row mb-4">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-person-fill text-secondary"></i>
                            </span>
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
                                placeholder="Contact No"
                            />
                        </div>
                    </div>

                    {{-- address--}}
                    <div class="row mb-4">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-person-fill text-secondary"></i>
                            </span>
                            <input id="contactnum" type="text"
                            class="form-control @error('address')
                            is-invalid" @enderror" name="address"
                            value="{{$customer->address }}"
                            autocomplete="address" autofocus
                            placeholder="Address">
                        </div>
                    </div>

                    {{-- Created at --}}
                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            name="created_at"
                            value="{{date('M d, Y h:i:s A', strtotime($user->user->created_at))}}"
                            class="form-control"
                        />
                    </div>

                    {{-- Updated at --}}
                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            name="updated_at"
                            value="{{date('M d, Y h:i:s A', strtotime($user->user->updated_at))}}"
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
