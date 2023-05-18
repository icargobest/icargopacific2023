<link rel="stylesheet" href="{{ asset('css/modal.css') }}">


<div class="modal top fade" id="personalinfo" tabindex="-1" aria-labelledby="personalinfo" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="personalinfo">EDIT INFORMATION</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route('edit', Auth::id()) }}">
                @csrf
                <div class="modal-body">
                <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" class="form-control" name="name" autocomplete="name" value="{{ $user->name }}"
                                    required>
                                <label class="form-label" for="fname">Full Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="number" class="form-control" value="{{ $customer->contact_no }}" autocomplete="mobile"
                                    name="mobile" required>
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
                                <input type="text" class="form-control" value="{{ $user->email }}" autocomplete="email" name="email"
                                    required>
                                <label class="form-label" for="email">Email address</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" class="form-control" name="street" autocomplete="street" required>
                                <label class="form-label" for="sname">Street name</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" class="form-control" name="city" autocomplete="city" required>
                                <label class="form-label" for="city">City</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" class="form-control" name="state" autocomplete="state" required>
                                <label class="form-label" for="state">State/Country</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" class="form-control" name="postal_code" autocomplete="postal_code" required>
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
                                <input type="url" class="form-control @error('facebook') is-invalid @enderror" name="facebook" id="faceb" required>
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
                    <div class="buttonContainer">
                        <button type="submit" class="modalbutton">
                            SAVE
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
