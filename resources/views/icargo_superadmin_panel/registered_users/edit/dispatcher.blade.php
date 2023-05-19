<button
    type="button"
    class="btn btn-success btn-sm"
    data-mdb-toggle="modal"
    data-mdb-target="#editModalDispatcher{{ $dispatcher->id }}"
>
    Edit
</button>
<div
    class="modal top fade"
    id="editModalDispatcher{{$dispatcher->id}}"
    tabindex="-1"
    role="dialog"
    aria-labelledby="editModalDispatcher"
    aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header mbc2">
                <h5 class="modal-title" id="exampleModalLabel">
                    Edit Dispatcher
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-mdb-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                @if(session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
                @endif
                <form
                    action="{{ route('update.dispatcher',$dispatcher->id) }}"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf @method('PUT')
                    <input type="hidden" id="email" name="email" value="{{$dispatcher->user->email}}" />
                    <div class="row">
                        <div class="col">   
                            <div class="form-outline mb-4">
                                <input
                                    type="text"
                                    name="name"
                                    value="{{ $dispatcher->user->name }}"
                                    class="form-control"
                                    placeholder="Dispatcher name"
                                    required
                                />
                                <label class="form-label" for="name"
                                    >Name</label
                                >
                                @error('name')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
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


                    <div class="form-outline mb-4">
                        <div class="col">
                            <div class="form-outline mb-4">
                                <input
                                    type="text"
                                    name="contact_no"
                                    value="{{ $dispatcher->contact_no }}"
                                    class="form-control"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '')"
                                    minlength="11"
                                    maxlength="11"
                                    placeholder="Contact Number:"
                                    required
                                />
                                <label class="form-label" for="name"
                                    >Contact No.</label
                                >

                                @error('name')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{session()->get('message')}}
                        </div>  
                    @endif             
                    <a href="{{ url('icargo/registered_users/send_otp', $dispatcher->user->id)}}"
                        type="button"
                        class="btn btn-outline-primary btn-block"
                    >
                        Send password reset link
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
                        <button type="submit" class="btn btn-success btn-block">
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
