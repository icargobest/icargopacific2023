
<head>
    <link rel="stylesheet" href="{{ asset('css/style_order.css') }}">
    <title>Company | Orders</title>
</head>
<br>
@if($errors->any())
@foreach($errors->all() as $err)
    <strong>{{$err}}</strong>
@endforeach
@endif

<button type="button" class="btn btn-dark btn-sm col-1" data-bs-toggle="modal" data-bs-target="#transferModal">Transfer</button>

<!-- Modal -->
<div class="modal top fade" id="transferModal" tabindex="-1" aria-labelledby="transferModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="transferModal">Transfer Freight</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

          <div class="modal-body">
            <form action="{{route('transfer.company', $ship->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
                <input type="hidden" name="id" value="{{$ship->id}}">

                <div class="row mb-4">
                    <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="trackingNum">Tracking Number: {{$ship->tracking_number}} </label>
                    </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="form-label" for="transfer_station_number"></label>
                    <select type="text" id="transfer_station_number" name="transfer_station_number" style="width:95% !important; margin:auto;border:1px solid #ced4da; height:33.26px; border-radius:0.375rem;padding: 5.12px 12px; color:#828282;"required>
                      <option value="" hidden>Transfer To</option>
                      <?php
                        foreach ($stations as $station) {
                            echo "<option value='{$station['station_number']}'>{$station['station_number']}</option>";
                        }
                        ?>
                    </select>
                  </div>

              <div class="button-modal-container">

                  <div class="rightmodal-button-container">

                      <button type="submit" class="btn btn-primary" data-mdb-dismiss="modal">
                          Continue
                      </button>

                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                          Back
                      </button>
                  </div>

            </form>
          </div>

      </div>
    </div>
  </div>
