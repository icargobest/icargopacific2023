<head>
    <link rel="stylesheet" href="{{ asset('css/style_order.css') }}">
    <title>Orders</title>
  </head>

  {{-- @include('partials.navigation', ['waybill' => 'fw-bold']) --}}
  @include('layouts.app')
  @extends('partials.navigationCompany')

{{-- ORDER CONTAINER RECONCEPTUALIZE --}}
<div class="order-container container">


  <h4>Order #{{$ship->id}}</h4>
  <div>
    @if($ship->company_bid != NULL && $ship->bid_amount != NULL && $ship->status != 'Cancelled' && $ship->status != 'Delivered')
        <a href="{{route('trackOrder_Company',$ship->id)}}" class="btn btn-primary btn">
            Track Order
        </a>
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
                                @if($ship->company_bid == null && $ship->bid_amount == null)
                                    <li>Maximum Bid | <span>{{$ship->min_bid_amount}}</span></li>
                                @else
                                    <li>Company | <span>{{$ship->company_bid}}</span></li>
                                @endif
                            </ul>
                        </div>
                        <div class="listLayout col-lg-6 col-sm-12">
                            <ul>
                                <li>Category | <span>{{$ship->category}}</span></li>
                                <li>Mode of Pament | <span>COD</span></li>
                                @if($ship->company_bid != null && $ship->bid_amount != null)
                                    <li>Bid Amount | <span>{{$ship->bid_amount}}</span></li>
                                @endif
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

                @if($ship->company_bid == NULL && $ship->bid_amount == NULL)
                    <form method="POST" action="{{route('addBid')}}">
                        @csrf
                        <input type="hidden" name="company_id" value="{{Auth::user()->id}}" />
                        <input type="hidden" name="company_name" value="{{Auth::user()->name}}" />
                        <input type="hidden" name="shipment_id" value="{{$ship->id}}" />
                        <div class="form-outline mb-5 col-2">
                            <div class="bidInput">
                              <span>Bid<span class="required"></span></span>
                              <div class="form-outline">
                                <input type="text" id="form6Example3" id="bidAmount" name="bid_amount" class="form-control" required/>
                                {{-- <label class="form-label" for="form6Example3">Minimum Bid</label> --}}
                                <div class="col">
                                    <button type="submit" class="btn btn-success btn-sm" id="bidButton">Bid</button>
                                </div>
                              </div>
                            </div>
                        </div>
                    </form>
                @endif
                </div>
                </div>

                <table class="table table-striped">
                    <thead class="bg-light">
                        <tr>
                            <th>Company</th>
                            <th>Bid Amount</th>
                            <th>Status</th>
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

<script>
    // Get the minimum bid amount from the HTML using PHP
    var maxBidAmount = {{$ship->min_bid_amount}};
    // Get a reference to the bid amount input field and the bid button
    var bidAmountInput = document.getElementById('form6Example3');
    var bidButton = document.getElementById('bidButton');
    // Add an event listener to the bid amount input field to check the value and disable the button if necessary
    bidAmountInput.addEventListener('input', function(event) {
        var bidAmount = parseFloat(event.target.value);
        if (isNaN(bidAmount) || bidAmount > maxBidAmount) {
            bidButton.disabled = true;
        } else {
            bidButton.disabled = false;
        }
    });
</script>


{{-- END OF ORDER CONTAINER --}}
