<head>
    <link rel="stylesheet" href="{{ asset('css/style_order.css') }}">
    @extends('layouts.app')
@extends('layouts.status')
    <link rel="stylesheet" href="./line-awesome.min.css">
    <title>Orders</title>
  </head>

  {{-- @include('partials.navigation', ['waybill' => 'fw-bold']) --}}
  @include('layouts.app')
  @extends('partials.navigationUser')

{{-- ORDER CONTAINER RECONCEPTUALIZE --}}
<div class="order-container container">


  <h4>TRACKING ORDER</h4>


  <div class="text-center">
    <a href="{{route('generate',$ship->id)}}" target="_blank" class="btn btn-primary btn-sm col-3">
        Invoice
    </a>
    <a href="{{route('user.generateWaybill', $ship->id)}}" class="btn btn-dark btn-sm col-3">
        Waybill
    </a>
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


        <div id="order-status-container">
            <div class="row">
                <div class="col-md-6">
                    <h3>Order Summary</h3>
                    <div id="order-status-container">
                        @foreach($statuses as $status)
                            <div class="card mb-3">
                                <div class="card-body">
                                    @switch($status)
                                        @case('Pending')
                                            <h5 class="card-title">Order Status: Pending</h5>
                                            <p class="card-text">Your order is currently pending.</p>
                                            @break
                                        @case('Processing')
                                            <h5 class="card-title">Order Status: Processing</h5>
                                            <p class="card-text">Your order is currently being processed.</p>
                                            @break
                                        @case('pickup')
                                            <h5 class="card-title">Order Status: Picked-Up</h5>
                                            <p class="card-text">Your order is already been Picked-Up.</p>
                                            @break
                                        @case('assort')
                                            <h5 class="card-title">Order Status: Arrived at Sorting Facility</h5>
                                            <p class="card-text">Your order has already been Arrived at Sorting Facility.</p>
                                            @break
                                        @case('Transferred')
                                            <h5 class="card-title">Order Status</h5>
                                            <h5 class="card-text">Transferred to Station: {{$ship->station_id}}</h5>
                                            <p class="card-text">Your order has already been transferred to another station.</p>
                                            @break
                                        @case('Departed')
                                            <h5 class="card-title">Order Status: Departed</h5>
                                            <p class="card-text">Your order has Departed from sorting facility.</p>
                                            @break
                                        @case('Arrived at')
                                            <h5 class="card-title">Order Status: Arrived at Station {{$ship->station_id}}</h5>
                                            <p class="card-text">Your order has arrived at the station.</p>
                                            @break
                                        @case('In Transit')
                                            <h5 class="card-title">Order Status: In Transit</h5>
                                            <p class="card-text">Your order is out for delivery.</p>
                                            @break
                                        @case('Delivered')
                                            <h5 class="card-title">Order Status: Delivered</h5>
                                            <p class="card-text">Your order has been delivered.</p>
                                            @break
                                        @default
                                            <h5 class="card-title">Order Status: Unknown</h5>
                                            <p class="card-text">We could not determine the status of your order.</p>
                                            @endswitch
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


        {{-- <div class="scanresult">
            <label>Result:</label>
            <div class="track--wrapper">
                <div class="track__item {{ $ship->status == 'picked_up' ? 'active' : '' }}" id="picked-up">
                    <div class="track__thumb">
                        <i class="las la-briefcase"></i>
                    </div>
                    <div class="track__content">
                        <h5 class="track__title">@lang('Picked Up')</h5>
                    </div>
                </div>
                <div class="track__item {{ $ship->status == 'assort' ? 'active' : '' }}" id="assort">
                    <div class="track__thumb">
                        <i class="lar la-building"></i>
                    </div>
                    <div class="track__content">
                        <h5 class="track__title">@lang('Logistics')</h5>
                    </div>
                </div>
                <div class="track__item {{ $ship->status == 'delivered' ? 'active' : '' }}" id="delivered">
                    <div class="track__thumb">
                        <i class="las la-truck-pickup"></i>
                    </div>
                    <div class="track__content">
                        <h5 class="track__title">@lang('Delivery')</h5>
                    </div>
                </div>
                <div class="track__item {{ $ship->status == 'completed' ? 'active' : '' }}" id="completed">
                    <div class="track__thumb">
                        <i class="las la-check-circle"></i>
                    </div>
                    <div class="track__content">
                        <h5 class="track__title">@lang('Completed')</h5>
                    </div>
                </div>
            </div>

            <span id="result"></span>
          </div> --}}
    </div>
</div>
{{-- END OF ORDER CONTAINER --}}


<style>
    .status-green {
        color: #00bf9a;
    }
</style>
