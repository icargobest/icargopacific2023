<title>
    Staff | Advanced Freight</title>

@extends('layouts.app')
@include('partials.navigationStaff')

<style>
    table {
        border-collapse: collapse;
        border-color: transparent !important;
    }

    th {
        color: white !important;
    }

    td,
    th {
        text-align: center !important;
        padding: 10px;
        border: 1px solid black;

    }
</style>

<div class="mx-2">
    <div class="main-wrapper border border-2" style=" max-width: 100%;">
        @if (session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="employee-header-container">
            <h3 class="">ADVANCED FREIGHT LIST</h3>
        </div>

        <section class="search-filter-container mb-4">

            <div class="top-container1" style="max-width: 800px;">
                <h5 class="fw-normal mb-2 d-inline"> SEARCH:</h5>
                <div class="input-group rounded">
                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                        aria-describedby="search-addon" />
                    <span class="input-group-text border-0" id="search-addon">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>

        </section>

        <section class="mb-5 px-2 h-90" style="overflow-x:auto">
            <table class="table table-striped table-bordered table-hover">
                <thead class="table-dark">
                    <col>
                    <colgroup span="3"></colgroup>
                    <colgroup span="3"></colgroup>
                    <colgroup span="3"></colgroup>
                    <tr>
                        <thead>
                            <th colspan="3" scope="colgroup">SENDER</th>
                            <th colspan="3" scope="colgroup">RECEIVER</th>
                            <th colspan="4" scope="colgroup">ITEM INFORMATION</th>
                        </thead>

                    </tr>
                    <tr>
                        <thead>
                            <th scope="col">NAME</th>
                            <th scope="col">ADDRESS</th>
                            <th scope="col">NUMBER</th>
                            <th scope="col">NAME</th>
                            <th scope="col">ADDRESS</th>
                            <th scope="col">NUMBER</th>
                            <th scope="col">ID</th>
                            <th scope="col">SIZE & WEIGHT</th>
                            <th scope="col">MODE of PAYMENT</th>
                            <th scope="col">ACTION</th>
                        </thead>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($shipments as $ship)
                        @if (Auth::user()->type == 'staff' && $ship->status != "Delivered")
                            @if ($staff->company_id == $ship->company_id)
                                <tr>

                                    {{-- sender namae --}}
                                    <td>{{ $ship->sender->sender_name }}</td>
                                    {{-- sender address --}}
                                    <td>{{ $ship->sender->sender_address }} , {{ $ship->sender->sender_city }} ,
                                        {{ $ship->sender->sender_state }} , {{ $ship->sender->sender_zip }}</td>
                                    {{-- sender number --}}
                                    <td>{{ $ship->sender->sender_mobile }} @if ($ship->sender->sender_tel != null)
                                            | {{ $ship->sender->sender_tel }}
                                        @endif
                                    </td>
                                    {{-- receiver name --}}
                                    <td>{{ $ship->recipient->recipient_name }}</td>
                                    {{-- receiver address --}}
                                    <td>{{ $ship->recipient->recipient_address }} ,
                                        {{ $ship->recipient->recipient_city }} ,
                                        {{ $ship->recipient->recipient_state }} ,
                                        {{ $ship->recipient->recipient_zip }}</td>
                                    {{-- receiver number --}}
                                    <td>{{ $ship->recipient->recipient_mobile }} @if ($ship->recipient->recipient_tel != null)
                                            | {{ $ship->recipient->recipient_tel }}
                                        @endif
                                    </td>

                                    {{-- item id --}}
                                    <td>1{{ $ship->id }}</td>
                                    {{-- Size & Weight --}}
                                    <td>{{ intval($ship->length) }}x{{ intval($ship->width) }}x{{ intval($ship->height) }}
                                        | {{ intval($ship->weight) }}Kg</td>
                                    {{-- Mode of Pament --}}
                                    <td>{{ $ship->mop }}</td>
                                    <td class="tdbutton" style="max-width:120px">
                                        {{-- <a href="{{ route('trackOrder_Company', $ship->id) }}"><button class="btn created-button mx-auto">Tracking</button></a> --}}
                                        @include('staff_panel.advance_freight.advance_tracking')
                                        @if ($ship->advTransferredStatus == null)
                                            <a href="{{ route('staff_advFreight', $ship->id) }}"><button
                                                    class="btn created-button mx-auto">Forward</button></a>
                                        @elseif($ship->advTransferredStatus == 'Accepted')
                                            Transfer Accepted
                                        @else
                                            Pending for transfer
                                        @endif

                                        @include('staff_panel.advance_freight.print-modal')
                                </tr>
                            @endif
                        @endif
                    @endforeach
                </tbody>
            </table>


            <div class="employee-header-container">
                <h3 class="">REQUESTS</h3>
            </div>
            <br>
            <table class="table table-bordered table-striped">
                <thead>

                    <th>Tracking Number</th>
                    <th>Shipping Date</th>
                    <th>Order Type</th>
                    <th>Sender Name</th>
                    <th>Recipient Name</th>
                    <th>Bid Amount</th>
                    <th>Freight Charges</th>

                </thead>
                @foreach ($shipments as $ship)
                    @if (Auth::user()->type == 'staff' &&
                            $ship->advTransferredto == $company_id_staff &&
                            $ship->advTransferredStatus == 'Pending')
                        <tr>

                            <td>{{ $ship->tracking_number }}</td>
                            <td>{{ $ship->shipping_date }}</td>
                            <td>{{ $ship->order_type }}</td>
                            <td>{{ $ship->sender->sender_name }}</td>
                            <td>{{ $ship->recipient->recipient_name }}</td>
                            <td>{{ $ship->bid_amount }}</td>
                            <td>{{ $ship->advFreight_total_amount }}</td>

                            <td>
                                <a href="{{ url('/staff/advfreight/accept', $ship->id) }}"
                                    class="btn btn-success">Accept</a>
                            </td>

                            <td>
                                <a href="{{ url('/staff/advfreight/decline', $ship->id) }}"
                                    class="btn btn-danger">Decline</a>
                            </td>

                        </tr>
                    @endif
                @endforeach
            </table>

        </section>




    </div>
</div>


@include('partials.footer')
