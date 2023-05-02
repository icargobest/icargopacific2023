    <head>
        <link rel="stylesheet" href="{{ asset('css/style_order.css') }}">
        @extends('layouts.app')
        @extends('layouts.status')
        <link rel="stylesheet" href="./line-awesome.min.css">
        <title>Customer | Tracking Order #{{$ship->id}}</title>
    </head>
    {{-- @include('partials.navigation', ['waybill' => 'fw-bold']) --}}
    @include('layouts.app')
    @include('partials.navigationUser',['order' => "nav-selected"])

    <style>
        th {
            background-color: white !important;
            color: black;
        }
        td {
            text-align: left;
            padding: 5px;
            color: #214D94;
        }
            .status-green {
            color: #00bf9a;
        }
    </style>
    
    {{-- ORDER CONTAINER RECONCEPTUALIZE --}}
        <div class="order-container container">
                <h4 class="text-dark">TRACKING ORDER #{{$ship->id}}</h4>
                <div class="cards-holder">
                    <card class="item-card bg-white btn-wrapper p-4">
                        {{--START OF ORDER DETAILS--}}
                        <!-- Mobile Sender and Receiver -->
                        <div class="row overflow-auto">
                            <!-- Product Information -->
                            <div class="col-xl-9">
                                <div class="row">
                                    <div class="col-lg-6 pt-2">
                                        <table style="width:100%">
                                        <tr>
                                            <th colspan="2"><h5 class="fw-bold opacity-75">SENDER</h5></th> <!-- This code is here because of nagiging vertical yung sender -->
                                        </tr>
                                        <tr>
                                            <th width="40%">Name:</th>
                                            <td width="60%">{{$ship->sender->sender_name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Address:</th>
                                            <td>{{$ship->sender->sender_address}} , {{$ship->sender->sender_city}} , {{$ship->sender->sender_state}} , {{$ship->sender->sender_zip}}</td>
                                        </tr>
                                        <tr>
                                            <th>Contact Number:</th>
                                            <td>{{$ship->sender->sender_mobile}} @if($ship->sender->sender_tel != NULL) | {{$ship->sender->sender_tel}} @endif</td>
                                        </tr>
                                        <tr>
                                            <th>Email:</th>
                                            <td>{{$ship->sender->sender_email}}</td>
                                        </tr>
                                        </table>
                                        </table>
                                    </div>
                                    <div class="col-lg-6 pt-2">
                                        <table style="width:100%">
                                        <tr>
                                            <th colspan="2"><h5 class="fw-bold opacity-75">RECEIVER</h5></th> <!-- This code is here because of nagiging vertical yung sender -->
                                        </tr>
                                        <tr>
                                            <th width="40%">Name:</th>
                                            <td width="60%">{{$ship->recipient->recipient_name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Address:</th>
                                            <td>{{$ship->recipient->recipient_address}} , {{$ship->recipient->recipient_city}} , {{$ship->recipient->recipient_state}} , {{$ship->recipient->recipient_zip}}</td>
                                            </tr>
                                        <tr>
                                            <th>Contact Number:</th>
                                            <td>{{$ship->recipient->recipient_mobile}} @if($ship->recipient->recipient_tel != NULL) | {{$ship->recipient->recipient_tel}} @endif</td>
                                        </tr>
                                        <tr>
                                            <th>Email:</th>
                                            <td>{{$ship->recipient->recipient_email}}</td>
                                        </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <hr class="opacity-75">
                                    </div>
                                </div>
                                <div class="row">
                                    <h5 class="fw-bold opacity-75">PARCEL INFORMATION</h5>
                                    <div class="col-lg-6 pt-2">
                                        <table style="width:100%">
                                        <tr>
                                            <th width="40%">ID:</th>
                                            <td width="60%">{{$ship->id}}</td>
                                        </tr>
                                        <tr>
                                            <th>Size & Weight:</th>
                                            <td>{{intval($ship->length)}}x{{intval($ship->width)}}x{{intval($ship->height)}} | {{intval($ship->weight)}}Kg</td>
                                        </tr>
                                        @if($ship->bid_amount != null && $ship->company_bid != null)
                                            <tr>
                                                <th>Company:</th>
                                                <td>{{$ship->company_bid}}</td>
                                            </tr>
                                        @endif
                                        </table>
                                    </div>
                                    <div class="col-lg-6">
                                        <table style="width:100%">
                                        <tr>
                                            <th width="40%">Category:</th>
                                            <td width="60%">{{$ship->category}}</td>
                                        </tr>
                                        <tr>
                                            <th>Mode of Payment:</th>
                                            <td>COD</td>
                                        </tr>
                                        @if($ship->bid_amount != null && $ship->company_bid != null)
                                            <tr>
                                                <th>Bid Amount:</th>
                                                <td>{{$ship->bid_amount}}</td>
                                            </tr>
                                        @endif
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 d-xl-none">
                                        <hr class="opacity-75">
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Product Image -->
                            <div class="col-xl-3">
                                <div>
                                    <!-- <img src="{{asset($ship->photo)}}" class="card shadow-0 w-100" alt="television"  style="object-fit:contain; min-width:140px; max-width:509px;"> -->
                                    <img class="card shadow-0 w-100" style="object-fit:contain; min-width:140px; max-width:509px;" src="https://images.unsplash.com/photo-1600331073565-d1f0831de6cb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=885&q=80" alt="">
                                    <div class="text-center">
                                        <a href="{{route('generate',$ship->id)}}" target="_blank">
                                            <button type="button" class="btn btn-primary primary btn-block shadow-0 my-1" style="min-width:140px; max-width:509px;">
                                            Invoice
                                            </button>
                                        </a>
                                        <a href="{{route('user.generateWaybill', $ship->id)}}">
                                            <button type="button" class="btn btn-dark btn-block shadow-0 my-1" style="min-width:140px; max-width:509px;">
                                            Waybill
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="opacity-75">
                        {{--END OF ORDER DETAILS--}}

                        {{-- TRACKING ORDER START --}}
                        <div id="order-status-container">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Order Summary</h3>
                                    @foreach($logs as $log)
                                        @if($ship->id == $log->order_id)
                                            @if($log->isDelivered == true)
                                                <div class="card mb-3">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Order Status: Delivered</h5>
                                                        <p class="card-text">Your order has been delivered.</p>
                                                        <p class="card-text">Date : {{$log->isDeliveredTime}}</p>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($log->isDispatched == true)
                                                <div class="card mb-3">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Order Status: In Transit</h5>
                                                        <p class="card-text">Your order is out for delivery.</p>
                                                        <p class="card-text">Date : {{$log->isDispatchedTime}}</p>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($log->isArrived == true)
                                                <div class="card mb-3">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Order Status: Arrived at {{$ship->station_id}}</h5>
                                                        <p class="card-text">Your order has been arrived at sorting facility.</p>
                                                        <p class="card-text">Date : {{$log->isArrivedTime}}</p>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($log->isTransferred == true)
                                                <div class="card mb-3">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Order Status: Transferred</h5>
                                                        <h5 class="card-text">Transferred to Station: {{$ship->station_id}}</h5>
                                                        <p class="card-text">Your order has already been transferred to another station.</p>
                                                        <p class="card-text">Date : {{$log->isTransferredTime}}</p>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($log->isAssort == true)
                                                <div class="card mb-3">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Order Status: Arrived at (current_station)</h5>
                                                        <p class="card-text">Your order is already been picked up by our logistic Company.</p>
                                                        <p class="card-text">Date : {{$log->isAssortTime}}</p>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($log->isPickUp == true)
                                                <div class="card mb-3">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Order Status: Picked Up</h5>
                                                        <p class="card-text">Your order is already been picked up by our logistic Company.</p>
                                                        <p class="card-text">Date : {{$log->isPickUpTime}}</p>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($log->isProcessed == true)
                                                <div class="card mb-3">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Order Status: Processing</h5>
                                                        <p class="card-text">Your order is currently being processed.</p>
                                                        <p class="card-text">Date : {{$log->isProcessedTime}}</p>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($log->isPending == true)
                                                <div class="card mb-3">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Order Status: Pending</h5>
                                                        <p class="card-text">Your order is currently pending.</p>
                                                        <p class="card-text">Date : {{$log->isPendingTime}}</p>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {{-- END OF TRACKING ORDER --}}
                    </card>
                </div>  
            </div>
        </div>
    {{-- END OF ORDER CONTAINER --}}