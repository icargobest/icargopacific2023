<link rel="stylesheet" href="{{ asset('css/modal.css') }}">


<div class="modal top fade" id="personalinfo" tabindex="-1" aria-labelledby="personalinfo" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="personalinfo">EDIT INFORMATION</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{route('edit', Auth::id())}}">
                @csrf
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" class="form-control" name="name" value="{{$user->name}}" required>
                                <label class="form-label" for="fname">Full Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" class="form-control" value="{{$customer->mobile}}" name="mobile" required>
                                <label class="form-label" for="mobile">Mobile number</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" class="form-control" value="{{$customer->tel}}" name="tel" required>
                                <label class="form-label" for="Tel">Telephone</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" class="form-control" value="{{$user->email}}" name="email" required>
                                <label class="form-label" for="email">Email address</label>
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
