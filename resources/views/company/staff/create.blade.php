<!-- Modal -->
<div
    class="modal top fade"
    id="addStaffModal"
    aria-labelledby="addStaffModal"
    tabindex="-1"
    aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Staff</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <form
                    method="POST"
                    action="{{route('staff.store')}}"
                    enctype="multipart/form-data"
                >
                    @csrf

                    <div class="form-outline mb-4">
                        <div class="form-outline">
                            <input
                                id="name"
                                type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                autocomplete="name"
                                autofocus
                                placeholder=""
                            />
                            <label class="form-label" for="name"
                                >Staff Name</label
                            >
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input
                            id="email"
                            type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="email"
                            placeholder=""
                        />
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label class="form-label" for="email">Email</label>
                    </div>

                    <!-- Contact input -->
                    <div class="form-outline mb-4">
                        <div class="form-outline">
                            <input
                                id="contact"
                                type="text"
                                class="form-control @error('contact_no') is-invalid @enderror"
                                name="contact_no"
                                value="{{ old('contact_no') }}"
                                autocomplete="contact_no"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '')"
                                minlength="11"
                                maxlength="11"
                                required
                                placeholder=""
                            />
                            <label class="form-label" for="form6Example5"
                                >Contact</label
                            >
                            @error('contact_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!-- Password -->
                    <div class="form-outline mb-4">
                        <input
                            id="password"
                            type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            name="password"
                            @required(true)
                            autocomplete="new-password"
                            placeholder="Password"
                        />

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label class="form-label" for="password"
                            >Password</label
                        >
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-outline mb-4">
                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            @required(true)
                            class="form-control"
                        />
                        <label class="form-label" for="password_confirmation"
                            >Confirm Password</label
                        >
                    </div>

                    <!-- Facebook input -->
                    <div class="form-outline mb-4">
                      <input
                          type="url"
                          class="form-control @error('facebook') is-invalid @enderror"
                          name="facebook"
                          value="{{ old('facebook') }}"
                          required
                          autocomplete="facebook"
                          placeholder=""
                      />
                      @error('facebook')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                      <label class="form-label" for="email">Facebook Link</label>
                  </div>

                    <div class="button-modal-container">
                        <div class="leftmodal-button-container">
                            <button
                                type="reset"
                                class="btn btn-outline-primary"
                                data-mdb-dismiss="modal"
                            >
                                Reset
                            </button>
                        </div>

                        <div class="rightmodal-button-container">
                            <button
                                type="submit"
                                class="btn btn-primary"
                                id="addModal2"
                                data-mdb-dismiss="modal"
                            >
                                Save
                            </button>

                            <button
                                type="button"
                                class="btn btn-primary"
                                data-bs-dismiss="modal"
                            >
                                Back
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
