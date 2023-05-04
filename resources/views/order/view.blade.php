    <head>
        <title>Customer | Order Details #{{ $ship->id }}</title>
    </head>

    {{-- @include('partials.navigation', ['waybill' => 'fw-bold']) --}}
    @include('layouts.app')
    @include('partials.navigationUser', ['order' => 'nav-selected'])

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
    {{-- ORDER CONTAINER RECONCEPTUALIZE --}}
    <div class="order-container container">
        <h4 class="text-dark">MY ITEM #{{ $ship->id }}</h4>
        <div class="cards-holder">
            <card class="item-card bg-white btn-wrapper p-4">
                <!-- Mobile Sender and Receiver -->
                <div class="row overflow-auto">
                    <!-- Product Information -->
                    <div class="col-xl-9">
                        <div class="row">
                            <div class="col-lg-6 pt-2">
                                <table style="width:100%">
                                    <tr>
                                        <th colspan="2">
                                            <h5 class="fw-bold opacity-75">SENDER</h5>
                                        </th> <!-- This code is here because of nagiging vertical yung sender -->
                                    </tr>
                                    <tr>
                                        <th width="40%">Name:</th>
                                        <td width="60%">{{ $ship->sender->sender_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address:</th>
                                        <td>{{ $ship->sender->sender_address }} , {{ $ship->sender->sender_city }} ,
                                            {{ $ship->sender->sender_state }} , {{ $ship->sender->sender_zip }}</td>
                                    </tr>
                                    <tr>
                                        <th>Contact Number:</th>
                                        <td>{{ $ship->sender->sender_mobile }} @if ($ship->sender->sender_tel != null)
                                                | {{ $ship->sender->sender_tel }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Email:</th>
                                        <td>{{ $ship->sender->sender_email }}</td>
                                    </tr>
                                </table>
                                </table>
                            </div>
                            <div class="col-lg-6 pt-2">
                                <table style="width:100%">
                                    <tr>
                                        <th colspan="2">
                                            <h5 class="fw-bold opacity-75">RECEIVER</h5>
                                        </th> <!-- This code is here because of nagiging vertical yung sender -->
                                    </tr>
                                    <tr>
                                        <th width="40%">Name:</th>
                                        <td width="60%">{{ $ship->recipient->recipient_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address:</th>
                                        <td>{{ $ship->recipient->recipient_address }} ,
                                            {{ $ship->recipient->recipient_city }} ,
                                            {{ $ship->recipient->recipient_state }} ,
                                            {{ $ship->recipient->recipient_zip }}</td>
                                    </tr>
                                    <tr>
                                        <th>Contact Number:</th>
                                        <td>{{ $ship->recipient->recipient_mobile }} @if ($ship->recipient->recipient_tel != null)
                                                | {{ $ship->recipient->recipient_tel }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Email:</th>
                                        <td>{{ $ship->recipient->recipient_email }}</td>
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
                            <h5 class="fw-bold opacity-75">PARCEL INFORMATION</h5>
                            <div class="col-lg-6 pt-2">
                                <table style="width:100%">
                                    <tr>
                                        <th width="40%">ID:</th>
                                        <td width="60%">{{ $ship->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Size & Weight:</th>
                                        <td>{{ intval($ship->length) }}x{{ intval($ship->width) }}x{{ intval($ship->height) }}
                                            | {{ intval($ship->weight) }}Kg</td>
                                    </tr>
                                    @if ($ship->bid_amount != null && $ship->company_id != null)
                                        @foreach ($bids as $bid)
                                            @if ($ship->company_id == $bid->company_id)
                                                @if ($bid->status == 'Accepted')
                                                    <tr>
                                                        <th>Company Bid:</th>
                                                        <td>{{ $bid->user->name }}</td>
                                                    </tr>
                                                @endif
                                            @endif
                                        @endforeach
                                    @endif
                                </table>
                            </div>
                            <div class="col-lg-6">
                                <table style="width:100%">
                                    <tr>
                                        <th width="40%">Category:</th>
                                        <td width="60%">{{ $ship->category }}</td>
                                    </tr>
                                    <tr>
                                        <th>Mode of Payment:</th>
                                        <td>COD</td>
                                    </tr>
                                    @if ($ship->bid_amount != null && $ship->company_id != null)
                                        <tr>
                                            <th>Bid Amount:</th>
                                            <td>{{ $ship->bid_amount }}</td>
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
                    <div class="col-xl-3">
                        <div>
                            <img src="{{ asset($ship->photo) }}" class="card shadow-0 img-size w-100"
                                style="object-fit:contain; min-width:140px; max-width:509px; ">
                            @if ($ship->company_bid == null && $ship->bid_amount == null)
                                @if ($ship->status != 'Cancelled')
                                    <a href="">
                                        <button type="button" class="btn btn-primary primary btn-block shadow-0 my-1"
                                            style="min-width:140px; max-width:509px;">
                                            Edit
                                        </button>
                                    </a>
                                    <form method="POST" action="{{ route('cancelOrder', $ship->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-danger btn-block shadow-0 my-1"
                                            style="min-width:140px; max-width:509px;">
                                            Cancel Order
                                        </button>
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
                                        <button type="button" class="btn btn-primary btn-block"
                                            style="min-width:140px; max-width:509px; background-color: #214D94;">
                                            Track Item</button>
                                    </a>
                                </div>
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
                                <th>COMPANY</th>
                                <th>BID</th>
                                <th>DATE</th>
                                <th>ACTION</th>
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
                                            <td>{{ $bid->user->name }}</td>
                                            <td>{{ $bid->bid_amount }}</td>
                                            <td>{{ $bid->status }}</td>
                                            @if ($bids->where('shipment_id', $bid->shipment_id)->contains('status', 'Accepted') || $ship->status == 'Cancelled')
                                                <td><button tpye="submit" class="btn btn-success btn-sm"
                                                        disabled>Accept</button></td>
                                            @else
                                                <td><button tpye="submit"
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
    </div>
    {{-- END OF ORDER CONTAINER --}}
