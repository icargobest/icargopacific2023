<!-- Modal -->
<div class="modal top fade" id="addDriverModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDriverModal">Add Station</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <form method="POST" action="{{route('stations.store')}}" enctype="multipart/form-data">
                    @csrf

                    <!-- Station ID Input -->
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="tel" id="stationID" name="station_number" class="form-control" autocomplete="station_number" required />
                                <label class="form-label" for="stationID">Station Number</label>
                            </div>
                        </div>
                    </div>

                    <!-- Station Name input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="stationName" name="station_name" class="form-control" autocomplete="station_name" required />
                        <label class="form-label" for="stationName">Station Name</label>
                    </div>

                    <!-- Sttation Address input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="stationAddress" name="station_address" class="form-control" autocomplete="station_address" required />
                        <label class="form-label" for="stationAddress">Address</label>
                    </div>

                    <!-- Station Contact No. -->
                    <div class="form-outline mb-4">
                        <div class="form-outline">
                            <input id="contact" type="text" class="form-control @error('station_contact_no') is-invalid @enderror" name="station_contact_no" value="{{ old('station_contact_no') }}" autocomplete="station_contact_no" oninput="this.value = this.value.replace(/[^0-9.]/g, '')" minlength="11" maxlength="11" required placeholder="" />
                            <label class="form-label" for="form6Example5">Contact</label>
                            @error('station_contact_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Station Email. -->
                    <div class="form-outline mb-4">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="station_email" value="{{ old('station_email') }}" required autocomplete="station_email" placeholder="" />
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label class="form-label" for="email">Email</label>
                    </div>

                    <div class="button-modal-container">
                        <div class="leftmodal-button-container">
                            <button type="reset" class="btn btn-outline-primary" data-mdb-dismiss="modal">
                                Reset
                            </button>
                        </div>

                        <div class="rightmodal-button-container">
                            <button type="submit" class="btn btn-primary" id="addModal2" data-mdb-dismiss="modal">
                                Save
                            </button>

                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                                Back
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>