<head>
    <link rel="stylesheet" href="{{ asset('css/style_order.css') }}">
    <title>Company | Orders</title>
  </head>

  {{-- @include('partials.navigation', ['waybill' => 'fw-bold']) --}}
  @include('layouts.app')
  @extends('partials.navigationCompany')

{{-- ORDER CONTAINER RECONCEPTUALIZE --}}
<div class="order-container container">


  <h4>TRACKING ORDER</h4>


  <div class="text-center">
    <a href="{{route('generateInvoice',$ship->id)}}" target="_blank" class="btn btn-primary btn-sm col-1">
        Invoice
    </a>
    <a href="{{route('generateWaybill',$ship->id)}}" target="_blank" class="btn btn-dark btn-sm col-1">
        Waybill
    </a>
    @if($ship->station_id == null && $ship->status == "Assort")
        @include('company.order.transfer')
    @endif
  </div>

  <div class="cards-holder">
    {{-- CARD CREATED AFTER FILLING UP --}}
            <div class="item-card container px-4">
            <div class="card-body">
                <div class="row">

                <div class="details-wrapper col-lg-10 col-sm-12">
                    <div class="recepients-wrapper row">

                    <div class="senderInfo col-lg-6">
                        <h6>SENDER</h6>

                        <ul>
                            <li>Name | <span>{{$ship->sender->sender_name}}</span></li>
                            <li>Address | <span>{{$ship->sender->sender_address}} , {{$ship->sender->sender_city}} , {{$ship->sender->sender_state}} , {{$ship->sender->sender_zip}}<</span></li>
                            <li>Number | <span>{{$ship->sender->sender_mobile}} @if($ship->sender->sender_tel != NULL) | {{$ship->sender->sender_tel}} @endif</span></li>
                            <li>Email | <span>{{$ship->sender->sender_email}}</span></li>
                        </ul>
                    </div>
                    <div class="receiverInfo col-lg-6">
                        <h6>RECEIVER</h6>

                        <ul>
                            <li>Name | <span>{{$ship->recipient->recipient_name}}</span></li>
                            <li>Address | <span>{{$ship->recipient->recipient_address}} , {{$ship->recipient->recipient_city}} , {{$ship->recipient->recipient_state}} , {{$ship->recipient->recipient_zip}}</span></li>
                            <li>Number | <span>{{$ship->recipient->recipient_mobile}} @if($ship->recipient->recipient_tel != NULL) | {{$ship->recipient->recipient_tel}} @endif</span></li>
                            <li>Email | <span>{{$ship->recipient->recipient_email}}</span></li>
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
                                <li>Size & Weight | <span>{{intval($ship->length)}}x{{intval($ship->width)}}x{{intval($ship->height)}} | {{intval($ship->weight)}}Kg</span></li>
                                <li>Company | <span>{{$ship->company_bid}}</span></li>
                            </ul>
                        </div>
                        <div class="listLayout col-lg-6 col-sm-12">
                            <ul>
                                <li>Category | <span>{{$ship->category}}</span></li>
                                <li>Mode of Pament | <span>COD</span></li>
                                <li>Bid Amount | <span>{{$ship->bid_amount}}</span></li>
                            </ul>
                        </div>

                        </div>
                    </div>

                    </div>
                </div>

                <div class="image-wrapper col">
                    <div class="image-holder">
                    <img src="{{asset($ship->photo)}}" alt="">
                    </div>
                </div>
            </div>
            </div>
        {{-- END OF CARD --}}

        </br></br><div class="row">
            <div class="col-md-6">
                <h3>Order Summary</h3>
                @if($ship->status == 'Pending')
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Order Status: Pending</h5>
                            <p class="card-text">Your order is currently pending.</p>
                            <p class="card-text">Date : {{$ship->updated_at}}</p>
                        </div>
                    </div>
                @elseif($ship->status == 'Processing')
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Order Status: Processing</h5>
                            <p class="card-text">Your order is currently being processed.</p>
                            <p class="card-text">Date : {{$ship->updated_at}}</p>
                        </div>
                    </div>
                @elseif($ship->status == 'Transferred')
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Order Status</h5>
                            <h5 class="card-text">Transferred to Station: {{$ship->station_id}}</h5>
                            <p class="card-text">Your order has already been transferred to another station.</p>
                            <p class="card-text">Date : {{$ship->updated_at}}</p>
                        </div>
                    </div>
                @elseif($ship->status == 'Shipped')
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Order Status: Shipped</h5>
                            <p class="card-text">Your order has been shipped.</p>
                            <p class="card-text">Date : {{$ship->updated_at}}</p>
                        </div>
                    </div>
                @elseif($ship->status == 'In Transit')
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Order Status: In Transit</h5>
                            <p class="card-text">Your order has been shipped.</p>
                            <p class="card-text">Date : {{$ship->updated_at}}</p>
                        </div>
                    </div>
                @elseif($ship->status == 'Delivered')
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Order Status: Delivered</h5>
                            <p class="card-text">Your order has been delivered.</p>
                            <p class="card-text">Date : {{$ship->updated_at}}</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>

{{-- END OF ORDER CONTAINER --}}
@include('partials.footer')
