    <head>
        <link rel="stylesheet" href="{{ asset('css/style_order.css') }}">
        <link rel="stylesheet" href="./line-awesome.min.css">
        <title>Customer | Order Tracking #{{ $ship->id }}</title>
    </head>
    {{-- @include('partials.navigation', ['waybill' => 'fw-bold']) --}}
    @include('partials.header')
    @extends('layouts.app')
    @include('partials.navigationUser', ['order' => 'nav-selected'])

    <style>
        th {
            background-color: white !important;
            color: black;
        }

        td {
            text-align: left !important;
            padding: 5px;
            color: #214D94;
        }
    </style>

    {{-- ORDER CONTAINER RECONCEPTUALIZE --}}
    <main class="container mw-100 py-5" style="margin-top:-49px !important">
        <div class="order-container container mw-100 px-0">
            <div class="mt-3">
                <h2 class="text-dark" style="border-bottom: 2px solid black; padding-bottom: 5px; letter-spacing:1px;">ORDER TRACKING #{{ $ship->id }}</h2>
            </div>
            <div class="cards-holder">
                <card class="item-card bg-white btn-wrapper p-4 mw-100">
                    {{-- START OF ORDER DETAILS --}}
                    <!-- Mobile Sender and Receiver -->
                    <div class="row overflow-hidden">
                        <!-- Product Information -->
                        <div class="col-xl-9">
                            <div class="row overflow-hidden">
                                <div class="col-lg-6 pt-2">
                                    <table style="width:100%">
                                        <tr>
                                            <th colspan="2">
                                                <h5 class="fw-bold opacity-75 text-warning">SENDER</h5>
                                            </th>
                                            <!-- This code is here because of nagiging vertical yung sender -->
                                        </tr>
                                        <tr>
                                            <th width="40%" class="fw-normal">Name:</th>
                                            <td width="60%" class="fw-bold">{{ $ship->sender->sender_name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="fw-normal">Address:</th>
                                            <td class="fw-bold">{{ $ship->sender->sender_address }} ,
                                                {{ $ship->sender->sender_city }} ,
                                                {{ $ship->sender->sender_state }} ,
                                                {{ $ship->sender->sender_zip }}</td>
                                        </tr>
                                        <tr>
                                            <th class="fw-normal">Contact Number:</th>
                                            <td class="fw-bold">{{ $ship->sender->sender_mobile }} @if ($ship->sender->sender_tel != null)
                                                    | {{ $ship->sender->sender_tel }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="fw-normal">Email:</th>
                                            <td class="fw-bold">{{ $ship->sender->sender_email }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <hr class="opacity-75 d-block d-lg-none">
                                <div class="col-lg-6 pt-2">
                                    <table style="width:100%">
                                        <tr>
                                            <th colspan="2">
                                                <h5 class="fw-bold opacity-75 text-warning">RECEIVER</h5>
                                            </th>
                                            <!-- This code is here because of nagiging vertical yung sender -->
                                        </tr>
                                        <tr>
                                            <th width="40%" class="fw-normal">Name:</th>
                                            <td width="60%" class="fw-bold">{{ $ship->recipient->recipient_name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="fw-normal">Address:</th>
                                            <td class="fw-bold">{{ $ship->recipient->recipient_address }} ,
                                                {{ $ship->recipient->recipient_city }} ,
                                                {{ $ship->recipient->recipient_state }} ,
                                                {{ $ship->recipient->recipient_zip }}</td>
                                        </tr>
                                        <tr>
                                            <th class="fw-normal">Contact Number:</th>
                                            <td class="fw-bold">{{ $ship->recipient->recipient_mobile }} @if ($ship->recipient->recipient_tel != null)
                                                    | {{ $ship->recipient->recipient_tel }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="fw-normal">Email:</th>
                                            <td class="fw-bold">{{ $ship->recipient->recipient_email }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <hr class="opacity-75">
                                </div>
                            </div>
                            <div class="row">
                                <h5 class="fw-bold opacity-75 text-warning">PARCEL INFORMATION</h5>
                                <div class="col-lg-6 pt-2">
                                    <table style="width:100%">
                                        <tr>
                                            <th class="fw-normal">Size & Weight:</th>
                                            <td class="fw-bold">{{ intval($ship->length) }}x{{ intval($ship->width) }}x{{ intval($ship->height) }}
                                                | {{ intval($ship->weight) }}Kg</td>
                                        </tr>
                                        @if ($ship->bid_amount != null && $ship->company_id != null)
                                            <tr>
                                                <th class="fw-normal">Company:</th>
                                                <td class="fw-bold">{{ $company_name }}</td>
                                            </tr>
                                        @endif
                                    </table>
                                </div>
                                <div class="col-lg-6">
                                    <table style="width:100%">
                                        <tr>
                                            <th class="fw-normal">Mode of Payment:</th>
                                            <td class="fw-bold">{{$ship->mop}}</td>
                                        </tr>
                                        @if ($ship->bid_amount != null && $ship->company_id != null)
                                            <tr>
                                                <th class="fw-normal">Bid Amount:</th>
                                                <td class="fw-bold">{{ $ship->bid_amount }}</td>
                                            </tr>
                                        @endif
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 d-xl-none">
                                    <hr class="opacity-75">
                                </div>
                            </div>
                        </div>

                        <!-- Product Image -->
                        <div class="col-xl-3 text-center">
                            <a href="{{asset($ship->photo)}}" target="_blank">
                                <img src="{{asset($ship->photo)}}"
                                class="card shadow-0 w-100"
                                alt=""
                                style="object-fit:cover; min-width:140px; max-width:509px; height:250px; margin-left: auto; margin-right: auto;">
                            </a>
                            <a href="{{ route('user.generate', $ship->id) }}" target="_blank">
                                <button type="button" class="btn btn-primary btn-block shadow-0 my-1"
                                    style="background-color:#214D94; min-width:140px; max-width:509px;">
                                    Invoice
                                </button>
                            </a>
                            <a href="{{ route('user.generateWaybill', $ship->id) }}" target="_blank">
                                <button type="button" class="btn btn-warning btn-block shadow-0 my-1"
                                    style="min-width:140px; max-width:509px;">
                                    Waybill
                                </button>
                            </a>
                            <a href="{{route('viewOrder', $ship->id)}}">
                                <div class="my-1">
                                    <button type="button" class="btn btn-block btn-light shadow-0 mb-1 border" style="min-width:140px; max-width:509px;">
                                    Back
                                    </button>
                                </div>
                            </a>
                        </div>
                    </div>
                    <hr class="opacity-75">
                    {{-- END OF ORDER DETAILS --}}

                    {{-- TRACKING ORDER START --}}
                    <div id="order-status-container">
                        <div class="row justify-content-center overflow-hidden">
                            <div class="col-md-10">
                                <!-- <h3>Order Summary</h3> -->
                                @foreach ($logs as $log)
                                    @if ($ship->id == $log->shipment_id)
                                        @if ($log->isDelivered == true)
                                            <h4 class="fw-bold border-0">DELIVERED</h4>
                                            <div class="card mb-3" style="background-color: #66D066;">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-2 d-none d-lg-block">
                                                            <span
                                                                class="bg-light rounded-circle d-flex align-items-center justify-content-center bg-dark"
                                                                style="width:80px; height:80px;">
                                                                <i class="bi bi-archive-fill fa-3x"
                                                                    style="color: #66D066;"></i>
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-5">
                                                            <h5 class="card-title border-0 fw-bold">YOUR ORDER HAS BEEN
                                                                DELIVERED</h5>
                                                            <p class="card-text mb-0">
                                                                {{ date('Y-m-d h:i A', strtotime($log->isDeliveredTime)) }}
                                                            </p>

                                                        </div>
                                                        <div class="col-lg-5 mt-lg-5 text-sm-end">
                                                            <p class="card-text mb-0">Company:</p>
                                                            <h5 class="card-title fw-bold mb-0">{{ $company_name }}
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($log->isDispatched == true)
                                            <h4 class="fw-bold border-0">IN TRANSIT</h4>
                                            <div class="card mb-3" style="background-color: #D9D9D9;">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-2 d-none d-lg-block">
                                                            <span
                                                                class="bg-light rounded-circle d-flex align-items-center justify-content-center bg-dark"
                                                                style="width:80px; height:80px;">
                                                                <i class="fa fa-truck fa-3x"
                                                                    style="color: #D9D9D9;"></i>
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-5">
                                                            <h5 class="card-title border-0 fw-bold">YOUR ORDER IS OUT
                                                                FOR DELIVERY</h5>
                                                            <p class="card-text mb-0">
                                                                {{ date('Y-m-d h:i A', strtotime($log->isDispatchedTime)) }}
                                                            </p>
                                                        </div>
                                                        <div class="col-lg-5 mt-lg-5 text-sm-end">
                                                            <p class="card-text mb-0">Company:</p>
                                                            <h5 class="card-title fw-bold mb-0">{{ $company_name }}
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($log->isArrived == true)
                                            <h4 class="fw-bold border-0">ARRIVED AT {{ $ship->station_id }}</h4>
                                            <div class="card mb-3" style="background-color: #D9D9D9;">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-2 d-none d-lg-block">
                                                            <span
                                                                class="bg-light rounded-circle d-flex align-items-center justify-content-center bg-dark"
                                                                style="width:80px; height:80px;">
                                                                <i class="fa fa-sort fa-3x"
                                                                    style="color: #D9D9D9;"></i>
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-5">
                                                            <h5 class="card-title border-0 fw-bold">YOUR ORDER HAS
                                                                ARRIVED AT SORTING FACILITY</h5>
                                                            <p class="card-text mb-0">
                                                                {{ date('Y-m-d h:i A', strtotime($log->isArrivedTime)) }}
                                                            </p>

                                                        </div>
                                                        <div class="col-lg-5 mt-lg-5 text-sm-end">
                                                            <p class="card-text mb-0">Company:</p>
                                                            <h5 class="card-title fw-bold mb-0">{{ $company_name }}
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($log->isTransferred == true)
                                            <h4 class="fw-bold border-0">TRANSFERRED TO STATION:
                                                {{ $ship->station_id }}</h4>
                                            <div class="card mb-3" style="background-color: #D9D9D9;">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-2 d-none d-lg-block">
                                                            <span
                                                                class="bg-light rounded-circle d-flex align-items-center justify-content-center bg-dark"
                                                                style="width:80px; height:80px;">
                                                                <i class="fa fa-scanner-gun fa-3x"
                                                                    style="color: #D9D9D9;"></i>
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-5">
                                                            <h5 class="card-title border-0 fw-bold">YOUR ORDER HAS
                                                                ALREADY BEEN TRANSFERRED TO ANOTHER STATION</h5>
                                                            <p class="card-text mb-0">
                                                                {{ date('Y-m-d h:i A', strtotime($log->isTransferredTime)) }}
                                                            </p>

                                                        </div>
                                                        <div class="col-lg-5 mt-lg-5 text-sm-end">
                                                            <p class="card-text mb-0">Company:</p>
                                                            <h5 class="card-title fw-bold mb-0">{{ $company_name }}
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($log->isAssort == true)
                                            <h4 class="fw-bold border-0">ARRIVED AT (current_station)</h4>
                                            <div class="card mb-3" style="background-color: #D9D9D9;">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-2 d-none d-lg-block">
                                                            <span
                                                                class="bg-light rounded-circle d-flex align-items-center justify-content-center bg-dark"
                                                                style="width:80px; height:80px;">
                                                                <i class="fa fa-hand-holding fa-3x"
                                                                    style="color: #D9D9D9;"></i>
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-5">
                                                            <h5 class="card-title border-0 fw-bold">YOUR ORDER IS
                                                                ALREADY BEEN PICKED UP BY LOGISTIC COMPANY</h5>
                                                            <p class="card-text mb-0">
                                                                {{ date('Y-m-d h:i A', strtotime($log->isAssortTime)) }}
                                                            </p>

                                                        </div>
                                                        <div class="col-lg-5 mt-lg-5 text-sm-end">
                                                            <p class="card-text mb-0">Company:</p>
                                                            <h5 class="card-title fw-bold mb-0">{{ $company_name }}
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($log->isPickUp == true)
                                            <h4 class="fw-bold border-0">PICKED UP</h4>
                                            <div class="card mb-3" style="background-color: #D9D9D9;">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-2 d-none d-lg-block">
                                                            <span
                                                                class="bg-light rounded-circle d-flex align-items-center justify-content-center bg-dark"
                                                                style="width:80px; height:80px;">
                                                                <i class="bi bi-archive-fill fa-3x"
                                                                    style="color: #D9D9D9;"></i>
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-5">
                                                            <h5 class="card-title border-0 fw-bold">YOUR ORDER IS
                                                                ALREADY BEEN PICKED UP BY LOGISTIC COMPANY</h5>
                                                            <p class="card-text mb-0">
                                                                {{ date('Y-m-d h:i A', strtotime($log->isPickUpTime)) }}
                                                            </p>

                                                        </div>
                                                        <div class="col-lg-5 mt-lg-5 text-sm-end">
                                                            <p class="card-text mb-0">Company:</p>
                                                            <h5 class="card-title fw-bold mb-0">{{ $company_name }}
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($log->isProcessed == true)
                                            <h4 class="fw-bold border-0">PROCESSING</h4>
                                            <div class="card mb-3" style="background-color: #D9D9D9;">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-2 d-none d-lg-block">
                                                            <span
                                                                class="bg-light rounded-circle d-flex align-items-center justify-content-center bg-dark"
                                                                style="width:80px; height:80px;">
                                                                <i class="fa fa-hand-holding fa-3x"
                                                                    style="color: #D9D9D9;"></i>
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-5">
                                                            <h5 class="card-title border-0 fw-bold">YOUR ORDER IS
                                                                CURRENTLY BEING PROCESSED</h5>
                                                            <p class="card-text mb-0">
                                                                {{ date('Y-m-d h:i A', strtotime($log->isProcessedTime)) }}
                                                            </p>

                                                        </div>
                                                        <div class="col-lg-5 mt-lg-5 text-sm-end">
                                                            <p class="card-text mb-0">Company:</p>
                                                            <h5 class="card-title fw-bold mb-0">{{ $company_name }}
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($log->isPending == true)
                                            <h4 class="fw-bold border-0">PENDING</h4>
                                            <div class="card mb-3" style="background-color: #D9D9D9;">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-2 d-none d-lg-block">
                                                            <span
                                                                class="bg-light rounded-circle d-flex align-items-center justify-content-center bg-dark"
                                                                style="width:80px; height:80px;">
                                                                <i class="bi bi-check-circle-fill fa-3x"
                                                                    style="color: #D9D9D9;"></i>
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-5">
                                                            <h5 class="card-title border-0 fw-bold">YOUR ORDER IS
                                                                CURRENTLY PENDING</h5>
                                                            <p class="card-text mb-0">
                                                                {{ date('Y-m-d h:i A', strtotime($log->isPendingTime)) }}
                                                            </p>

                                                        </div>
                                                        <div class="col-lg-5 mt-lg-5 text-sm-end">
                                                            <p class="card-text mb-0">Company:</p>
                                                            <h5 class="card-title fw-bold mb-0">{{ $company_name }}
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    {{-- END OF TRACKING ORDER --}}
                </card>
            </div>
        </div>
    </main>
        {{-- END OF ORDER CONTAINER --}}
