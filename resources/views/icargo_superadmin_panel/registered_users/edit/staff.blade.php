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
                    action="{{route('super-admin.update', $staff->id)}}"
                >
                    @csrf @method('PUT')
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" id="name"
                                name="name" @error('name')
                                is-invalid @enderror
                                value="{{$staff->user->name}}"
                                class="form-control" @required(true) />
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
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="email" name="email"
                        @error('email') is-invalid @enderror
                        value="{{$staff->user->email}}" class="form-control"
                        @required(true)/>
                        <label class="form-label" for="email">Email</label>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="row mb-4">
                        
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-lock-fill text-secondary"></i>
                            </span>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Password" >

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
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Re-Type Password">
                        </div>
                    </div>

                    <!-- Contact input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="contactno"
                        name="contactno" @error('contactno')
                        is-invalid @enderror value="{{$staff->contact_no}}"
                        class="form-control" @required(true)/>
                        <label class="form-label" for="contact">Contact</label>
                        @error('contactno')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{session()->get('message')}}
                        </div>  
                    @endif             
                    <a href="{{ url('icargo/registered_users/send_otp', $staff->user->id)}}"
                        type="button"
                        class="btn btn-outline-primary btn-block"
                    >
                        Send password OTP
                    </a>
                    
                    <br><br>
                    <div class="row mb-4">
                        
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-lock-fill text-secondary"></i>
                            </span>
                            <input id="otp" type="number" class="form-control @error('otp') is-invalid @enderror" name="otp" autocomplete="new-otp" placeholder="Enter OTP" >

                            @error('otp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

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
