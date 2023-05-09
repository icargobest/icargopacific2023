<head>
    <link rel="stylesheet" href="{{ asset('css/style_order.css') }}">
    <title>Customer | Order Details #{{ $ship->id }}</title>
</head>

{{-- @include('partials.navigation', ['waybill' => 'fw-bold']) --}}
    @extends('layouts.app')
    @include('partials.navigationCompany')

<!-- MDB -->
<link rel="stylesheet" href="/css/mdb.min.css" />

<style>
    th {
        background-color: transparent !important;
        color: black;
        font-weight: normal;
    }

    td {
        text-align: left;
        font-weight: bold;
    }
</style>

{{-- ORDER BUTTON CONTAINER RECONCEPTUALIZE --}}
<!-- Exp start -->
<!-- <button type="button" class="btn text-white mb-1" style="background-color:#214D94;" data-bs-toggle="modal" data-bs-target="#viewModal{{ $ship->id }}">
VIEW
</button> -->

{{-- ORDER CONTAINER RECONCEPTUALIZE --}}
<!-- tracking modal -->
<!-- <div class="modal fade" id="viewModal{{ $ship->id }}" aria-hidden="true" aria-labelledby="trackingModalToggleLabel" tabindex="-1" data-bs-backdrop="true" > -->
<div class="container">
    <div class="modal-dialog modal-dialog-centered modal-xxl">
        <div class="modal-content">
            <div class="modal-header">
                <!-- title -->
                <h3 class="modal-title mb-0 p-2" id="trackingModalToggleLabel">Order Details #{{ $ship->id }}</h3>
                <!-- close button -->
                <!-- <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            {{-- CARD CREATED AFTER FILLING UP --}}
            <!-- modal content -->
            <div class="modal-body p-2">
                <div class="container">
                    <!-- Column for Product Image and Product Info -->
                    <div class="row overflow-hidden">
                        <!-- Product Image -->
                        <div class="col-xl-3">
                            <a href="{{asset($ship->photo)}}" target="_blank">
                                <img class="card shadow-0 w-100" style="object-fit:cover; height:250px;" src="{{asset($ship->photo)}}" alt="">
                            </a>
                                <div class="d-flex justify-content-center">
                                <button class="btn btn-warning opacity-50 w-75 my-3 px-3 py-2 btn-block" disabled>
                                    @if ($ship->company_bid == null && $ship->bid_amount == null)
                                        <h6 class="mb-0 fw-bold text-capitalize">Maximum Bid: Php
                                            {{ $ship->min_bid_amount }}
                                        </h6>
                                    @else
                                        <h6 class="mb-0 fw-bold text-capitalize">Company: {{ $company_name }}</h6>
                                    @endif
                                </button>
                            </div>
                            <div class="row align-items-end">
<<<<<<< HEAD
                                {{-- TRACK ORDER--}}
                                @if($ship->company_id != NULL && $ship->bid_amount != NULL && $ship->status != 'Cancelled' && $ship->status != 'Delivered')
                                <div class="col-md-12 d-flex justify-content-center">
                                    <a href="{{route('trackOrder_Company',$ship->id)}}" class="btn text-white btn-block " style="background-color:#214D94;">
                                        Track Order
=======
                                {{-- TRACK ORDER --}}
                                @if (
                                    $ship->company_id != null &&
                                        $ship->bid_amount != null &&
                                        $ship->status != 'Cancelled' &&
                                        $ship->status != 'Delivered')
                                    <div class="col-md-12 d-flex justify-content-center">
                                        <a href="{{ route('trackOrder_Company', $ship->id) }}"
                                            class="btn btn-primary btn-block " style="background-color:#214D94;">
                                            Track Order
                                        </a>
                                    </div>
                                    <a class="cardItem my-1" href="{{route('freightPanel')}}">
                                        <div  class="d-flex justify-content-center">
                                            <button type="button" class="btn btn-block btn-dark shadow-0 text-white mb-1">
                                            BACK
                                            </button>
                                        </div>
