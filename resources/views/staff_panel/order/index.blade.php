<head>
    <link rel="stylesheet" href="{{ asset('css/style_order.css') }}">
    <title>Orders</title>
  </head>

  {{-- @include('partials.navigation', ['waybill' => 'fw-bold']) --}}
  @include('layouts.app')
  @extends('partials.navigationStaff')

  {{-- ORDER CONTAINER RECONCEPTUALIZE --}}
  <div class="order-container container">

    <h4>ORDER LIST</h4>

      <div class="cards-holder">

          @foreach ($shipments as $ship)
              @if((Auth::user()->type == 'staff' && $ship->status == 'Pending'))
                {{-- CARD CREATED AFTER FILLING UP --}}
                <a class="cardItem" href="{{route('viewOrder_Staff',$ship->id)}}">
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
                                </ul>
                            </div>
                            <div class="receiverInfo col-lg-6">
                                <h6>RECEIVER</h6>

                                <ul>
                                    <li>Name | <span>{{$ship->recipient->recipient_name}}</span></li>
                                    <li>Address | <span>{{$ship->recipient->recipient_address}} , {{$ship->recipient->recipient_city}} , {{$ship->recipient->recipient_state}} , {{$ship->recipient->recipient_zip}}</span></li>
                                    <li>Number | <span>{{$ship->recipient->recipient_mobile}} @if($ship->recipient->recipient_tel != NULL) | {{$ship->recipient->recipient_tel}} @endif</span></li>
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
                                    </ul>
                                </div>
                                <div class="listLayout col-lg-6 col-sm-12">
                                    <ul>
                                        <li>Category | <span>{{$ship->category}}</span></li>
                                        <li>Mode of Pament | <span>{{$ship->mop}}</span></li>
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
          @endforeach
          </div>
      </div>
      {{-- END OF ORDER CONTAINER --}}

        <!-- End of Waybill List -->
        @include('partials.footer')
