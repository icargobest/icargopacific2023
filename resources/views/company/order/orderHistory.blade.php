@include('partials.header')
@extends('layouts.app') @include('partials.navigationCompany', ['history' => 'nav-selected'])

<title>Company | Order History</title>
<main class="container py-5" style="margin-top: -49px !important;">
    <div class="shadow"></div>
    <div class="mt-4 driver-order-header py-2 px-4">
        <h3 class=""
            style="
                letter-spacing: 1px;
                margin-bottom: 0px !important;
            ">
            Order History
        </h3>
    </div>
    <div class="main-wrapper shadow" style="background-color:white;">
        {{-- <section class="search-filter-container mb-4">
            <div class="top-container1" style="max-width: 800px; margin-top: 15px">
                <h5 class="fw-normal mb-2 d-inline">SEARCH:</h5>
                <div class="input-group rounded">
                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                        aria-describedby="search-addon" style="background-color: white" />
                    <span class="input-group-text border-0" id="search-addon">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>
        </section> --}}

        <div class="mt-2">@include('flash-message')</div>

        <div class="table-container">
            <table class="table table-striped history-table border border-2 shadow table-borderless hover"
                id="companyorderhistorytable">
                <thead>
                    <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Pickup</th>
                        <th scope="col">Dropoff</th>
                        <th scope="col">Order Date</th>
                        <th scope="col">Delivered Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="history-tbody">
                    @foreach ($shipments as $shipment)
                        @if (Auth::user()->type == 'company')
                            @if ($shipment->status == 'Delivered')
                                <tr>
                                    <td>{{ $shipment->id }}</td>
                                    <td>
                                        <img src="{{ asset($shipment->photo) }}" alt="photo" />
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
                                    @foreach ($orderLogs as $log)
                                        @if ($log->shipment_id == $shipment->id)
                                            <td>
                                                {{ date('Y-m-d h:i A', strtotime($log->isPendingTime)) }}
                                            </td>
                                            <td>
                                                {{ date('Y-m-d h:i A', strtotime($log->isDeliveredTime)) }}
                                            </td>
                                            <td class="" style="overflow: auto">
                                                <label class="status-deliveredv2">
                                                    Delivered
                                                </label>
                                            </td>
                                        @endif
                                    @endforeach
                                    <td>
                                        @include('order.show')
                                    </td>
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
    let companyorderhistorytable = new DataTable("#companyorderhistorytable");
</script>

@include('partials.footer')
