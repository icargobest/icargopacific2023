    <!-- Exp start -->
    <button type="button" class="btn text-white btn-block mb-1" style="background-color:#214D94;" data-bs-toggle="modal" data-bs-target="#viewModal{{$ship->id}}">
    VIEW
    </button>
    <!-- tracking modal -->
    <div class="modal fade" id="viewModal{{$ship->id}}" aria-hidden="true" aria-labelledby="trackingModalToggleLabel" tabindex="-1" data-bs-backdrop="true" >
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- title -->
                    <h4 class="modal-title mb-0" id="trackingModalToggleLabel">ORDER DETAILS</h4>
                    <!-- close button -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- modal content -->
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <!-- Product Image -->
                            <div class="col-xl-6 ">
                                <img class="card shadow-0 img-size w-100" src="https://images.unsplash.com/photo-1600331073565-d1f0831de6cb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=885&q=80" alt="">
                                <!-- <img class="card shadow-0 img-size" src="{{asset($ship->photo)}}" alt=""> -->
                                <div class="d-flex justify-content-center">
                                <button class="btn btn-warning opacity-50 w-75 my-3 px-3 py-2 btn-block" disabled>
                                    <h6 class="mb-0 fw-bold text-capitalize">Minimum Bid: Php {{$ship->min_bid_amount}}</h6>
                                </button>
                                </div>
                                <div class="row align-items-end">
                                    @if($ship->company_bid != NULL && $ship->bid_amount != NULL)
                                    <div class="col-md-12 d-flex justify-content-center">
                                        <a href="{{route('trackOrder_Company',$ship->id)}}" class="btn text-white btn-block " style="background-color:#214D94;">
                                            Track Order
                                        </a>
                                    </div>
                                    @else
                                        <div class="col-sm-8">
                                            <form method="POST" action="{{route('addBid')}}">
                                            @csrf
                                            <input type="hidden" name="company_id" value="{{Auth::user()->id}}" />
                                            <input type="hidden" name="company_name" value="{{Auth::user()->name}}" />
                                            <input type="hidden" name="shipment_id" value="{{$ship->id}}" />
                                            <label class="control-label control-label-left fw-bold">BID<span class="required"></span></label>
                                            <input type="number" class="form-control typeahead btn-block w-100" placeholder="BID AMOUNT" id="form6Example3" id="bidAmount" name="bid_amount" required/>
                                        </div>
                                        <div class="col-sm-4">
                                            <button type="submit" class="btn btn-warning mt-2" id="bidButton"> 
                                                BID NOW
                                            </button>
                                        </div>
                                    </form>
                                    @endif
                                </div>
                            </div>
                            <!-- Product Information -->
                            <div class="col-xl-6">
                                <div class="row">
                                    <table class="m-2"style="width:100%">
                                        <tr>
                                            <th><h5 class="fw-bold opacity-75">SENDER</h5></th> 
                                        </tr>
                                        <tr>
                                            <th>Name:</th>
                                            <td>{{$ship->sender->sender_name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Address:</th>
                                            <td>{{$ship->sender->sender_address}}, {{$ship->sender->sender_city}}, {{$ship->sender->sender_state}}, {{$ship->sender->sender_zip}}</td>
                                        </tr>
                                        <tr>
                                            <th>Contact Number:</th>
                                            <td>{{$ship->sender->sender_mobile}} @if($ship->sender->sender_tel != NULL) | {{$ship->sender->sender_tel}} @endif</td>
                                        </tr>
                                    </table>
                                    <hr class="opacity-75">
                                    <table class="m-2"style="width:100%">
                                        <tr>
                                            <th><h5 class="fw-bold opacity-75">RECEIVER</h5></th> 
                                        </tr>
                                        <tr>
                                            <th>Name:</th>
                                            <td>{{$ship->recipient->recipient_name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Address:</th>
                                            <td>{{$ship->recipient->recipient_address}}, {{$ship->recipient->recipient_city}}, {{$ship->recipient->recipient_state}}, {{$ship->recipient->recipient_zip}}</td>
                                        </tr>
                                        <tr>
                                            <th>Contact Number:</th>
                                            <td>{{$ship->recipient->recipient_mobile}} @if($ship->recipient->recipient_tel != NULL) | {{$ship->recipient->recipient_tel}} @endif</td>
                                        </tr>
                                    </table>
                                    <hr class="opacity-75">
                                    <table class="m-2"style="width:100%">
                                        <tr>
                                            <th><h5 class="fw-bold opacity-75">PARCEL INFORMATION</h5></th> 
                                        </tr>
                                        <tr>
                                            <th>ID:</th>
                                            <td>{{$ship->id}}</td>
                                        </tr>
                                        <tr>
                                            <th>Size & Weight:</th>
                                            <td>{{intval($ship->length)}}x{{intval($ship->width)}}x{{intval($ship->height)}} | {{intval($ship->weight)}}Kg</td>
                                        </tr>
                                        <tr>
                                        <th>Parcel Item:</th>
                                            <td>{{$ship->category}}</td>
                                        </tr>
                                        <tr>
                                            <th>Freight Charges:</th>
                                            <td>Php 68</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr class="opacity-75">
                        <section class="overflow-auto">
                            <table class="table table-striped table-hover">
                                <thead>
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
                                            <tbody class="table table-striped">
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
                            </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Exp end -->

    <script>
        // Get the minimum bid amount from the HTML using PHP
        var minBidAmount = {{$ship->min_bid_amount}};
    
        // Get a reference to the bid amount input field and the bid button
        var bidAmountInput = document.getElementById('form6Example3');
        var bidButton = document.getElementById('bidButton');
    
        // Add an event listener to the bid amount input field to check the value and disable the button if necessary
        bidAmountInput.addEventListener('input', function(event) {
            var bidAmount = parseFloat(event.target.value);
            if (isNaN(bidAmount) || bidAmount < minBidAmount) {
                bidButton.disabled = true;
            } else {
                bidButton.disabled = false;
            }
        });
    </script>
