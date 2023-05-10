@extends('layouts.app')
@include('partials.navigationCompany', ['history' => 'nav-selected'])
    <link rel="stylesheet" href="{{ asset('css/driver&dispatcher.css') }}">

<title>Company | Order History</title>
<main class="container py-5" style="margin-top:-49px !important">
    <div class="mt-4">
        <h2 class="" style="border-bottom: 2px solid black; padding-bottom: 5px; letter-spacing:1px;">ORDER HISTORY
            </h3>
    </div>
    <div class="main-wrapper" style=" max-width:">

        <section class="search-filter-container mb-4">

            <div class="top-container1" style="max-width: 800px; margin-top: 15px">
                <h5 class="fw-normal mb-2 d-inline">SEARCH:</h5>
                <div class="input-group rounded">
                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                        aria-describedby="search-addon" style="background-color: white">
                    <span class="input-group-text border-0" id="search-addon">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>


        </section>

        <div class="mt-2">
            @include('flash-message')
        </div>


        <div class="table-container">
            <table class="table table-striped history-table border border-2 shadow">
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
                        @if (Auth::user()->type == 'company')
                            @if (Auth::user()->id == $shipment->company_id)
                                @if ($shipment->status == 'Delivered')
                                    <tr>
                                        <td>{{ $shipment->id }}</td>
                                        <td>
                                            <img src="{{ asset($shipment->photo) }}" alt="photo" />
                                        </td>
                                        <td>{{ $shipment->sender->sender_address }},
                                            {{ $shipment->sender->sender_city }}, {{ $shipment->sender->sender_state }},
                                            {{ $shipment->sender->sender_zip }}</td>
                                        <td>{{ $shipment->recipient->recipient_address }},
                                            {{ $shipment->recipient->recipient_city }},
                                            {{ $shipment->recipient->recipient_state }},
                                            {{ $shipment->recipient->recipient_zip }}</td>
                                        <td>{{ intval($shipment->length) }}x{{ intval($shipment->width) }}x{{ intval($shipment->height) }}
                                            | {{ intval($shipment->weight) }}Kg</td>
                                        @foreach ($orderLogs as $log)
                                            @if ($log->shipment_id == $shipment->id)
                                                <td>{{ date('Y-m-d h:i:s A', strtotime($log->isPendingTime)) }}</td>
                                                <td>{{ date('Y-m-d h:i:s A', strtotime($log->isDeliveredTime)) }}
                                                </td>
                                                <td class="" style="overflow:auto;">
                                                    <label class="status-deliveredv2">
                                                        Delivered
                                                    </label>
                                                </td>
                                            @endif
                                        @endforeach
                                    </tr>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</main>


@include('partials.footer')