>>>>>>> develop
                                    </a>
                                @endif
                                {{-- END TRACK ORDER --}}
                                <div class="col-8">
                                    {{-- BID NOW --}}
                                    @if ($ship->company_id == null && $ship->bid_amount == null)
                                        <form method="POST" action="{{ route('addBid.company') }}">
                                            @csrf
                                            <input type="hidden" name="company_id" value="{{ Auth::user()->id }}" />
                                            <input type="hidden" name="shipment_id" value="{{ $ship->id }}" />
                                            <label class="control-label control-label-left fw-bold">BID<span
                                                    class="required"></span></label>
                                            <input type="number" class="form-control typeahead btn-block w-100"
                                                placeholder="BID AMOUNT" id="form6Example3" id="bidAmount"
                                                name="bid_amount" required />
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-warning mt-2 btn-block" id="bidButton">
                                        BID
                                    </button>
                                </div>
                                <a class="cardItem my-2" href="{{route('company.order')}}">
                                    <div  class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-block btn-dark shadow-0 text-white mb-1">
                                        BACK
                                        </button>
                                    </form>
                                    @endif
                                    {{-- END BID NOW --}}
                                    </div>
                                </a>
                            </div>
                        </div>
                        {{-- CARD CREATED AFTER FILLING UP --}}
                        <!-- Product Information -->
                        <div class="col-xl-9">
                            <div class="row">
                                <!-- Table for Alignment of Product Info -->
                                <table class="m-2" style="width:100%">
                                    <tr>
                                        <th colspan="2">
                                            <h5 class="fw-bold opacity-75">SENDER</h5>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Name:</th>
                                        <td>{{ $ship->sender->sender_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address:</th>
                                        <td>{{ $ship->sender->sender_address }}, {{ $ship->sender->sender_city }},
                                            {{ $ship->sender->sender_state }}, {{ $ship->sender->sender_zip }}</td>
                                    </tr>
                                    <tr>
                                        <th>Contact Number:</th>
                                        <td>{{ $ship->sender->sender_mobile }} @if ($ship->sender->sender_tel != null)
                                                | {{ $ship->sender->sender_tel }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-3" colspan="2">
                                            <hr class="opacity-75">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">
                                            <h5 class="fw-bold opacity-75">RECEIVER</h5>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Name:</th>
                                        <td>{{ $ship->recipient->recipient_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address:</th>
                                        <td>{{ $ship->recipient->recipient_address }},
                                            {{ $ship->recipient->recipient_city }},
                                            {{ $ship->recipient->recipient_state }},
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
                                        <td class="px-3" colspan="2">
                                            <hr class="opacity-75">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">
                                            <h5 class="fw-bold opacity-75">PARCEL INFORMATION</h5>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>ID:</th>
                                        <td>{{ $ship->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Size & Weight:</th>
                                        <td>{{ intval($ship->length) }}x{{ intval($ship->width) }}x{{ intval($ship->height) }}
                                            | {{ intval($ship->weight) }}Kg</td>
                                    </tr>
                                    <tr>
                                        <th>Parcel Item:</th>
                                        <td>{{ $ship->category }}</td>
                                    </tr>
                                    <tr>
                                        <th>Mode of Payment:</th>
                                        <td>{{$ship->mop}}</td>
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
                    </div>

                    <!-- START ACCEPT BID TABLE -->
                    <hr class="px-3" class="opacity-75">
                    <section class="overflow-auto">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Company</th>
                                    <th>Bid Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            @foreach ($bids as $bid)
                                @if ($ship->id == $bid->shipment_id)
                                    <form action="{{ route('acceptBid', $bid->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="shipment_id" value="{{ $ship->id }}">
                                        <tbody class="table table-striped">
                                            <tr>
                                                <td>{{ $bid->company_name }} </td>
                                                <td>{{ $bid->bid_amount }}</td>
                                                <td>{{ $bid->status }}</td>
                                            </tr>
                                        </tbody>
                                    </form>
                                @endif
                            @endforeach
                        </table>
                    </section>
                    <!-- END ACCEPT BID TABLE -->
                </div>
            </div>
            {{-- END OF CARD --}}
        </div>
    </div>
</div>
<!-- </div> -->
<!-- Exp end -->
{{-- END OF ORDER CONTAINER --}}

<script>
    // Get the minimum bid amount from the HTML using PHP
    var maxBidAmount = {{ $ship->min_bid_amount }};
    // Get a reference to the bid amount input field and the bid button
    var bidAmountInput = document.getElementById('form6Example3');
    var bidButton = document.getElementById('bidButton');
    // Add an event listener to the bid amount input field to check the value and disable the button if necessary
    bidAmountInput.addEventListener('input', function(event) {
        var bidAmount = parseFloat(event.target.value);
        if (isNaN(bidAmount) || bidAmount > maxBidAmount) {
            bidButton.disabled = true;
        } else {
            bidButton.disabled = false;
        }
    });
</script>
