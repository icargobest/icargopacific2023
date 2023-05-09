<head>
    <link rel="stylesheet" href="{{ asset('css/style_order.css') }}">
    <title>Orders</title>
  </head>

  {{-- @include('partials.navigation', ['waybill' => 'fw-bold']) --}}
  @include('layouts.app')
  @include('partials.navigationStaff')

{{-- ORDER CONTAINER RECONCEPTUALIZE --}}
<div class="order-container container">


  <h4>TRACKING ORDER</h4>


  <div class="text-center">
    <a href="{{route('viewInvoiceStaff',$ship->id)}}" target="_blank" class="btn btn-primary btn-sm col-1">
        Invoice
    </a>
    <a href="{{route('staff.generateWaybill', $ship->id)}}" class="btn btn-dark btn-sm col-1">
        Waybill
    </a>

    @if($ship->station_id == null && $ship->status == "Assort")
        @include('staff_panel.order.transfer')
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
                                <li>Company | <span>{{$company_name}}</span></li>
                            </ul>
                        </div>
                        <div class="listLayout col-lg-6 col-sm-12">
                            <ul>
                                <li>Category | <span>{{$ship->category}}</span></li>
                                <li>Mode of Pament | <span>{{$ship->mop}}</span></li>
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
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <!-- <h3>Order Summary</h3> -->
                    @foreach($logs as $log)
                        @if($ship->id == $log->order_id)
                            @if($log->isDelivered == true)
                                <h4 class="fw-bold border-0">DELIVERED</h4>
                                <div class="card mb-3" style="background-color: #66D066;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-2 d-none d-lg-block">
                                                <span class="bg-light rounded-circle d-flex align-items-center justify-content-center bg-dark" style="width:80px; height:80px;">
                                                    <i class="bi bi-archive-fill fa-3x" style="color: #66D066;"></i>
                                                </span>
                                            </div>
                                            <div class="col-lg-5">
                                                <h5 class="card-title border-0 fw-bold">YOUR ORDER HAS BEEN DELIVERED</h5>
                                                <p class="card-text mb-0">{{ date('Y-m-d h:i:s A', strtotime($log->isDeliveredTime)) }}</p>

                                            </div>
                                            <div class="col-lg-5 mt-lg-5 text-sm-end">
                                                <p class="card-text mb-0" >Company:</p>
                                                <h5 class="card-title fw-bold mb-0">{{$company_name}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($log->isDispatched == true)
                                <h4 class="fw-bold border-0">IN TRANSIT</h4>
                                <div class="card mb-3" style="background-color: #D9D9D9;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-2 d-none d-lg-block">
                                                <span class="bg-light rounded-circle d-flex align-items-center justify-content-center bg-dark" style="width:80px; height:80px;">
                                                    <i class="fa fa-truck fa-3x" style="color: #D9D9D9;"></i>
                                                </span>
                                            </div>
                                            <div class="col-lg-5">
                                                <h5 class="card-title border-0 fw-bold">YOUR ORDER IS OUT FOR DELIVERY</h5>
                                                <p class="card-text mb-0">{{ date('Y-m-d h:i:s A', strtotime($log->isDispatchedTime)) }}</p>
                                            </div>
                                            <div class="col-lg-5 mt-lg-5 text-sm-end">
                                                <p class="card-text mb-0" >Company:</p>
                                                <h5 class="card-title fw-bold mb-0">{{$company_name}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($log->isArrived == true)
                                <h4 class="fw-bold border-0">ARRIVED AT {{$ship->station_id}}</h4>
                                <div class="card mb-3" style="background-color: #D9D9D9;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-2 d-none d-lg-block">
                                                <span class="bg-light rounded-circle d-flex align-items-center justify-content-center bg-dark" style="width:80px; height:80px;">
                                                    <i class="fa fa-sort fa-3x" style="color: #D9D9D9;"></i>
                                                </span>
                                            </div>
                                            <div class="col-lg-5">
                                                <h5 class="card-title border-0 fw-bold">YOUR ORDER HAS ARRIVED AT SORTING FACILITY</h5>
                                                <p class="card-text mb-0">{{ date('Y-m-d h:i:s A', strtotime($log->isArrivedTime)) }}</p>

                                            </div>
                                            <div class="col-lg-5 mt-lg-5 text-sm-end">
                                                <p class="card-text mb-0" >Company:</p>
                                                <h5 class="card-title fw-bold mb-0">{{$company_name}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($log->isTransferred == true)
                                <h4 class="fw-bold border-0">TRANSFERRED TO STATION: {{$ship->station_id}}</h4>
                                <div class="card mb-3" style="background-color: #D9D9D9;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-2 d-none d-lg-block">
                                                <span class="bg-light rounded-circle d-flex align-items-center justify-content-center bg-dark" style="width:80px; height:80px;">
                                                    <i class="fa fa-scanner-gun fa-3x" style="color: #D9D9D9;"></i>
                                                </span>
                                            </div>
                                            <div class="col-lg-5">
                                                <h5 class="card-title border-0 fw-bold">YOUR ORDER HAS ALREADY BEEN TRANSFERRED TO ANOTHER STATION</h5>
                                                <p class="card-text mb-0">{{ date('Y-m-d h:i:s A', strtotime($log->isTransferredTime)) }}</p>

                                            </div>
                                            <div class="col-lg-5 mt-lg-5 text-sm-end">
                                                <p class="card-text mb-0" >Company:</p>
                                                <h5 class="card-title fw-bold mb-0">{{$company_name}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($log->isAssort == true)
                                <h4 class="fw-bold border-0">ARRIVED AT (current_station)</h4>
                                <div class="card mb-3" style="background-color: #D9D9D9;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-2 d-none d-lg-block">
                                                <span class="bg-light rounded-circle d-flex align-items-center justify-content-center bg-dark" style="width:80px; height:80px;">
                                                    <i class="fa fa-hand-holding fa-3x" style="color: #D9D9D9;"></i>
                                                </span>
                                            </div>
                                            <div class="col-lg-5">
                                                <h5 class="card-title border-0 fw-bold">YOUR ORDER IS ALREADY BEEN PICKED UP BY LOGISTIC COMPANY</h5>
                                                <p class="card-text mb-0">{{ date('Y-m-d h:i:s A', strtotime($log->isAssortTime)) }}</p>

                                            </div>
                                            <div class="col-lg-5 mt-lg-5 text-sm-end">
                                                <p class="card-text mb-0" >Company:</p>
                                                <h5 class="card-title fw-bold mb-0">{{$company_name}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($log->isPickUp == true)
                                <h4 class="fw-bold border-0">PICKED UP</h4>
                                <div class="card mb-3" style="background-color: #D9D9D9;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-2 d-none d-lg-block">
                                                <span class="bg-light rounded-circle d-flex align-items-center justify-content-center bg-dark" style="width:80px; height:80px;">
                                                    <i class="bi bi-archive-fill fa-3x" style="color: #D9D9D9;"></i>
                                                </span>
                                            </div>
                                            <div class="col-lg-5">
                                                <h5 class="card-title border-0 fw-bold">YOUR ORDER IS ALREADY BEEN PICKED UP BY LOGISTIC COMPANY</h5>
                                                <p class="card-text mb-0">{{ date('Y-m-d h:i:s A', strtotime($log->isPickUpTime)) }}</p>

                                            </div>
                                            <div class="col-lg-5 mt-lg-5 text-sm-end">
                                                <p class="card-text mb-0" >Company:</p>
                                                <h5 class="card-title fw-bold mb-0">{{$company_name}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($log->isProcessed == true)
                                <h4 class="fw-bold border-0">PROCESSING</h4>
                                <div class="card mb-3" style="background-color: #D9D9D9;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-2 d-none d-lg-block">
                                                <span class="bg-light rounded-circle d-flex align-items-center justify-content-center bg-dark" style="width:80px; height:80px;">
                                                    <i class="fa fa-hand-holding fa-3x" style="color: #D9D9D9;"></i>
                                                </span>
                                            </div>
                                            <div class="col-lg-5">
                                                <h5 class="card-title border-0 fw-bold">YOUR ORDER IS CURRENTLY BEING PROCESSED</h5>
                                                <p class="card-text mb-0">{{ date('Y-m-d h:i:s A', strtotime($log->isProcessedTime)) }}</p>

                                            </div>
                                            <div class="col-lg-5 mt-lg-5 text-sm-end">
                                                <p class="card-text mb-0" >Company:</p>
                                                <h5 class="card-title fw-bold mb-0">{{$company_name}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($log->isPending == true)
                                <h4 class="fw-bold border-0">PENDING</h4>
                                <div class="card mb-3" style="background-color: #D9D9D9;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-2 d-none d-lg-block">
                                                <span class="bg-light rounded-circle d-flex align-items-center justify-content-center bg-dark" style="width:80px; height:80px;">
                                                    <i class="bi bi-check-circle-fill fa-3x" style="color: #D9D9D9;"></i>
                                                </span>
                                            </div>
                                            <div class="col-lg-5">
                                                <h5 class="card-title border-0 fw-bold">YOUR ORDER IS CURRENTLY PENDING</h5>
                                                <p class="card-text mb-0">{{ date('Y-m-d h:i:s A', strtotime($log->isPendingTime)) }}</p>

                                            </div>
                                            <div class="col-lg-5 mt-lg-5 text-sm-end">
                                                <p class="card-text mb-0" >Company:</p>
                                                <h5 class="card-title fw-bold mb-0">{{$company_name}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

{{-- END OF ORDER CONTAINER --}}
