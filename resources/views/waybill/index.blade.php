<head>
  <link rel="stylesheet" href="{{ asset('css/style_order.css') }}">
  <title>Orders</title>
</head>

{{-- @include('partials.navigation', ['waybill' => 'fw-bold']) --}}
@include('layouts.app')
@include('partials.navigationUser')

{{-- ORDER CONTAINER RECONCEPTUALIZE --}}
<div class="order-container container">

  <h4>MY ITEMS</h4>
  <div class="button-holder mb-3">
    <a href="/waybillForm">
      <button type="button" class="btn btn-primary">
        Post Order
      </button>
    </a>
  </div>

  <div class="cards-holder">

{{-- CARD CREATED AFTER FILLING UP --}}
<a class="cardItem" href="#">
    <div class="item-card container px-4">
      <div class="card-body">
        <div class="row">
  
          <div class="details-wrapper col-lg-10 col-sm-12">
            <div class="recepients-wrapper row">
  
              <div class="senderInfo col-lg-6">
                <h6>SENDER</h6>
  
                <ul>
                    <li>Name | <span>Edan Franco</span></li>
                    <li>Address | <span>Kristen Griffit</span></li>
                    <li>Number | <span>0999-999-9999</span></li>
                </ul>                  
              </div>
              <div class="receiverInfo col-lg-6">
                <h6>RECEIVER</h6>
  
                <ul>
                    <li>Name | <span>Fletcher Peck</span></li>
                    <li>Address | <span>Maxwell Wood</span></li>
                    <li>Number | <span>0999-999-9999</span></li>
                </ul>
              </div>
  
            </div>
            <div class="parcelInfo-wrapper">
  
              <div class="itemInfo">
                <h6>ITEM INFORMATION</h6>
  
                <div class="parcelDetails row">
  
                  <div class="listLayout col-lg-6 col-sm-12">
                    <ul>
                          <li>ID | <span>#68</span></li>
                          <li>Size & Weight | <span>17x30x41 | 97 kg</span></li>
                    </ul>
                  </div>
                  <div class="listLayout col-lg-6 col-sm-12">
                    <ul>     
                          <li>Category | <span>Appliances</span></li>
                          <li>Mode of Pament | <span>COD</span></li>
                    </ul>
                  </div>
  
                </div>
              </div>
  
            </div>
          </div>
  
          <div class="image-wrapper col">
            <div class="image-holder">
              <img src="https://images.unsplash.com/photo-1600331073565-d1f0831de6cb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=885&q=80" alt="">
            </div>
          </div>
  
        </div>
      </div>
    </div>
</a>
{{-- END OF CARD --}}


{{-- CARD CREATED AFTER FILLING UP --}}
<a class="cardItem" href="#">
  <div class="item-card container px-4">
    <div class="card-body">
      <div class="row">

        <div class="details-wrapper col-lg-10 col-sm-12">
          <div class="recepients-wrapper row">

            <div class="senderInfo col-lg-6">
              <h6>SENDER</h6>

              <ul>
                  <li>Name | <span>Edan Franco</span></li>
                  <li>Address | <span>Kristen Griffit</span></li>
                  <li>Number | <span>0999-999-9999</span></li>
              </ul>                  
            </div>
            <div class="receiverInfo col-lg-6">
              <h6>RECEIVER</h6>

              <ul>
                  <li>Name | <span>Fletcher Peck</span></li>
                  <li>Address | <span>Maxwell Wood</span></li>
                  <li>Number | <span>0999-999-9999</span></li>
              </ul>
            </div>

          </div>
          <div class="parcelInfo-wrapper">

            <div class="itemInfo">
              <h6>ITEM INFORMATION</h6>

              <div class="parcelDetails row">

                <div class="listLayout col-lg-6 col-sm-12">
                  <ul>
                        <li>ID | <span>#68</span></li>
                        <li>Size & Weight | <span>17x30x41 | 97 kg</span></li>
                  </ul>
                </div>
                <div class="listLayout col-lg-6 col-sm-12">
                  <ul>     
                        <li>Category | <span>Appliances</span></li>
                        <li>Mode of Pament | <span>COD</span></li>
                  </ul>
                </div>

              </div>
            </div>

          </div>
        </div>

        <div class="image-wrapper col">
          <div class="image-holder">
            <img src="https://images.unsplash.com/photo-1600331073565-d1f0831de6cb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=885&q=80" alt="">
          </div>
        </div>

      </div>
    </div>
  </div>
