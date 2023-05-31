<head>
    <link rel="stylesheet" href="{{ asset('css/style_order.css') }}" />
    <title>Staff | Orders</title>
</head>

@include('partials.header')
@extends('layouts.app')
@include('partials.navigationStaff', ['order' => 'nav-selected'])

<style>
    th {
        background-color: white !important;
        color: black;
        font-weight: normal;
    }

    td {
        text-align: left;
        font-weight: bold;
    }
</style>
{{-- ORDER CONTAINER RECONCEPTUALIZE --}}
<div class="container mw-100">
    <div class="bg-white shadow" style="max-width: 100%">
        <div class="waybill-head employee-header-container" style="background-color: #214d94">
            <h3 class="text-white mb-0">Order List</h3>
        </div>
        {{-- TABLE START --}}
        <section class="mb-5 px-2 my-3 overflow-auto">
            <table class="table table-striped table-hover table-borderless hover" id="staffordertable">
                <thead class="text-white" style="background-color: #214d94">
                    <tr>
                        <th>ID</th>
                        <th>PHOTO</th>
                        <th>PICKUP</th>
                        <th>DROPOFF</th>
                        <th>ITEM DESCRIPTION</th>
                        <th>MAX BID</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($shipments as $ship)
                        @if (Auth::user()->type == 'staff' && $ship->status == 'Pending')
                            <tr>
                                <td>{{ $ship->id }}</td>
                                <td style="width: 70px; height: 70px">
                                    <img src="{{ asset($ship->photo) }}" class="card shadow-0 w-25 h-100"
                                        style="min-width: 70px; object-fit: cover" alt="" />
                                </td>
                                <td>
                                    {{ $ship->sender->sender_address }},
                                    {{ $ship->sender->sender_city }},
                                    {{ $ship->sender->sender_state }},
                                    {{ $ship->sender->sender_zip }}
                                </td>
                                <td>
                                    {{ $ship->recipient->recipient_address }},
                                    {{ $ship->recipient->recipient_city }},
                                    {{ $ship->recipient->recipient_state }},
                                    {{ $ship->recipient->recipient_zip }}
                                </td>
                                <td>{{ $ship->item }} |
                                    {{ intval($ship->length) }}x{{ intval($ship->width) }}x{{ intval($ship->height) }}
                                    | {{ intval($ship->weight) }}Kg</td>
                                <td>{{ $ship->min_bid_amount }}</td>
                                <td>{{ $ship->status }}</td>
                                <td>
                                    <a class="cardItem" href="{{ route('viewOrder_Staff', $ship->id) }}">
                                        <button type="button" class="btn text-white mb-1"
                                            style="background-color: #214d94">
                                            VIEW
                                        </button>
                                    </a>
                                    {{-- <span class="d-flex align-items-start"
                                >@include('staff_panel.order.view')</span
                            > --}}
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </section>
        {{-- END OF TABLE --}}
    </div>
</div>
{{-- END OF ORDER CONTAINER --}}

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script type="text/javascript">
    let staffordertable = new DataTable("#staffordertable");
</script>

@include('partials.footer')
