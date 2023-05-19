<head>
    <link rel="stylesheet" href="{{ asset('css/style_order.css') }}" />
    <title>Dispatcher | Dispatch Orders</title>
</head>
@include('partials.header') @extends('layouts.app')
@include('partials.navigationDispatcher')

<!-- MBD -->
<link rel="stylesheet" href="/css/mdb.min.css" />

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
<div class="container mw-100 px-lg-5">
    <div class="bg-white shadow" style="max-width: 100%">
        <div class="waybill-head py-3 ps-5" style="background-color: #214d94">
            <h3 class="text-white mb-0">ORDER LIST | TO DISPATCH</h3>
        </div>
        <div class="mt-2">@include('flash-message')</div>
        {{-- TABLE START--}}
        <section class="mb-5 px-5 my-3 overflow-auto">
            <table
                class="table table-striped table-hover table-borderless hover"
                id="dispatcherToDispatchTable"
            >
                <thead class="text-white" style="background-color: #214d94">
                    <tr>
                        <th>ID</th>
                        <th>PHOTO</th>
                        <th>PICKUP</th>
                        <th>DROPOFF</th>
                        <th>ITEM</th>
                        <th>SIZE & WIDTH</th>
                        <th>MAXIMUM BID</th>
                        <th>STATUS</th>
                        <th>DRIVER NAME</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($shipments as $ship) @if(Auth::user()->type ==
                    'dispatcher') @if($ship->company_id ==
                    $company_id_dispatcher && $ship->status == 'Arrived' &&
                    $ship->driver_id == null)
                    <tr>
                        <td>{{$ship->id}}</td>
                        <!-- Photo not showing -->
                        <td style="width: 70px">
                            <img
                                src="{{asset($ship->photo)}}"
                                class="card shadow-0 w-25"
                                style="min-width: 70px; object-fit: contain"
                                alt="Photo"
                            />
                        </td>
                        <td>
                            {{$ship->sender->sender_address}},
                            {{$ship->sender->sender_city}},
                            {{$ship->sender->sender_state}},
                            {{$ship->sender->sender_zip}}
                        </td>
                        <td>
                            {{$ship->recipient->recipient_address}},
                            {{$ship->recipient->recipient_city}},
                            {{$ship->recipient->recipient_state}},
                            {{$ship->recipient->recipient_zip}}
                        </td>
                        <td>{{$ship->category}}</td>
                        <td>
                            {{intval($ship->length)}}x{{intval($ship->width)}}x{{intval($ship->height)}}
                            | {{intval($ship->weight)}}Kg
                        </td>
                        <td>{{$ship->min_bid_amount}}</td>
                        <td>{{$ship->status}}</td>
                        <td>
                            @if($ship->driver_id == null)
                            @include('dispatcher_panel/order.assignDriver')
                            @else @foreach ($drivers as $driver) @if($driver->id
                            == $ship->driver_id) {{$driver->user->name}} @endif
                            @endforeach @endif
                        </td>
                    </tr>
                    @endif @endif @endforeach
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
    let dispatcherToDispatchTable = new DataTable("#dispatcherToDispatchTable");
</script>

@include('partials.footer')