</a>
{{-- END OF CARD --}}


{{-- CARD CREATED AFTER FILLING UP --}}
<a class="cardItem" href="#">
  <div class="item-card container px-4">
    <div class="card-body">
      <div class="row">

        <div class="details-wrapper col-lg-10 col-sm-12">
          <div class="recepients-wrapper row">

            <div class="senderInfo col-lg-6">
              <h6>SENDER</h6>

              <ul>
                  <li>Name | <span>Edan Franco</span></li>
                  <li>Address | <span>Kristen Griffit</span></li>
                  <li>Number | <span>0999-999-9999</span></li>
              </ul>                  
            </div>
            <div class="receiverInfo col-lg-6">
              <h6>RECEIVER</h6>

              <ul>
                  <li>Name | <span>Fletcher Peck</span></li>
                  <li>Address | <span>Maxwell Wood</span></li>
                  <li>Number | <span>0999-999-9999</span></li>
              </ul>
            </div>

          </div>
          <div class="parcelInfo-wrapper">

            <div class="itemInfo">
              <h6>ITEM INFORMATION</h6>

              <div class="parcelDetails row">

                <div class="listLayout col-lg-6 col-sm-12">
                  <ul>
                        <li>ID | <span>#68</span></li>
                        <li>Size & Weight | <span>17x30x41 | 97 kg</span></li>
                  </ul>
                </div>
                <div class="listLayout col-lg-6 col-sm-12">
                  <ul>     
                        <li>Category | <span>Appliances</span></li>
                        <li>Mode of Pament | <span>COD</span></li>
                  </ul>
                </div>

              </div>
            </div>

          </div>
        </div>

        <div class="image-wrapper col">
          <div class="image-holder">
            <img src="https://images.unsplash.com/photo-1600331073565-d1f0831de6cb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=885&q=80" alt="">
          </div>
        </div>

      </div>
    </div>
  </div>
</a>
{{-- END OF CARD --}}

  </div>


</div>
{{-- END OF ORDER CONTAINER --}}


    <!--Waybill List-->
    <div class="container">
      <div class="card">
      <div class="card-body overflow-x-scroll">
        <h4>Order List</h4>
       {{--  @if(Auth::user()->type =='user') --}}
        <div class="d-grid gap-2 d-md-flex row p-3">
          <div class="tex-wrap">
            <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
              Create Order
            </button>

            <!--Sender Modal -->
            <div class="modal top fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:white">SENDER INFORMATION</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="{{route('addShipment')}}">
                        {{-- <h1>SENDER INFO</h1> --}}
                        @csrf
<<<<<<< HEAD
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}" class="form-control" />
                        <div class="form-outline mb-4">
                            <input type="text" id="form6Example1" name="stationID" class="form-control" />
                            <label class="form-label" for="form6Example1">Station ID</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" id="form6Example1" name="stationName" class="form-control" />
                            <label class="form-label" for="form6Example1">Station Name</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" id="form6Example1" name="senderName" class="form-control" />
                            <label class="form-label" for="form6Example1">Full Name</label>
                        </div>
                      <!-- Address input -->
                      <div class="form-outline mb-4">
                        <input type="text" id="form6Example5" name="senderAddress" class="form-control" />
                        <label class="form-label" for="form6Example5">Street Address</label>
                      </div>
=======
                        <input type="hidden" name="user_id" value="{{-- {{Auth::user()->id}} --}}" class="form-control" />
