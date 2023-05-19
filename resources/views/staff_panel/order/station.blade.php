<head>
    <link rel="stylesheet" href="{{ asset('css/style_order.css') }}">
    <title>Staff | Order Station</title>
</head>
@include('partials.header')
@extends('layouts.app')
@include('partials.navigationStaff')

<!-- MBD -->
<link rel="stylesheet" href="/css/mdb.min.css" />

<style>
    th {
        background-color: transparent !important;
        color: black;
        font-weight: normal;
        text-align: left;
    }
    td {
        text-align: left;
        font-weight: bold;
    }
</style>
{{-- ORDER CONTAINER RECONCEPTUALIZE --}}
<div class="container mw-100">
    <div class="bg-white shadow" style="max-width: 100%;">
        <div class="py-3 ps-3" style="background-color: #214D94;">
            <h3 class="text-white text-center text-sm-start mb-0 fw-bold">ORDER LIST | ASSIGN STATION</h3>
        </div>
        <div class="mt-2">
            @include('flash-message')
        </div>
        {{-- TABLE START--}}
        <section class="mb-5 px-2 my-2 overflow-auto">
            <table class="table table-striped table-hover">
            <thead class="text-white" style="background-color: #214D94;">
                <tr>
                    <th>ID</th>
                    <th>PHOTO</th>
                    <th>PICKUP</th>
                    <th>DROPOFF</th>
                    <th>ITEM</th>
                    <th>SIZE & WIDTH</th>
                    <th>MAXIMUM BID</th>
                    <th>STATION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($shipments as $ship)
                    @if(Auth::user()->type == 'staff')
                        @if($ship->company_id == $company_id_staff && $ship->status == 'Processing' )
                        <tr>
                            <td>{{$ship->id}}</td>
                            <!-- Photo not showing -->
                            <td style="width: 70px;">
                                <img src="{{asset($ship->photo)}}" class="card shadow-0 w-25" style="min-width: 70px; object-fit: contain;" alt="Photo"/>
                            </td>
                            <td>{{$ship->sender->sender_address}}, {{$ship->sender->sender_city}}, {{$ship->sender->sender_state}}, {{$ship->sender->sender_zip}}</td>
                            <td>{{$ship->recipient->recipient_address}}, {{$ship->recipient->recipient_city}}, {{$ship->recipient->recipient_state}}, {{$ship->recipient->recipient_zip}}</td>
                            <td>{{$ship->category}}</td>
                            <td>{{intval($ship->length)}}x{{intval($ship->width)}}x{{intval($ship->height)}} | {{intval($ship->weight)}}Kg</td>
                            <td>{{$ship->min_bid_amount}}</td>
                            <td>
                                @if($ship->station_id == null)
                                    @include('staff_panel/order.assignStation')
                                @else
                                    @foreach ($stations as $station)
                                        @if($station->id == $ship->station_id)
                                            {{$station->station_name}}
                                        @endif
                                    @endforeach
                                @endif
                            </td>
                        </tr>
                        @endif
                    @endif
                @endforeach
            </tbody>
            </table>
        </section>
        {{-- END OF TABLE --}}
    </div>
</div>
{{-- END OF ORDER CONTAINER --}}
@include('partials.footer')
