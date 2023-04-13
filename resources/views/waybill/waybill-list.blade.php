@include('partials.admin-nav')



    <div class="container py-5 h-90 ">
        <div class="border border-2" style="overflow-x: auto; max-width: 100%;">
            <div class="waybill-head bg-primary">
                <h3 class="fw-bold ms-5">WAYBILL LIST</h3>
            </div>

                <!-- dropdown group starts here -->
                <section class="btn-wrapper ms-5 mt-5 mb-3">
                    <h5 class="fw-normal mb-2">FILTERS:</h5>
                    <div class=" btn-group mb-2">
                        <button id="btn-group" class="btn btn-primary dropdown-toggle " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            PARCEL ITEM
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                    <div class="btn-group mb-2">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            PARCEL SIZE
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                    <div class="btn-group mb-2">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            PARCEL WIDTH
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                    <div class="btn-group mb-2">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            AMOUNT
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                    <div class="btn-group mb-2">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            STATUS
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>

                    </div>
                </section>
                <!-- dropdown group ends here -->
                
                <!-- table starts here -->
                <section class="mb-5 px-4 h-90">
                    <table class="table table-striped table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>PHOTO</th>
                            <th>PICKUP</th>
                            <th>DROPOFF</th>
                            <th>PARCEL ITEM</th>
                            <th>PARCEL SIZE & WIDTH</th>
                            <th>TOTAL AMOUNT</th>
                            <th>STATUS</th>
                            <th> </th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Photo</td>
                            <td>Binan City</td>
                            <td>Muntinlupa</td>
                            <td>Tools</td>
                            <td>17x30x41 | 97 kg</td>
                            <td>300</td>
                            <td>Processing</td>
                            <td class="align-middle"> <button type="button" class="btn btn-primary btn-block mb-1" data-bs-toggle="modal" data-bs-target="#tracking-modal">Tracking</button>
                            <button type="button" class="btn btn-primary btn-block mb-1" data-bs-toggle="modal" data-bs-target="#view-modal">View</button>
                            <button type="button" class="btn btn-secondary btn-block">Print</button> </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Photo</td>
                            <td>Binan City</td>
                            <td>Muntinlupa</td>
                            <td>Tools</td>
                            <td>17x30x41 | 97 kg</td>
                            <td>300</td>
                            <td>Pending</td>
                            <td class="align-middle"> <button type="button" class="btn btn-primary btn-block mb-1" data-bs-toggle="modal" data-bs-target="#tracking-modal">Tracking</button>
                            <button type="button" class="btn btn-primary btn-block mb-1" data-bs-toggle="modal" data-bs-target="#view-modal">View</button>
                            <button type="button" class="btn btn-secondary btn-block">Print</button> </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Photo</td>
                            <td>Binan City</td>
                            <td>Muntinlupa</td>
                            <td>Tools</td>
                            <td>17x30x41 | 97 kg</td>
                            <td>300</td>
                            <td>Pending</td>
                            <td class="align-middle"> <button type="button" class="btn btn-primary btn-block mb-1" data-bs-toggle="modal" data-bs-target="#tracking-modal">Tracking</button>
                            <button type="button" class="btn btn-primary btn-block mb-1" data-bs-toggle="modal" data-bs-target="#view-modal">View</button>
                            <button type="button" class="btn btn-secondary btn-block">Print</button> </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Photo</td>
                            <td>Binan City</td>
                            <td>Muntinlupa</td>
                            <td>Tools</td>
                            <td>17x30x41 | 97 kg</td>
                            <td>300</td>
                            <td>Processing</td>
                            <td class="align-middle"> <button type="button" class="btn btn-primary btn-block mb-1" data-bs-toggle="modal" data-bs-target="#tracking-modal">Tracking</button>
                            <button type="button" class="btn btn-primary btn-block mb-1" data-bs-toggle="modal" data-bs-target="#view-modal">View</button>
                            <button type="button" class="btn btn-secondary btn-block">Print</button> </td>
                        </tr>

                    </tbody>
                    </table>
                </section>
                <!-- table end -->




                <!-- tracking modal -->
                <div class="modal fade" id="tracking-modal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                        <div class="modal-header border-bottom">
                            <!-- title -->
                            <h5 class="modal-title" id="exampleModalToggleLabel">WAYBILL TRACKING</h5>
                            <!-- close button -->
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- modal content -->
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6"> 
                                    <div class="child1 ">
                                        <div class="parcel-pic">
                                            <img src="/img/box.jpg"
                                            alt="login form" class="img-fluid w-50 h-50" style="border-radius: 0 1rem 1rem 0;" /> 
                                        </div>
                                        <div>
                                            <table class="table table-sm table-no-bottom-space">
                                                    <tbody>
                                                        <tr>
                                                            <th>ID:</th>
                                                            <td class="fw-bold">26</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Pickup:</th>
                                                            <td class="fw-bold">John Doe Binan City</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Drop off:</th>
                                                            <td class="fw-bold">Muntinlupa</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Parcel Size & Weight:</th>
                                                            <td class="fw-bold">17x30x41 | 97 kg</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Parcel Item</th>
                                                            <td class="fw-bold">Tools</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Parcel Charges:</th>
                                                            <td class="fw-bold">Php 68</td>
                                                        </tr>
                                                        
                                                    </tbody>
                                            </table>
                                            
                                            <!-- highlighted price -->
                                            <div class="ms-5" >
                                                <tr>
                                                    <th><strong>Current Bid:</strong></th>
                                                    <td class="fw-bold"><strong>Php 68</strong></td>
                                                </tr>
                                            </div>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <div class="child2 h-100 border">
                                            <div class="d-block border-bottom bg-primary">
                                                <h6 class="ms-3 pt-2" id="tracking-status">STATUS</h6>
                                            </div>

                                            <div class="container mt-3">

                                                <!-- icon is on default color when not accomplished -->
                                                    <!-- change the color into green or light green if accomplished -->
                                                <div class="row text-center" >

                                                    <!-- order confirm -->
                                                    <div class="col-md-3">
                                                    <i class="fa fa-check-circle fa-2x" style="color:green"></i>
                                                    <p>Order Confirm</p>
                                                    </div>
                                                    <!-- picked by courier icon -->
                                                    <div class="col-md-3">
                                                        <i class="fa fa-user-circle fa-2x"></i>
                                                        <p>Pickup by Courier</p>
                                                    </div>

                                                    <!-- on the way -->
                                                    <div class="col-md-3">
                                                        <i class="fa fa-truck fa-2x"></i>
                                                        <p>On the way</p>
                                                    </div>
                                                    <!-- delivered -->
                                                    <div class="col-md-3">
                                                        <i class="fas fa-clipboard-check fa-2x"></i>
                                                        <p>Delivered</p>
                                                    </div> 
                                                </div>

                                                <div class="container align-item-center text-center mt-3">
                                                    <div class="btn-group mb-4 text-center w-100 border" id="trackingsD">
                                                        <button id="btn-group" class="btn dropdown-toggle " type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                                            PARCEL STATUS
                                                        </button>
                                                        <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton2">
                                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="border mt-1" id="tracking-commits-and-location">
                                                        <label class="w-100 pt-2">Tracking Commits and Location</label>
                                                    </div>
                                                        <div class="input-group input-group-sm mb-3">
                                                            <input type="text" class="form-control w-100" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Please Enter your Comment">
                                                        </div>
                                                    
                                                    

                                                    <button class="btn btn-primary mt-5 mb-4 ps-4">UPDATE</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- button sa baba -->
                            <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                </div>

                <!-- view modal -->
                <div class="modal fade" id="view-modal" aria-hidden="true" aria-labelledby="waybill-detail-modal" tabindex="-1">
                    <div class="modal modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                        <div class="modal-header">
                            <!-- title -->
                            <h5 class="modal-title" id="waybill-detail-modal">WAYBILL DETAILS</h5>
                            <!-- close button -->
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- modal content -->
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row">
                                        <!-- picture in waybill -->
                                        <div class="col-lg-5 col-md-5 col-sm-5"> 
                                            <div class="child1 text-center">  
                                                <img src="/img/box.jpg"
                                                alt="login form" class="img-fluid w-100 h-100" style="border-radius: 0 1rem 1rem 0;" />   
                                            </div>
                                        </div>
                                        <!-- table of details in waybill -->
                                        <div class="col-lg-7 col-md-7 col-sm-7">
                                            <div class="child2 h-90">
                                                <table class="table table-sm table-no-bottom-space">
                                                    <tbody>
                                                        <tr>
                                                            <th>ID:</th>
                                                            <td class="fw-bold">26</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Pickup:</th>
                                                            <td class="fw-bold">John Doe Binan City</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Drop off:</th>
                                                            <td class="fw-bold">Muntinlupa</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Parcel Size & Weight:</th>
                                                            <td class="fw-bold">17x30x41 | 97 kg</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Parcel Item</th>
                                                            <td class="fw-bold">Tools</td>
                                                        </tr>
                                                        <tr>
                                                            <th><strong>Charges:</strong></th>
                                                            <td class="fw-bold"><strong>Php 68</strong></td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- highlighted price -->
                                            <div class="price-div rounded" >
                                                <tr>
                                                    <th>Parcel Charges:</th>
                                                    <td class="fw-bold">Php 68</td>
                                                </tr>
                                            </div>
                                            <!-- bottom bid checkbox and button -->
                                            <div class="rounded mt-5">
                                                <h5><strong>BID</strong></h5>
                                                <div class=" d-flex align-items-center h-50">
                                                    <div class="form-outline align-items-center">
                                                        <input type="email" id="form2Example17" class="form-control form-control-lg ms-2" />
                                                        <label class="form-label ps-2" for="form2Example17">BID AMOUNT</label>
                                                    </div>
                                                        <button class="btn btn-primary btn-lg ms-3" id="bid-button" type="button">BID NOW</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                        
                            <!-- button  -->
                            <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    
                    </div>
                </div>
        </div>
        
    </div>




@include('partials.footer') 