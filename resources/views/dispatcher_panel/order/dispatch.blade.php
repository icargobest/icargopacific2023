<head>
    <link rel="stylesheet" href="{{ asset('css/style_order.css') }}">
    <title>Dispatcher | Dispatch Orders</title>
</head>
@include('partials.header')
@extends('layouts.app')
@include('partials.navigationDispatcher', ['toDispatch_view' =>"nav-selected"])

<style>
    svg {
        width: 1.5rem;
        height: 1.5rem;
    }
    table {
    border-color: transparent !important;
    }
</style>

<main class="container py-5" style="margin-top: -49px !important">
    <div class="main-wrapper border border-2" style="max-width: 100%">
        <div class="employee-header-container">
            <h3 class="">ORDER LIST | TO DISPATCH</h3>
        </div>

        <div class="mt-2">
            @include('flash-message')
        </div>

        <div class="table-container">
            <table
                class="table table-striped table-bordered table-hover table-borderless hover"
                id="dispatcherToDispatchTable"
            >
                <thead>
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
                    $company_id_dispatcher && ($ship->status == 'Arrived' || $ship->status == 'Dispatched') &&
                    $ship->driver_id == null  && $ship->station_id == $dispatcher_station_id)
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
                        <td><span class="badge badge-primary" style="background-color: #F9CD1A;">{{$ship->status}}</span></td>
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
        </div>
    </div>
</main>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript">
    let stafftable = new DataTable("#dispatcherToDispatchTable");
</script>

@include('partials.footer')