>>>>>>> develop

                        {{-- NAME INPUT --}}
                        <div class="nameInput mb-3">
                          <span>Full Name <span class="required">*</span></span>
                          <div class="form-outline">
                            <input type="text" id="form6Example1" name="senderName" class="form-control" required />
                            {{-- <label class="form-label" for="form6Example1">Full Name</label> --}}
                          </div>

                        </div>
                        
                      <div class="addressInput mb-3">
                        <span>Street Address <span class="required">*</span></span>
                        <div class="form-outline">
                          <input type="text" id="form6Example5" name="senderAddress" class="form-control" required />
                          {{-- <label class="form-label" for="form6Example5">Street Address</label> --}}
                        </div>  

                      </div>
                      
                      <!-- Contact input -->
                      <div class="row mb-3">
                        <div class="col">

                          {{-- MOBILE INPUT --}}
                          <div class="mobileInput">
                            <span>Mobile Number <span class="required">*</span></span>
                              <input type="text" id="form6Example3" name="senderMobile" class="form-control" required />
                              {{-- <label class="form-label" for="form6Example3">Mobile Number</label> --}}

                            </div>
                          </div>
                            
                        </div>

                        <div class="col">

                          {{-- TELEPHONE INPUT --}}
                          <div class="telephoneInput">
                            <span>Telephone <span class="required">*</span></span>
                            <div class="form-outline">
                              <input type="text" id="form6Example3" name="senderTelephone" class="form-control" required />
                              {{-- <label class="form-label" for="form6Example3">Telephone</label> --}}
                            </div>
                          </div>
                            
                        </div>
                      </div>
                      {{-- EMAIL INPUT --}}
                      <div class="emailInput mb-3">
                        <span>Email Address <span class="required">*</span></span>
                        <div class="form-outline">
                          <input type="email" id="form6Example5" name="senderEmail" class="form-control" required />
                          {{-- <label class="form-label" for="form6Example5">Email Address</label> --}}
                        </div> 
                      </div>
                      

                      <!-- City Zip input -->
                      <div class="row mb-3">

                        <div class="col">
                          {{-- MUNICIPALITY --}}
                          <div class="municipalityInput">
                            <span>Municipality/ City <span class="required">*</span></span>
                            <div class="form-outline">
                              <input type="text" id="form6Example3" name="senderCity" class="form-control" required />
                              {{-- <label class="form-label" for="form6Example3">Municipality/City</label> --}}

                            </div>
                          </div>
                            
                        </div>

                        <div class="col">
                            {{-- POSTAL --}}
                            <div class="postalInput">
                              <span>Postal Code <span class="required">*</span></span>
                              <div class="form-outline">
                                <input type="text" id="form6Example3" name="senderZip" class="form-control" required />
                                {{-- <label class="form-label" for="form6Example3">Postal Code</label> --}}
                              </div>

                            </div>
                            
                        </div>
                      </div>

                      <!--State input-->
                      <div class="stateInput">
                        <span>State <span class="required">*</span></span>
                        <div class="form-outline">
                          <input type="text" id="form6Example3" name="senderState" class="form-control" required />
                          {{-- <label class="form-label" for="form6Example3">State</label> --}}

                      </div>
                      
                  </div>
                  <div class="modal-buttons modal-footer">
                    <a class="btn btn-secondary btn" data-mdb-dismiss="modal">
                        Back
                    </a>
                    <a class="btn btn-primary btn" data-mdb-toggle="modal" data-mdb-target="#exampleModal1" data-bs-dismiss="modal">
                      Next
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <!--Receiver Modal-->
            <div class="modal top fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
                <div class="modal-dialog  modal-dialog-centered modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel "style="color:white">RECEIVER INFORMATION</h5>
                      <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                          {{-- <h1>RECEIVER INFO</h1> --}}
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        
                        {{-- NAME INPUT --}}
                        <div class="nameInput mb-3">
                          <span>Full Name <span class="required">*</span></span>
                          <div class="form-outline">
                            <input type="text" id="form6Example1" name="receiverName" class="form-control" />
                            {{-- <label class="form-label" for="form6Example1">Full Name</label> --}}
                          </div>
                        </div>

                        <!-- Address input -->
                        <div class="addressInput mb-3">
                          <span>Address <span class="required">*</span></span>
                          <div class="form-outline">
                            <input type="text" id="form6Example5" name="receiverAddress" class="form-control" />
                            {{-- <label class="form-label" for="form6Example5">Street Address</label> --}}
                          </div>  

                        </div>
                        
                        <!-- Contact input -->
                        <div class="row mb-3">
                          <div class="col">

                            {{-- MOBILE INPUT --}}
                            <div class="mobileInput">
                              <span>Mobile Number <span class="required">*</span></span>
                              <div class="form-outline">
                              
                                <input type="text" id="form6Example3" name="receiverMobile" class="form-control" />
                                {{-- <label class="form-label" for="form6Example3">Mobile Number</label> --}}

                              </div>
                            </div>
                              
                          </div>

                          <div class="col">

                            {{-- TELEPHONE --}}
                            <div class="telephoneInput">
                              <span>Telephone <span class="required">*</span></span>
                              <div class="form-outline">
                                <input type="text" id="form6Example3" name="receiverTelephone" class="form-control" />
                                {{-- <label class="form-label" for="form6Example3">Telephone</label> --}}
                              </div>
                            </div>
                              
                          </div>
                        </div>

                        <!--Email input-->
                        <div class="emailInput mb-3">
                          <span>Email Address <span class="required">*</span></span>
                          <div class="form-outline mb-4">
                            <input type="email" id="form6Example5" name="receiverEmail" class="form-control" />
                            {{-- <label class="form-label" for="form6Example5">Email Address</label> --}}
                          </div>
                        </div>
                        

                        <!-- City Zip input -->
                        <div class="row mb-3">
                          <div class="col">

                            {{-- MUNICIPALITY --}}
                            <div class="municipalityInput">
                              <span>Municipality/ City <span class="required">*</span></span>
                              <div class="form-outline">
                                <input type="text" id="form6Example3" name="receiverCity" class="form-control" />
                                {{-- <label class="form-label" for="form6Example3">Municipality/City</label> --}}
                              </div>
                            </div>
                              
                          </div>

                          <div class="col">

                            {{-- POSTAL CODE --}}
                            <div class="postalInput">
                              <span>Postal Code <span class="required">*</span></span>
                              <div class="form-outline">
                                <input type="text" id="form6Example3" name="receiverZip" class="form-control" />
                                {{-- <label class="form-label" for="form6Example3">Postal Code</label> --}}
                              </div>
                            </div>  
                              
                          </div>
                        </div>

                        <!--State input-->
                        <div class="stateInput">
                          <span>State <span class="required">*</span></span>
                          <div class="form-outline">
                            <input type="text" id="form6Example3" name="receiverState" class="form-control" />
                            {{-- <label class="form-label" for="form6Example3">State</label> --}}
                          </div>
                        </div>
                        

                    </div>
                    <div class="modal-buttons modal-footer">
                      <a class="btn btn-secondary btn" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                        Previous
                      </a>
                      <a class="btn btn-primary btn" data-mdb-toggle="modal" data-mdb-target="#exampleModal2">
                        Next
                      </a>
                    </div>
                  </div>
                </div>
            </div>

            <!--Parcel Modal-->
            <div class="modal top fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel" style="color:white">PARCEL DETAILS</h5>
                      <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                        <!-- ! Dropdown Service menu-->
                        <div class="row mb-5">

                            <div class="form-group col-6">
                              <div class="serviceInput">
                                <span>Service <span class="required">*</span></span>
                                <div class="form-outline">
                                  {{-- <label for="exampleFormControlSelect1">Service</label> --}}
                                  <select class="form-control" id="exampleFormControlSelect1" name="">
                                      <option value="Express">Standard</option>
                                      <option value="Express">Express</option>
                                  </select>
                              </div>
                              </div>
                            </div>

                            <!-- !Dropdown Type menu-->
                            <div class="form-group col-6">
                                <div class="typeInput">
                                  <span>Type</span>
                                  <div class="form-outline">
                                    {{-- <label for="exampleFormControlSelect1">Type</label> --}}
                                    <select class="form-control" id="exampleFormControlSelect1" name="">
                                        <option value="Document">Document</option>
                                        <option value="Other">Other/s</option>
                                    </select>
                                </div>
                                </div>
                            </div>
                          </div>

                        <!-- Parcel details input -->
                        <div class="row mb-5">
                          <div class="col">
                              <div class="weightInput">
                                <span>Weight</span>
                                <div class="form-outline">
                                  <input type="text" id="form6Example3" name="weight" class="form-control" />
                                  {{-- <label class="form-label" for="form6Example3">Weight</label> --}}
                                </div>
                              </div>
                          </div>
                          <div class="col">
                              <div class="lengthInput">
                                <span>Length</span>
                                <div class="form-outline">
                                  <input type="text" id="form6Example3" name="length" class="form-control" />
                                  {{-- <label class="form-label" for="form6Example3">Length</label> --}}
                                </div>
                              </div>
                          </div>
                          <div class="col">
                              <div class="widthInput">
                                <span>Width</span>
                                <div class="form-outline">
                                  <input type="text" id="form6Example3" name="width" class="form-control" />
                                  {{-- <label class="form-label" for="form6Example3">Width</label> --}}
                                </div>
                              </div>
                          </div>
                          <div class="col">
                              <div class="heightInput">
                                <span>Height</span>
                                <div class="form-outline">
                                  <input type="text" id="form6Example3" name="height" class="form-control" />
                                  {{-- <label class="form-label" for="form6Example3">Height</label> --}}
                                </div>
                              </div>
                          </div>
                          
                          <!--Dropdown category menu-->
                          <div class="col">
                            <div class="categoryInput">
                              <span>Category</span>
                              <div class="form-outline">
                                {{-- <label for="exampleFormControlSelect1">Category</label> --}}
                                <select class="form-control" id="exampleFormControlSelect1" name="">
                                    <option value="Other">Other/s</option>
                                </select>
                              </div>
                            </div>
                          </div>

                        </div>

                        <!--Bid input-->
                        <div class="form-outline mb-5">
                            <div class="bidInput">
                              <span>Minimum Bid <span class="required">*</span></span>
                              <div class="form-outline">
                                <input type="text" id="form6Example3" name="amount" class="form-control" />
                                {{-- <label class="form-label" for="form6Example3">Minimum Bid</label> --}}
                              </div>
                            </div>
                        </div>

                        <!--Image input-->
                        <div class="imageInput w-50">
                          <span>Image</span>
                          <div class="form-outline mb-4">
                            <input type="file" id="form6Example5" class="form-control" />
                          </div>
                        </div>

                    </div>
                    <div class="modal-buttons modal-footer">
                        <a class="btn btn-secondary btn" data-mdb-toggle="modal" data-mdb-target="#exampleModal1">
                          Previous
                        </a>
                        <div class="button-group">
                          <a class="btn btn-danger btn" data-mdb-dismiss="modal">
                            Reset
                          </a>
                          <button type="submit" class="btn btn-success btn">
                            Submit
                          </button>
                        </div>
                      
                    </div>
                    </form>
                  </div>
                </div>
            </div>
          </div>
        </div>
{{--         @endif --}}

        <div class="mt-2">
            @include('partials.messages')
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Photo</th>
                <th>Pickup</th>
                <th>Drop-off</th>
                <th>Parcel Item</th>
                <th>Parcel Size & Weight</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            {{-- <tbody>
                @foreach ($shipments as $ship)
                    @if(Auth::user()->id == $ship->user_id || (Auth::user()->type == 'company' && $ship->company_bade == Auth::user()->name && $ship->status == 'Processing') || (Auth::user()->type == 'company' && $ship->company_bade == null && $ship->status == 'Pending'))
                        <tr>
                            <td></td>
                            <td>{{$ship->sender_address}} , {{$ship->sender_city}} , {{$ship->sender_state}} , {{$ship->sender_zip}}</td>
                            <td>{{$ship->recipient_address}} , {{$ship->recipient_city}} , {{$ship->recipient_state}} , {{$ship->recipient_zip}}</td>
                            <td></td>
                            <td>{{$ship->length}}x{{$ship->width}}x{{$ship->height}} | {{$ship->weight}}Kg </td>
                            <td>{{$ship->total_price}}</td>
                            <td>{{$ship->status}}</td>
                            @if($ship->status == 'Pending')
                                <td>@include('waybill.view')</td>
                            @elseif($ship->status == 'Processing')
                                <td>@include('waybill.tracking')</td>
                                <td><a href="{{route('generate',$ship->id)}}" target="_blank" class="btn btn-dark btn-sm">Generate</a></td>
                                <td><a href="{{route('print',$ship->id)}}" class="btn btn-dark btn-sm">Print</a></td>
                            @endif
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table> --}}
      </div>
    </div>
    </div>
    <!-- End of Waybill List -->
    @include('partials.footer')
