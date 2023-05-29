<head>
    @if ($errors->any())
        @foreach ($errors->all() as $err)
            <strong>{{ $err }}</strong>
        @endforeach
    @endif
</head>

<button type="button" class="btn created-button mx-auto my-2" data-bs-toggle="modal"
    data-bs-target="#transferModal{{$ship->id}}">Transfer</button>

{{-- TRANSFER MODAL --}}
<div class="modal top fade" id="transferModal{{$ship->id}}" tabindex="-1" aria-labelledby="transferModal" aria-hidden="true"
    data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="transferModal">Transfer Freight</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('transfer.staff', $ship->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $ship->id }}">

                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="trackingNum">Tracking
                                    Number:
                                    {{ $ship->tracking_number }} </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="form-label" for="transfer_station_number"></label>
                        <select type="text" id="transfer_station_number" name="transfer_station_number"
                            style="width:95% !important; margin:auto;border:1px solid #ced4da; height:33.26px; border-radius:0.375rem;padding: 5.12px 12px; color:#828282;"required>
                            <option value="" hidden>Transfer To</option>
                            <?php
                            foreach ($stations as $station) {
                                echo "<option value='{$station['id']}'>{$station['station_number']}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="button-modal-container">

                        <div class="rightmodal-button-container">

                            <button type="submit" class="btn btn-primary" data-mdb-dismiss="modal">
                                Transfer
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
