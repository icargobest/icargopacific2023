<button
    type="button"
    class="btn btn-success btn-sm"
    data-mdb-toggle="modal"
    data-mdb-target="#editModal{{$station->id}}"
>
    Edit
</button>

<div
    class="modal top fade"
    id="editModal{{$station->id}}"
    tabindex="-1"
    aria-labelledby="editModal"
    aria-hidden="true"
    data-mdb-backdrop="static"
    data-mdb-keyboard="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header mbc2">
                <h5 class="modal-title">Edit Data</h5>
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
                    action="{{route('stations.update', $station->id)}}"
                >
                    @csrf @method('PUT')

                    <!-- Station ID Input -->
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input
                                    type="text"
                                    id="stationID"
                                    name="update_station_number"
                                    value="{{$station->station_number}}"
                                    class="form-control"
                                />
                                <label class="form-label" for="stationID"
                                    >Station Number</label
                                >
                            </div>
                        </div>
                    </div>
                    <!-- Station Name input -->
                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            id="stationName"
                            name="update_station_name"
                            value="{{$station->station_name}}"
                            class="form-control"
                        />
                        <label class="form-label" for="stationName"
                            >Station Name</label
                        >
                    </div>

                    <!-- Sttation Address input -->
                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            id="stationAddress"
                            name="update_station_address"
                            value="{{$station->station_address}}"
                            class="form-control"
                        />
                        <label class="form-label" for="stationAddress"
                            >Address</label
                        >
                    </div>

                    <!-- Station Contact No. -->
                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            id="stationContactNo"
                            name="update_station_contact_no"
                            value="{{$station->station_contact_no}}"
                            class="form-control"
                        />
                        <label class="form-label" for="stationContactNo"
                            >Contact No.</label
                        >
                    </div>

                    <!-- Station Email. -->
                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            id="stationEmail"
                            name="update_station_email"
                            value="{{$station->station_email}}"
                            class="form-control"
                        />
                        <label class="form-label" for="stationEmail"
                            >Email</label
                        >
                    </div>

                    <div class="modal-footer">
                        <button
                            type="submit"
                            class="btn btn-success btn-block"
                            data-mdb-dismiss="modal"
                        >
                            Save
                        </button>
                        <a
                            href="{{route('stations.view')}}"
                            class="btn btn-secondary btn-block"
                        >
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>