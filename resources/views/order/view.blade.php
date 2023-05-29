    <head>
        <title>Customer | Order Details #{{ $ship->id }}</title>
    </head>
    <style>
    </style>

    {{-- @include('partials.navigation', ['waybill' => 'fw-bold']) --}}
    @include('partials.header')
    @extends('layouts.app')
    @include('partials.navigationUser', ['order' => 'nav-selected'])
    {{-- ORDER CONTAINER RECONCEPTUALIZE --}}
    <main class="container py-5" style="margin-top:-49px !important">
        <div class="mt-4">
            <h2 class="" style="border-bottom: 2px solid black; padding-bottom: 5px; letter-spacing:1px;">MY ITEM
                #{{ $ship->id }}</h3>
        </div>
        <div class="order-container container mt-0 px-0">
            <div class="cards-holder">
                <card class="item-card bg-white btn-wrapper p-4">
                    <!-- Mobile Sender and Receiver -->
                    <div class="row overflow-hidden">
                        <!-- Product Information -->
                        <div class="col-xl-9">
                            <div class="row overflow-hidden">
                                <div class="col-lg-6 pt-2">
                                    <table style="width:100%" class="senderInfo">
                                        <tr>
                                            <th colspan="2">
                                                <h5 class="fw-bold opacity-75 text-warning">SENDER</h5>
                                            </th> <!-- This code is here because of nagiging vertical yung sender -->
                                        </tr>
                                        <tr>
                                            <th width="40%" class="fw-normal">Name:</th>
                                            <td width="60%" class="fw-bold">{{ $ship->sender->sender_name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="fw-normal">Address:</th>
                                            <td class="fw-bold">{{ $ship->sender->sender_address }} ,
                                                {{ $ship->sender->sender_city }} ,
                                                {{ $ship->sender->sender_state }} , {{ $ship->sender->sender_zip }}</td>
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
                                            </th> <!-- This code is here because of nagiging vertical yung sender -->
                                        </tr>
                                        <tr>
                                            <th width="40%" class="fw-normal">Name:</th>
                                            <td width="60%" class="fw-bold">{{ $ship->recipient->recipient_name }}
                                            </td>
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
                                            <th width="40%" class="fw-normal">ID:</th>
                                            <td width="60%" class="fw-bold">{{ $ship->id }}</td>
                                        </tr>
                                        <tr>
                                            <th class="fw-normal">Size & Weight:</th>
                                            <td class="fw-bold">
                                                {{ intval($ship->length) }}x{{ intval($ship->width) }}x{{ intval($ship->height) }}
                                                | {{ intval($ship->weight) }}Kg</td>
                                        </tr>
                                        @if ($ship->bid_amount != null && $ship->company_id != null)
                                            <tr>
                                                <th class="fw-normal">Bid Amount:</th>
                                                <td class="fw-bold">{{ $ship->bid_amount }}</td>
                                            </tr>
                                        @endif
                                    </table>
                                </div>
                                <div class="col-lg-6">
                                    <table style="width:100%">
                                        <tr>
                                            <th width="40%" class="fw-normal">Mode of Payment:</th>
                                            <td width="60%" class="fw-bold">{{ $ship->mop }}</td>
                                        </tr>
                                        @if ($ship->bid_amount != null && $ship->company_id != null)
                                            <tr>
                                                <th class="fw-normal">Company:</th>
                                                <td class="fw-bold">{{ $company_name }}</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <th class="fw-normal">Maximum Bid:</th>
                                                <td class="fw-bold">{{ $ship->min_bid_amount }}</td>
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
                            <div>
                                <a href="{{ asset($ship->photo) }}" target="_blank">
                                    <img src="{{ asset($ship->photo) }}" class="card shadow-0 w-100" alt=""
                                        style="object-fit:cover; min-width:140px; max-width:509px;  height:250px; margin-left: auto; margin-right: auto;">
                                </a>
                                @if ($ship->company_bid == null && $ship->bid_amount == null)
                                    @if ($ship->status != 'Cancelled')
                                        <a href="{{ route('userOrderPanel') }}">
                                            <div class="my-1">
                                                <button type="button" class="btn btn-block btn-light"
                                                    style="min-width:140px; max-width:509px; border-color:#214D94;">
                                                    BACK
                                                </button>
                                            </div>
                                        </a>
                                        @if (!$bid)
                                            <a href="{{ route('edit_order', $ship->id) }}">
                                                <button type="button" class="btn btn-primary btn-block shadow-0 my-1"
                                                    style="background-color:#214D94; min-width:140px; max-width:509px;">
                                                    Edit
                                                </button>
                                            </a>
                                        @endif
                                        <form method="POST" action="{{ route('cancelOrder', $ship->id) }}">
                                            @csrf
                                            @method('PUT')
                                            @include('order.cancel')
                                        </form>
                                    @endif
                                @endif
                                @if (
                                    $ship->company_id != null &&
                                        $ship->bid_amount != null &&
                                        $ship->status != 'Cancelled' &&
                                        $ship->status != 'Delivered')
                                    <div class="pt-2">
                                        <a href="{{ route('trackOrder', $ship->id) }}">
                                            <button type="button" class="btn btn-primary btn-block shadow-0 my-1"
                                                style="min-width:140px; max-width:509px; background-color: #214D94;">
                                                Track Item</button>
                                        </a>
                                    </div>
                                    <a href="{{ route('userOrderPanel') }}">
                                        <div class="my-1">
                                            <button type="button" class="btn btn-block btn-light border"
                                                style="min-width:140px; max-width:509px;">
                                                BACK
                                            </button>
                                        </div>
                                    </a>
                                @endif
                            </div>

                        </div>
                    </div>
                    <hr class="opacity-75">
                    <!-- table starts here -->
                    <section class="overflow-auto">
                        <table class="table table-striped table-hover">
                            <thead class="text-white" style="background-color: #214D94;">
                                <tr class="text-warning">
                                    <th class="text-center">COMPANY</th>
                                    <th class="text-center">BID</th>
                                    <th class="text-center">DATE</th>
                                    <th class="text-center">ACTION</th>
                                </tr>
                            </thead>
                            @foreach ($bids as $bid)
                                @if ($ship->id == $bid->shipment_id)
                                    <form action="{{ route('acceptBid', $bid->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="shipment_id" value="{{ $ship->id }}">
                                        <tbody>
                                            <tr>
                                                <td class="text-center"><strong>{{ $bid->company_name }}</strong></td>
                                                <td class="text-center">{{ $bid->bid_amount }}</td>
                                                <td class="text-center">{{ date('Y-m-d h:i A', strtotime($bid->created_at)) }}</td>
                                                <td class="text-center">{{ $bid->status }}</td>
                                                @if ($bids->where('shipment_id', $bid->shipment_id)->contains('status', 'Accepted') || $ship->status == 'Cancelled')
                                                    <td class="text-center"><button tpye="submit"
                                                            class="btn btn-success btn-sm" disabled>Accept</button>
                                                    </td>
                                                @else
                                                    <td class="text-center"><button tpye="submit"
                                                            class="btn btn-success btn-sm">Accept</button></td>
                                                @endif
                                            </tr>
                                        </tbody>
                                    </form>
                                @endif
                            @endforeach
                        </table>
                    </section>
                </card>
            </div>
        </div>
    </main>

    {{-- END OF ORDER CONTAINER --}}
    <style>
        th {
            background-color: white !important;
            color: black;
        }

        td {
            text-align: left;
            padding: 5px;
            color: #214D94;
        }
    </style>
