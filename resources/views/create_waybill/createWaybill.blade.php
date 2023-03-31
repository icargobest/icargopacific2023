<head>
    <title>Create Waybill</title>
    <link rel="stylesheet" href="{{ asset('css/createWaybill.css') }}">
</head>

@include('partials.admin-nav')

{{-- WAYBILL CONTAINER --}}

<div class="createWaybill-container container-fluid d-flex align-items-center justify-content-center">

    <div class="waybillRow row w-100 gy-3">

        {{-- FORM CONTAINER --}}

        <div class="form-holder col-lg-8 col-sm-12 p-0">

            <div class="form-wrapper container-fluid px-0 mr-2">

                <header class="form-header mb-4"><span>SENDER INFORMATION</span></header>

                <div class="input-group input-group flex-column mb-3 px-3">
                    <span>Name</span>
                    <input type="text" class="form-control w-100" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>

                <div class="input-group input-group flex-column mb-3  px-3">
                    <span>Street Address</span>
                    <input type="text" class="form-control w-100" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>

                <div class="numberInput input-group mb-3  flex-row px-3">

                    <div class="mobileNo-input input-group input-group flex-column">
                        <span>Mobile Number</span>
                        <input type="text" class="form-control w-100" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>
                    <div class="telephone-input input-group input-group flex-column">
                        <span>Telephone</span>
                        <input type="text" class="form-control w-100" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>
                    
                </div>

                <div class="input-group input-group flex-column mb-3  px-3">
                    <span>Email Address</span>
                    <input type="email" class="form-control w-100" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>

                <div class="address-Input input-group input-group mb-3 flex-row px-3">

                    <div class="city-Input input-group flex-column">
                        <span>City</span>
                        <input type="text" class="form-control w-100" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>
                    <div class="postal-Input input-group flex-column">
                        <span>Postal Code</span>
                        <input type="text" class="form-control w-100 " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>
                       
                </div>

                <div class="input-group input-group flex-column mb-3  px-3">
                    <span>Country</span>
                    <input type="text" class="form-control w-100" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>

                {{-- BUTTONS --}}

                <div class="button-holder">
                    {{-- <button type="button" class="btn" data-toggle="modal" data-bs-toggle="modal" data-bs-target="#receiverModal">Next</button> --}}
                    <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">NEXT</a>

                </div>

            </div>

            {{-- MODALS --}}

            <div class="modal fade position-absolute receiver-modal" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                  <div class="modal-content">
                    
                    <div class="form-holder col-lg-12 col-sm-12 p-0">

                        {{-- RECEIVER MODAL --}}

                        <div class="form-wrapper container-fluid px-0 mr-2 w-100">
            
                            <header class="form-header mb-4">
                                <span>RECEIVER INFORMATION</span>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </header>
            
                            <div class="input-group input-group flex-column mb-3 px-3">
                                <span>Name</span>
                                <input type="text" class="form-control w-100" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>
            
                            <div class="input-group input-group flex-column mb-3  px-3">
                                <span>Street Address</span>
                                <input type="text" class="form-control w-100" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>
            
                            <div class="numberInput input-group mb-3  flex-row px-3">
            
                                <div class="mobileNo-input input-group input-group flex-column">
                                    <span>Mobile Number</span>
                                    <input type="text" class="form-control w-100" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                <div class="telephone-input input-group input-group flex-column">
                                    <span>Telephone</span>
                                    <input type="text" class="form-control w-100" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                
                            </div>
            
                            <div class="input-group input-group flex-column mb-3  px-3">
                                <span>Email Address</span>
                                <input type="email" class="form-control w-100" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>
            
                            <div class="address-Input input-group input-group mb-3 flex-row px-3">
            
                                <div class="city-Input input-group flex-column">
                                    <span>City</span>
                                    <input type="text" class="form-control w-100" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                <div class="postal-Input input-group flex-column">
                                    <span>Postal Code</span>
                                    <input type="text" class="form-control w-100 " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                
                            </div>
            
                            <div class="input-group input-group flex-column mb-3  px-3">
                                <span>Country</span>
                                <input type="text" class="form-control w-100" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>
            
                            {{-- BUTTONS --}}
            
                            <div class="rcvrbutton-holder">
                                <button type="button" class="btn" data-toggle="modal" data-bs-toggle="modal" data-bs-target="#receiverModal">PREVIOUS</button>
                                <button class="btn" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">NEXT</button>    
                            </div>
            
                        </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="modal fade position-absolute shipmentDetail-modal" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                  <div class="modal-content ">
                   
                    {{-- SHIPMENT DETAIL MODAl --}}

                    <div class="form-holder col-lg-12 col-sm-12 p-0">
                        <div class="form-wrapper container-fluid px-0 mr-2 w-100">
            
                            <header class="form-header mb-4">
                                <span>SHIPMENT DETAIL</span>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </header>
            
                            <div class="input-group input-group flex-column mb-3 px-3">
                                <span>Name</span>
                                <input type="text" class="form-control w-100" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>
            
                            <div class="input-group input-group flex-column mb-3  px-3">
                                <span>Street Address</span>
                                <input type="text" class="form-control w-100" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>
            
                            <div class="numberInput input-group mb-3  flex-row px-3">
            
                                <div class="mobileNo-input input-group input-group flex-column">
                                    <span>Mobile Number</span>
                                    <input type="text" class="form-control w-100" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                <div class="telephone-input input-group input-group flex-column">
                                    <span>Telephone</span>
                                    <input type="text" class="form-control w-100" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                
                            </div>
            
                            <div class="input-group input-group flex-column mb-3  px-3">
                                <span>Email Address</span>
                                <input type="email" class="form-control w-100" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>
            
                            <div class="address-Input input-group input-group mb-3 flex-row px-3">
            
                                <div class="city-Input input-group flex-column">
                                    <span>City</span>
                                    <input type="text" class="form-control w-100" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                <div class="postal-Input input-group flex-column">
                                    <span>Postal Code</span>
                                    <input type="text" class="form-control w-100 " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                
                            </div>
            
                            <div class="input-group input-group flex-column mb-3  px-3">
                                <span>Country</span>
                                <input type="text" class="form-control w-100" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                            </div>
            
                            {{-- BUTTONS --}}
            
                            <div class="rcvrbutton-holder">
                                <button class="btn" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">PREVIOUS</button>
                                
                                <button type="button" class="btn" data-toggle="modal" data-bs-toggle="modal" data-bs-target="#shipmentDetailModal">SUBMIT</button>
                            </div>
            
            
                        </div>
                    </div>
                    
                  </div>
                </div>
              </div>

        </div>

        {{-- SUMMARY CONTAINER --}}

        <div class="summary-holder col-lg-3 col-sm-12 p-0">

            <div class="summary-wrapper container-fluid px-0 mr-2">

                <header class="summary-header mb-5"><span>SUMMARY</span></header>

                <div class="info-holder">

                    <div class="senderInfo">
                        <h5>SENDER</h5>
    
                        <ul>
                            <li>Sender Name | <span>Edan Franco</span></li>
                            <li>Pickup | <span>Kristen Griffit</span></li>
                            <li>Mobile | <span>0999-999-9999</span></li>
                            <li>City | <span>Mandaue</span></li>
                            <li>Country | <span>Philippines</span></li>
                        </ul>                  
                    </div>
    
                    <div class="receiverInfo">
                        <h5>RECEIVER</h5>
    
                        <ul>
                            <li>Receiver Name | <span>Fletcher Peck</span></li>
                            <li>Pickup | <span>Maxwell Wood</span></li>
                            <li>Mobile | <span>0999-999-9999</span></li>
                            <li>City | <span>Lapu-Lapu</span></li>
                            <li>Country | <span>Philippines</span></li>
                        </ul>
                    </div>

                </div>

            </div>

        </div>
          

    </div>

</div>


@include('partials.footer')