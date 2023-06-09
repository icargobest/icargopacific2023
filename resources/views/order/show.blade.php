{{-- naka comment po yung mga variable pero wala akong inalis --}}

<button type="button" class="btn created-button mx-auto"
    style="background-color: yellow; border-color:#214D94; color:black !important;" data-mdb-toggle="modal"
    data-mdb-target="#showModal{{ $shipment->id }}">
    Show
</button>

<style>
    .child2 th {
        text-align: left !important;
    }

    .child2 td {
        text-align: left !important;
    }

    td.contact,
    th.contact {
        border-bottom: 1px solid black !important;
    }

    #tracking-status {
        text-align: left !important;
    }
</style>

<div class="modal fade" id="showModal{{ $shipment->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header border-bottom" style="background-color:white !important;">
                <!-- title -->
                <h4 class="modal-title" id="exampleModalLabel" style="color:black !important;"><strong> WAYBILL TRACKING
                    </strong></h4>
                <!-- close button -->
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body mb-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="child1 col-md-3 col-sm-3 w-100">
                                <div class="parcel-pic">
                                    <img src="{{ asset($shipment->photo) }}" alt="photo"
                                        class="img-fluid rounded mx-auto d-block mb-2"
                                        style="border-radius: 0 1rem 1rem 0; margin-left:50%;" />
                                    {{-- <img src="/img/box.jpg" alt="login form"
                                        class="img-fluid rounded mx-auto d-block mb-2"
                                        style="border-radius: 0 1rem 1rem 0; margin-left:50%;" /> --}}
                                </div>
                            </div>
                            <div class="child2 col-md-9 col-sm-9 me-0 w-100">
                                <table class="table table-sm table-hover table-borderless table-no-bottom-space"
                                    id="tracking-table">
                                    <tbody>
                                        <tr>
                                            <th><strong>SENDER</strong></th>
                                        </tr>
                                        <tr>
                                            <th>NAME:</th>
                                            <td class="fw-bold" value="">{{ $shipment->sender->sender_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>ADDRESS:</th>
                                            <td class="fw-bold" value="">{{ $shipment->sender->sender_address }} ,
                                                {{ $shipment->sender->sender_city }} ,
                                                {{ $shipment->sender->sender_state }} ,
                                                {{ $shipment->sender->sender_zip }}</td>
                                        </tr>
                                        <tr>
                                            <th class="contact">CONTACT NUMBER:</th>
                                            <td class="contact fw-bold" value="">
                                                {{ $shipment->sender->sender_mobile }} @if ($shipment->sender->sender_tel != null)
                                                    | {{ $shipment->sender->sender_tel }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><strong>RECIEVER</strong></th>
                                        </tr>
                                        <tr>
                                            <th>NAME:</th>
                                            <td class="fw-bold" value="">
                                                {{ $shipment->recipient->recipient_name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>ADDRESS:</th>
                                            <td class="fw-bold" value="">
                                                {{ $shipment->recipient->recipient_address }} ,
                                                {{ $shipment->recipient->recipient_city }} ,
                                                {{ $shipment->recipient->recipient_state }} ,
                                                {{ $shipment->recipient->recipient_zip }}</td>
                                        </tr>
                                        <tr>
                                            <th class="contact">CONTACT NUMBER:</th>
                                            <td class="contact fw-bold">{{ $shipment->recipient->recipient_mobile }}
                                                @if ($shipment->recipient->recipient_tel != null)
                                                    | {{ $shipment->recipient->recipient_tel }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><strong>PARCEL INFORMATION</strong></th>
                                        </tr>
                                        <tr>
                                            <th>ID:</th>
                                            <td class="fw-bold" value="">{{ $shipment->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>PARCEL SIZE & WEIGHT:</th>
                                            <td class="fw-bold" value="">
                                                {{ intval($shipment->length) }}x{{ intval($shipment->width) }}x{{ intval($shipment->height) }}
                                                | {{ intval($shipment->weight) }}Kg</td>
                                        </tr>
                                        <tr>
                                            <th>PARCEL ITEM:</th>
                                            <td class="fw-bold">Tools</td>
                                        </tr>
                                        <tr>
                                            <th>PARCEL CHARGES:</th>
                                            <td class="fw-bold">Php 68</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 shadow px-0">
                            <div class="child2 h-100 border">
                                <div class="d-block border-bottom bg-primary"
                                    style="background-color: #0C2F68 !important;">
                                    <h6 class="ms-3 pt-2 text-left" id="tracking-status">STATUS</h6>
                                </div>
                                <div class="container mt-3">
                                    {{-- naghahanap pa ng tamang code para sa line --}}
                                    @foreach ($orderLogs as $log)
                                        @if ($shipment->id == $log->shipment_id)
                                            <div class="row text-center pb-5">
                                                <!-- order confirm -->
                                                <div class="col-md-3">
                                                    <i class="fa fa-check-circle fa-2x"
                                                        @if ($log->isProcessed != null) style="color:green" @endif></i>
                                                    <p>Order Confirm</p>
                                                </div>
                                                <!-- picked by courier icon -->
                                                <div class="col-md-3">
                                                    <i class="fa fa-user-circle fa-2x"
                                                        @if ($log->isPickUp != null) style="color:green" @endif></i>
                                                    <p>Pickup by Courier</p>
                                                </div>

                                                <!-- on the way -->
                                                <div class="col-md-3">
                                                    <i class="fa fa-truck fa-2x"
                                                        @if ($log->isDispatched != null) style="color:green" @endif></i>
                                                    <p>On the way</p>
                                                </div>
                                                <!-- delivered -->
                                                <div class="col-md-3">
                                                    <i class="fas fa-clipboard-check fa-2x"
                                                        @if ($log->isDelivered != null) style="color:green" @endif></i>
                                                    <p>Delivered</p>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    <div id="order-status-container">
                                        <div class="row justify-content-center overflow-hidden">
                                            <!-- <h3>Order Summary</h3> -->
                                            @foreach ($orderLogs as $log)
                                                @if ($shipment->id == $log->shipment_id)
                                                    @if ($log->isCancelled == true)
                                                        <h4 class="fw-bold border-0">CANCELLED</h4>
                                                        <div class="card mb-3" style="background-color: #66D066;">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <h5 class="card-title border-0 fw-bold">YOUR
                                                                        ORDER HAS BEEN
                                                                        CANCELLED</h5>
                                                                    <p class="card-text mb-0">
                                                                        {{ date('Y-m-d h:i A', strtotime($log->isCancelledTime)) }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($log->isDelivered == true)
                                                        <h4 class="fw-bold border-0">DELIVERED</h4>
                                                        <div class="card mb-3" style="background-color: #66D066;">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <h5 class="card-title border-0 fw-bold">YOUR
                                                                        ORDER HAS BEEN
                                                                        DELIVERED</h5>
                                                                    <p class="card-text mb-0">
                                                                        {{ date('Y-m-d h:i A', strtotime($log->isDeliveredTime)) }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($log->isDispatched == true)
                                                        @if ($log->isDelivered != true && $log->isCancelled != true && $log->isDelivered != true)
                                                            <h4 class="fw-bold border-0">IN TRANSIT</h4>
                                                            <div class="card mb-3" style="background-color: #D9D9D9;">
                                                        @endif
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <h5 class="card-title border-0 fw-bold">
                                                                    YOUR ORDER IS OUT
                                                                    FOR DELIVERY</h5>
                                                                <p class="card-text mb-0">
                                                                    {{ date('Y-m-d h:i A', strtotime($log->isDispatchedTime)) }}
                                                                </p>
                                                            </div>
                                                        </div>
                                        </div>
                                        @endif
                                        @if ($log->isArrived == true)
                                            @if ($log->isDispatched != true && $log->isCancelled != true && $log->isDelivered != true)
                                                <h4 class="fw-bold border-0">ARRIVED AT
                                                    {{ $shipment->station_id }}</h4>
                                            @endif
                                            <div class="card mb-3" style="background-color: #D9D9D9;">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <h5 class="card-title border-0 fw-bold">
                                                            YOUR ORDER HAS
                                                            ARRIVED AT SORTING FACILITY</h5>
                                                        <p class="card-text mb-0">
                                                            {{ date('Y-m-d h:i A', strtotime($log->isArrivedTime)) }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($log->isTransferred == true)
                                            @if ($shipment->company_name != null && $shipment->station_id == null)
                                                @if ($log->isArrived != true && $log->isCancelled != true && $log->isDelivered != true)
                                                    <h4 class="fw-bold border-0">TRANSFERRED TO COMPANY:
                                                        {{ $shipment->company_name }}</h4>
                                                @endif
                                                <div class="card mb-3" style="background-color: #D9D9D9;">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <h5 class="card-title border-0 fw-bold">
                                                                YOUR ORDER HAS ALREADY BEEN
                                                                TRANSFERRED TO ANOTHER COMPANY</h5>
                                                            <p class="card-text mb-0">
                                                                {{ date('Y-m-d h:i A', strtotime($log->isTransferredTime)) }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif($shipment->company_name == null && $shipment->station_id != null)
                                                @if ($log->isArrived != true && $log->isCancelled != true && $log->isDelivered != true)
                                                    <h4 class="fw-bold border-0">TRANSFERRED TO STATION:
                                                        {{ $shipment->station_id }}</h4>
                                                @endif
                                                <div class="card mb-3" style="background-color: #D9D9D9;">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <h5 class="card-title border-0 fw-bold">
                                                                YOUR ORDER HAS
                                                                ALREADY BEEN TRANSFERRED TO ANOTHER
                                                                STATION</h5>
                                                            <p class="card-text mb-0">
                                                                {{ date('Y-m-d h:i A', strtotime($log->isTransferredTime)) }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                        @if ($log->isAssort == true)
                                            @if ($log->isTransferred != true && $log->isCancelled != true && $log->isDelivered != true)
                                                <h4 class="fw-bold border-0">ARRIVED AT (current_station)
                                            @endif
                                            </h4>
                                            <div class="card mb-3" style="background-color: #D9D9D9;">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <h5 class="card-title border-0 fw-bold">
                                                            YOUR ORDER IS
                                                            ALREADY BEEN ARRIVED TO THE SORTING FACILITY
                                                        </h5>
                                                        <p class="card-text mb-0">
                                                            {{ date('Y-m-d h:i A', strtotime($log->isAssortTime)) }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($log->isPickUp == true)
                                            @if ($log->isAssort == false && $log->isCancelled != true && $log->isDelivered != true)
                                                <h4 class="fw-bold border-0">PICKED UP</h4>
                                            @endif
                                            <div class="card mb-3" style="background-color: #D9D9D9;">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <h5 class="card-title border-0 fw-bold">
                                                            YOUR ORDER IS
                                                            ALREADY BEEN PICKED UP BY LOGISTIC
                                                            COMPANY</h5>
                                                        <p class="card-text mb-0">
                                                            {{ date('Y-m-d h:i A', strtotime($log->isPickUpTime)) }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($log->isProcessed == true && $log->isCancelled != true && $log->isDelivered != true)
                                            <div class="card mb-3" style="background-color: #D9D9D9;">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <h5 class="card-title border-0 fw-bold">
                                                            YOUR ORDER IS
                                                            CURRENTLY BEING PROCESSED</h5>
                                                        <p class="card-text mb-0">
                                                            {{ date('Y-m-d h:i A', strtotime($log->isProcessedTime)) }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($log->isPending == true && $log->isCancelled != true && $log->isDelivered != true)
                                            <div class="card mb-3" style="background-color: #D9D9D9;">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <h5 class="card-title border-0 fw-bold">
                                                            YOUR ORDER IS
                                                            CURRENTLY PENDING</h5>
                                                        <p class="card-text mb-0">
                                                            {{ date('Y-m-d h:i A', strtotime($log->isPendingTime)) }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>



<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script type="text/javascript">
    let trackingTable = new DataTable("#tracking-table");
</script>
