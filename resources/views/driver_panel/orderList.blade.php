@include('partials.header')
@extends('layouts.app')
@include('partials.navigationDriver',['order' => "nav-selected"])
<title>Driver | Order List</title>

<main class="container py-5" style="margin-top:-49px !important;">
    <div class="driver-order-container mt-4 shadow">
    <div class="p-3 driver-order-header">
      <label class="h2" style="letter-spacing:1px;">Order List</label>
    </div>
    <div class="main-wrapper">

        <section class="search-filter-container">

            <div class="top-container1" style="max-width: 800px; margin-top: 15px">
                <h5 class="fw-normal mb-2 d-inline">SEARCH:</h5>
                <div class="input-group rounded">
                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" style="background-color: white">
                    <span class="input-group-text border-0" id="search-addon">
                      <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>


        </section>

        <div class="mt-2">
            @include('flash-message')
        </div>


        <div class="table-container px-3">
            <table class="table table-striped history-table border border-2 shadow">
                <thead>
                <tr>
                    <th>ID{{$driverID}}</th>
                    <th>PHOTO</th>
                    <th>PICKUP</th>
                    <th>DROPOFF</th>
                    <th>ITEM</th>
                    <th>SIZE & WIDTH</th>
                    <th>AMOUNT</th>
                    <th>STATUS</th>
                </tr>
                </thead>
                <tbody class="history-tbody">
                        @foreach ($shipments as $ship)
                            @if(Auth::user()->type == 'driver')
                                @if($ship->driver_id == $driverID && ($ship->status == 'Processing' || $ship->status == 'Picked-Up'|| $ship->status == 'Dispatched'))
                                    <tr>
                                        <td>{{$ship->id}}</td>
                                        <!-- Photo not showing -->
                                        <td style="width: 70px;">
                                            <img src="{{asset($ship->photo)}}" class="card shadow-0 w-25" style="min-width: 70px; object-fit: contain;" alt="Photo"/>
                                        </td>
                                        @if($ship->status == ('Processing' || 'Picked-Up'))
                                            <td>{{$ship->sender->sender_address}}, {{$ship->sender->sender_city}}, {{$ship->sender->sender_state}}, {{$ship->sender->sender_zip}}</td>
                                        @else
                                            <td>Company Warehouse</td>
                                        @endif
                                        @if($ship->status == 'Dispatched')
                                            <td>{{$ship->recipient->recipient_address}}, {{$ship->recipient->recipient_city}}, {{$ship->recipient->recipient_state}}, {{$ship->recipient->recipient_zip}}</td>
                                        @else
                                            <td>Company Warehouse</td>
                                        @endif
                                        <td>{{$ship->category}}</td>
                                        <td>{{intval($ship->length)}}x{{intval($ship->width)}}x{{intval($ship->height)}} | {{intval($ship->weight)}}Kg</td>
                                        <td>{{$ship->min_bid_amount}}</td>
                                        <td>{{$ship->status}}</td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
</div>
</main>


@include('partials.footer')	
