<head>
    <link rel="stylesheet" href="{{ asset('css/style_order.css') }}">
    <title>Orders</title>
  </head>

  {{-- @include('partials.navigation', ['waybill' => 'fw-bold']) --}}
  @include('layouts.app')
  @extends('partials.navigationUser')

{{-- ORDER CONTAINER RECONCEPTUALIZE --}}
<div class="order-container container">


  <h4>MY ITEMS</h4>
  @if ($ship->status != 'Cancelled')
    <a href="">
        <button type="button" class="btn btn-primary">
            Edit
        </button>
    </a>
    <form method="POST" action="{{route('cancelOrder', $ship->id)}}">
    @csrf
    @method('PUT')
        <button type="submit" class="btn btn-danger">
            Cancel Order
        </button>
    </form>
  @endif

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
                            <li>Address | <span>{{$ship->sender->sender_address}} , {{$ship->sender->sender_city}} , {{$ship->sender->sender_state}} , {{$ship->sender->sender_zip}}</span></li>
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

                @if($ship->company_bid != NULL && $ship->bid_amount != NULL)
                    <a href="{{route('trackOrder',$ship->id)}}" class="btn btn-primary btn">
                        Track Order
                    </a>
                @endif
                </div>
                </div>

                <table class="table table-striped">
                    <thead class="bg-light">
                        <tr>
                            <th>Company</th>
                            <th>Bid Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach($bids as $bid)
                        @if($ship->id == $bid->shipment_id)
                            <form action="{{route('acceptBid', $bid->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                                <input type="hidden" name="shipment_id" value="{{ $ship->id }}">
                                <tbody>
                                    <tr>
                                        <td>{{$bid->company_name}}</td>
                                        <td>{{$bid->bid_amount}}</td>
                                        <td>{{$bid->status}}</td>
                                        @if($bids->where('shipment_id', $bid->shipment_id)->contains('status', 'Accepted'))
                                            <td><button tpye="submit" class="btn btn-success btn-sm" disabled>Accept</button></td>
                                        @else
                                            <td><button tpye="submit" class="btn btn-success btn-sm">Accept</button></td>
                                        @endif
                                    </tr>
                                </tbody>
                            </form>
                        @endif
                    @endforeach
                </table>
            </div>
            </div>
        {{-- END OF CARD --}}
    </div>
</div>
{{-- END OF ORDER CONTAINER --}}
