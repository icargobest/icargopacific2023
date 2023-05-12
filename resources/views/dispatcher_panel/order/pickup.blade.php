<head>
    <link rel="stylesheet" href="{{ asset('css/style_order.css') }}">
    <title>Dispatcher | Pick Up Orders</title>
</head>
@include('partials.header')
@extends('layouts.app')
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
    <div class="bg-white shadow" style="max-width: 100%;">
        <div class="waybill-head py-3 ps-5" style="background-color: #214D94;">
            <h3 class="text-white mb-0">ORDER LIST | TO PICK UP</h3>
        </div>
        {{-- TABLE START--}}
        <section class="mb-5 px-5 my-3 overflow-auto">
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
                    <th>STATUS</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($shipments as $ship)
                    @if(Auth::user()->type == 'dispatcher')
                        @if($ship->company_id == $company_id_dispatcher && $ship->status == 'Processing')
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
                            <td>{{$ship->status}}</td>
                            <td>
                                {{-- <span class="d-flex align-items-start"> --}}
                                <a class="cardItem" href=" ">
                                    <button type="button" class="btn text-white mb-1" style="background-color:#214D94;">
                                    ASSIGN DRIVER
                                    </button>
                                </a>
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
