    <head>
        <link rel="stylesheet" href="{{ asset('css/style_order.css') }}">
        <title>Company | Orders</title>
    </head>

    {{-- @include('partials.navigation', ['waybill' => 'fw-bold']) --}}
    @extends('layouts.app')
    @include('partials.navigationCompany',['order' => "nav-selected"])

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
        <div class="bg-white shadow" style="max-width: 100%;">
            <div class="waybill-head py-3 ps-5" style="background-color: #214D94;">
                <h3 class="text-white mb-0">ORDER LIST</h3>
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
                        @if(Auth::user()->id == $ship->user_id || (Auth::user()->type == 'company' && $ship->company_bid == null && $ship->status == 'Pending'))
                            @if(Auth::user()->type == 'company' && $ship->company_bid == null && $ship->status == 'Pending')
                            <tr>
                                <td>{{$ship->id}}</td>
                                <!-- Photo not showing -->
                                <td style="width: 70px;">
                                    <img src="{{asset($ship->photo)}}" class="card shadow-0 w-25" style="min-width:70px; object-fit:contain;" alt=""/>
                                </td>
                                <!-- <td style="width: 70px;">
                                    <img class="card shadow-0 w-25" style="min-width:70px; object-fit:contain;" src="https://images.unsplash.com/photo-1600331073565-d1f0831de6cb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=885&q=80" alt=""/>
                                </td> -->
                                <td>{{$ship->sender->sender_address}}, {{$ship->sender->sender_city}}, {{$ship->sender->sender_state}}, {{$ship->sender->sender_zip}}</td>
                                <td>{{$ship->recipient->recipient_address}}, {{$ship->recipient->recipient_city}}, {{$ship->recipient->recipient_state}}, {{$ship->recipient->recipient_zip}}</td>
                                <td>{{$ship->category}}</td>
                                <td>{{intval($ship->length)}}x{{intval($ship->width)}}x{{intval($ship->height)}} | {{intval($ship->weight)}}Kg</td>
                                <td>{{$ship->min_bid_amount}}</td>
                                <td>{{$ship->status}}</td>
                                <td>
                                    <a class="cardItem" href="{{route('viewOrder_Company',$ship->id)}}">
                                        <button type="button" class="btn text-white mb-1" style="background-color:#214D94;">
                                        VIEW
                                        </button>
                                    </a>
                                    {{--<span class="d-flex align-items-start">@include('company.order.view')</span>--}}
                                    
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
