<head>
  <link rel="stylesheet" href="{{ asset('css/style_order.css') }}">
  <title>Orders</title>
</head>

{{-- @include('partials.navigation', ['waybill' => 'fw-bold']) --}}
@include('layouts.app')
@extends('partials.navigationCompany')

{{-- ORDER CONTAINER RECONCEPTUALIZE --}}
<div class="order-container container">

  <h4>ORDER LIST</h4>

  <div class="cards-holder">

    {{-- CARD CREATED AFTER FILLING UP --}}
    <div class="cards-holder">

        @foreach ($shipments as $ship)
            @if(Auth::user()->id == $ship->user_id || (Auth::user()->type == 'company' && $ship->company_bid == Auth::user()->name && $ship->status == 'Processing') || (Auth::user()->type == 'company' && $ship->company_bid == null && $ship->status == 'Pending'))
            {{-- CARD CREATED AFTER FILLING UP --}}
            <a class="cardItem" data-mdb-toggle="modal" data-mdb-target="#showModal{{$ship->id}}">
                <div class="item-card container px-4">
                <div class="card-body">
                    <div class="row">

                    <div class="details-wrapper col-lg-10 col-sm-12">
                        <div class="recepients-wrapper row">

                        <div class="senderInfo col-lg-6">
                            <h6>SENDER</h6>

                            <ul>
                                <li>Name | <span>{{$ship->sender_name}}</span></li>
                                <li>Address | <span>{{$ship->sender_address}} , {{$ship->sender_city}} , {{$ship->sender_state}} , {{$ship->sender_zip}}<</span></li>
                                <li>Number | <span>{{$ship->sender_mobile}}</span></li>
                            </ul>
                        </div>
                        <div class="receiverInfo col-lg-6">
                            <h6>RECEIVER</h6>

                            <ul>
                                <li>Name | <span>{{$ship->recipient_name}}</span></li>
                                <li>Address | <span>{{$ship->recipient_address}} , {{$ship->recipient_city}} , {{$ship->recipient_state}} , {{$ship->recipient_zip}}</span></li>
                                <li>Number | <span>{{$ship->recipient_mobile}}</span></li>
                            </ul>
                        </div>

                        </div>
                        <div class="parcelInfo-wrapper">

                        <div class="itemInfo">
                            <h6>ITEM INFORMATION</h6>

                            <div class="parcelDetails row">

                            <div class="listLayout col-lg-6 col-sm-12">
                                <ul>
                                    <li>ID | <span>{{$ship->id}}</span></li>
                                    <li>Size & Weight | <span>{{$ship->length}}x{{$ship->width}}x{{$ship->height}} | {{$ship->weight}}Kg</span></li>
                                </ul>
                            </div>
                            <div class="listLayout col-lg-6 col-sm-12">
                                <ul>
                                    <li>Category | <span>{{$ship->category}}</span></li>
                                    <li>Mode of Pament | <span>COD</span></li>
                                </ul>
                            </div>

                            </div>
                        </div>

                        </div>
                    </div>

                    <div class="image-wrapper col">
                        <div class="image-holder">
                        <img src="https://images.unsplash.com/photo-1600331073565-d1f0831de6cb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=885&q=80" alt="">
                        </div>
                    </div>

                    </div>
                </div>
                </div>
            </a>
            {{-- END OF CARD --}}
            @endif
        @endforeach
        </div>
    </div>
    {{-- END OF CARD --}}

  </div>


</div>
{{-- END OF ORDER CONTAINER --}}

        <div class="mt-2">
            @include('partials.messages')
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Photo</th>
                <th>Pickup</th>
                <th>Drop-off</th>
                <th>Parcel Item</th>
                <th>Parcel Size & Weight</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($shipments as $ship)
                    @if(Auth::user()->id == $ship->user_id || (Auth::user()->type == 'company' && $ship->company_bid == Auth::user()->name && $ship->status == 'Processing') || (Auth::user()->type == 'company' && $ship->company_bid == null && $ship->status == 'Pending'))
                        <tr>
                            <td></td>
                            <td>{{$ship->sender_address}} , {{$ship->sender_city}} , {{$ship->sender_state}} , {{$ship->sender_zip}}</td>
                            <td>{{$ship->recipient_address}} , {{$ship->recipient_city}} , {{$ship->recipient_state}} , {{$ship->recipient_zip}}</td>
                            <td></td>
                            <td>{{$ship->length}}x{{$ship->width}}x{{$ship->height}} | {{$ship->weight}}Kg </td>
                            <td>{{$ship->total_price}}</td>
                            <td>{{$ship->status}}</td>
                            @if($ship->status == 'Pending')
                                <td>@include('company.order.view')</td>
                            @elseif($ship->status == 'Processing')
                                <td>@include('order.tracking')</td>
                                {{--<td><a href="{{route('generate',$ship->id)}}" target="_blank" class="btn btn-dark btn-sm">Generate</a></td>
                                <td><a href="{{route('print',$ship->id)}}" class="btn btn-dark btn-sm">Print</a></td>--}}
                            @endif
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
      </div>
    </div>
    </div>

    <!-- End of Waybill List -->
    @include('partials.footer')
