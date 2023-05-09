    <head>
        <link rel="stylesheet" href="{{ asset('css/style_order.css') }}">
        <title>Company | Order Tracking #{{$ship->id}}</title>
    </head>
    {{-- @include('partials.navigation', ['waybill' => 'fw-bold']) --}}
    @extends('layouts.app')
    @include('partials.navigationCompany')

    <style>
        th {
            background-color: transparent !important;
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
    <main class="container py-5" style="margin-top:-49px !important">
        <div class="mt-4">
            <h3 class="" style="border-bottom: 2px solid black; padding-bottom: 5px; letter-spacing:1px;">Order Tracking #{{$ship->id}}</h3>
        </div>
        <div class="order-container container">
            <div class="cards-holder">
                <card class="item-card bg-white btn-wrapper p-4">
                    {{--START OF ORDER DETAILS--}}
                    <!-- Mobile Sender and Receiver -->
                    <div class="row overflow-hidden">
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
                                </div>
                                <hr class="opacity-75 d-block d-lg-none">
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
                                    @if($ship->bid_amount != null && $ship->company_id != null)
                                        <tr>
                                            <th>Company:</th>
                                            <td>{{$company_name}}</td>
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
                                        <td>{{$ship->mop}}</td>
                                    </tr>
                                    @if($ship->bid_amount != null && $ship->company_id != null)
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
                        <div class="col-xl-3 text-center"">
                            <a href="{{asset($ship->photo)}}" target="_blank">
                                <img src="{{asset($ship->photo)}}" class="card shadow-0 w-100" alt="television"
                                  style="object-fit:cover; min-width:140px; max-width:509px; max-height:250px; margin-left: auto; margin-right: auto;">
                            </a>
                            <a href="{{route('generateInvoice',$ship->id)}}" target="_blank">
                                <button type="button" class="btn btn-primary btn-block shadow-0 my-1" style="background-color: #214D94; min-width:140px; max-width:509px;">
                                Invoice
                                </button>
                            </a>
                            <a href="{{route('generateWaybill',$ship->id)}}" target="_blank">
                                <button type="button" class="btn btn-dark btn-block shadow-0 my-1" style="min-width:140px; max-width:509px;">
                                Waybill
                                </button>
                            </a>
                            @if($ship->station_id == null && $ship->status == "Assort")
                                @include('company.order.transfer')
                            @endif
                            <a href="{{route('viewOrder_Company', $ship->id)}}">
                                <div class="my-1">
                                    <button type="button" class="btn btn-block btn-dark shadow-0 mb-1" style="min-width:140px; max-width:509px;">
                                    BACK
                                    </button>
                                </div>
                            </a>
                        </div>
                    </div>
                    <hr class="opacity-75">
                    {{--END OF ORDER DETAILS--}}

                    {{-- TRACKING ORDER START --}}
                    <div id="order-status-container">
                        <div class="row justify-content-center overflow-hidden">
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
                                                            <span class="bg-light rounded-circle d-flex align-items-center justify-content-center bg-dark"
                                                             style="width:80px; height:80px;">
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
                                                            <span class="bg-light rounded-circle d-flex align-items-center justify-content-center bg-dark"
                                                             style="width:80px; height:80px;">
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
                                                            <span class="bg-light rounded-circle d-flex align-items-center justify-content-center bg-dark"
                                                             style="width:80px; height:80px;">
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
                                                            <span class="bg-light rounded-circle d-flex align-items-center justify-content-center bg-dark"
                                                             style="width:80px; height:80px;">
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
                                                            <span class="bg-light rounded-circle d-flex align-items-center justify-content-center bg-dark"
                                                             style="width:80px; height:80px;">
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
                                                            <span class="bg-light rounded-circle d-flex align-items-center justify-content-center bg-dark"
                                                             style="width:80px; height:80px;">
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
                                                            <span class="bg-light rounded-circle d-flex align-items-center justify-content-center bg-dark"
                                                             style="width:80px; height:80px;">
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
                                                            <span class="bg-light rounded-circle d-flex align-items-center justify-content-center bg-dark"
                                                             style="width:80px; height:80px;">
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
                    {{-- END OF TRACKING ORDER --}}
                </card>
            </div>
        </div>
    </main>
    {{-- END OF ORDER CONTAINER --}}
