<head>
  <title>Customer | Orders</title>
</head>
@include('partials.header')
@include('layouts.app')
@include('partials.navigationUser',['order' => "nav-selected"])

{{-- ORDER CONTAINER RECONCEPTUALIZE --}}
<div class="order-container container">

  <h4>MY ITEMS</h4>
    <a href="/order-form">
        <button type="button" class="orderBtn btn btn-primary btn-sm btn-sm-block mb-3">
            Post Order
        </button>
    </a>
  {{-- <div class="button-holder row borderRed mb-3">
    <a href="/order-form">
        <button type="button" class="btn btn-primary btn-sm btn-sm-block">
            Post Order
        </button>
    </a>
  </div> --}}

    <div class="cards-holder">

        @foreach ($shipments as $ship)
            @if(Auth::user()->id == $ship->user_id || (Auth::user()->type == 'company' && $ship->company_bid == Auth::user()->name && $ship->status == 'Processing') || (Auth::user()->type == 'company' && $ship->company_bid == null && $ship->status == 'Pending'))
                @if($ship->status != 'Cancelled' && $ship->status != 'Delivered')
                {{-- CARD CREATED AFTER FILLING UP --}}
                <a class="cardItem" href="{{route('viewOrder',$ship->id)}}">
                    <div class="item-card container px-4">
                    <div class="card-body">
                        <div class="row mb-3 titleID">
                            <div class="col d-flex gap-4 align-items-center"><span class="fw-bold">ORDER #{{$ship->id}}</span> <span class="orderStatus fw-bold">
                                @if($ship->status == 'Pending')<i class="fa fa-clock"></i>
                                @elseif($ship->status == 'Processing')<i class="fa fa-gears"></i>
                                @elseif($ship->status == 'PickedUp')<i class="fa fa-truck-ramp-box"></i>
                                @elseif($ship->status == 'Assort')<i class="fa fa-arrows-spin"></i>
                                @elseif($ship->status == 'Transferred')<i class="fa fa-right-left"></i>
                                @elseif($ship->status == 'Arrived')<i class="fa fa-boxes-stacked"></i>
                                @elseif($ship->status == 'Dispatched')<i class="fa fa-truck-fast"></i>
                                @elseif($ship->status == 'Delivered')<i class="fa fa-circle-check"></i>
                                @endif {{$ship->status}}</span></div>
                        </div>
                        <div class="row">


                        <div class="details-wrapper col-lg-10 col-sm-12">
                            <div class="recepients-wrapper row">

                            <div class="senderInfo col-lg-6">
                                <h6 class="fw-bold">SENDER</h6>

                                <ul>
                                    <li>Name | <span>{{$ship->sender->sender_name}}</span></li>
                                    <li>Address | <span>{{$ship->sender->sender_address}} , {{$ship->sender->sender_city}} , {{$ship->sender->sender_state}} , {{$ship->sender->sender_zip}}</span></li>
                                    <li>Number | <span>{{$ship->sender->sender_mobile}} @if($ship->sender->sender_tel != NULL) | {{$ship->sender->sender_tel}} @endif</span></li>
                                </ul>
                            </div>
                            <div class="receiverInfo col-lg-6">
                                <h6 class="fw-bold">RECEIVER</h6>

                                <ul>
                                    <li>Name | <span>{{$ship->recipient->recipient_name}}</span></li>
                                    <li>Address | <span>{{$ship->recipient->recipient_address}} , {{$ship->recipient->recipient_city}} , {{$ship->recipient->recipient_state}} , {{$ship->recipient->recipient_zip}}</span></li>
                                    <li>Number | <span>{{$ship->recipient->recipient_mobile}} @if($ship->recipient->recipient_tel != NULL) | {{$ship->recipient->recipient_tel}} @endif</span></li>
                                </ul>
                            </div>

                            </div>
                            <div class="parcelInfo-wrapper">

                            <div class="itemInfo">
                                <h6 class="fw-bold">ITEM INFORMATION</h6>

                                <div class="parcelDetails row">

                                <div class="listLayout col-lg-6 col-sm-12">
                                    <ul>
                                        <li>Item | <span>{{$ship->item}}</span></li>
                                    </ul>
                                </div>
                                <div class="listLayout col-lg-6 col-sm-12">
                                    <ul>
                                        <li>Size & Weight | <span>{{intval($ship->length)}}x{{intval($ship->width)}}x{{intval($ship->height)}} | {{intval($ship->weight)}}Kg</span></li>
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
                    </div>
                </a>
                {{-- END OF CARD --}}
                @endif
            @endif
        @endforeach
        </div>
    </div>
    {{-- END OF ORDER CONTAINER --}}

      <!-- End of Waybill List -->
      @include('partials.footer')
