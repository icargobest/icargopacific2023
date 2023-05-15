@include('partials.header')
@extends('layouts.app') 
@include('partials.navigationStaff', ['history' => 'nav-selected'])

<title>Staff | Order History</title>
<main class="container py-5" style="margin-top: -49px !important">
    <div class="mt-4">
        <h2 class=""
            style="
                border-bottom: 2px solid black;
                padding-bottom: 5px;
                letter-spacing: 1px;
            ">
            ORDER HISTORY
        </h2>
    </div>
    <div class="main-wrapper">
        <div class="mt-2">@include('flash-message')</div>

        <div class="table-container">
            <table class="table table-striped history-table border border-2 shadow table-borderless hover"
                id="stafforderhistorytable">
                <thead>
                    <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Pickup</th>
                        <th scope="col">Dropoff</th>
                        <th scope="col">Parcel Size&Width</th>
                        <th scope="col">Order Date</th>
                        <th scope="col">Delivered Date</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody class="history-tbody">
                    @foreach ($shipments as $shipment)
                        @if (Auth::user()->type == 'staff')
                            @if ($shipment->status == 'Delivered')
                                <tr>
                                    <td>{{ $shipment->id }}</td>
                                    <td>
                                        <img src="{{ asset($shipment->photo) }}" class="card shadow-0 w-25"
                                            style="min-width: 70px; object-fit: contain" alt="photo" />
                                    </td>
                                    <td>
                                        {{ $shipment->sender->sender_address }}, {{ $shipment->sender->sender_city }},
                                        {{ $shipment->sender->sender_state }}, {{ $shipment->sender->sender_zip }}
                                    </td>
                                    <td>
                                        {{ $shipment->recipient->recipient_address }},
                                        {{ $shipment->recipient->recipient_city }},
                                        {{ $shipment->recipient->recipient_state }},
                                        {{ $shipment->recipient->recipient_zip }}
                                    </td>
                                    <td>
                                        {{ intval($shipment->length) }}x{{ intval($shipment->width) }}x{{ intval($shipment->height) }}
                                        | {{ intval($shipment->weight) }}Kg
                                    </td>
                                    @foreach ($orderLogs as $log)
                                        @if ($log->shipment_id == $shipment->id)
                                            <td>
                                                {{ date('Y-m-d h:i:s A', strtotime($log->isPendingTime)) }}
                                            </td>
                                            <td>
                                                {{ date('Y-m-d h:i:s A', strtotime($log->isDeliveredTime)) }}
                                            </td>
                                            <td class="" style="overflow: auto">
                                                <label class="status-deliveredv2">
                                                    Delivered
                                                </label>
                                            </td>
                                        @endif
                                    @endforeach
                                </tr>
                            @endif
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script type="text/javascript">
    let stafforderhistorytable = new DataTable("#stafforderhistorytable");
</script>

@include('partials.footer')
