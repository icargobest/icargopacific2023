    @include('layouts.app')
    @include('partials.navigationCompany')
    
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="/css/bootstrap.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <!-- MDB -->
    <link rel="stylesheet" href="/css/mdb.min.css" />
    <!-- Google Poppins Font -->
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <style>
        body{
            font-family: 'Poppins';
        }
        .align-left {
            text-align: left;
        }
        .img-size {
            max-width: 100%;
            height: auto;
            max-width: 250px;
        }
        th {
            background-color: white !important;
            color: black;
            font-weight: normal;
        }
        td {
            text-align: left;
            font-weight: bold;
        }
        .form-style {
            max-width: 170px;
        }
    </style>
    <div class="container-fluid px-5 py-2  h-90">
        <div class="bg-white shadow" style="max-width: 100%;">
            <div class="waybill-head py-3 ps-5" style="background-color: #214D94;">
                <h3 class="text-white mb-0">ORDER LIST</h3>
            </div>

                <!-- dropdown group starts here -->
                <section class="btn-wrapper p-5">
                    <h5 class="fw-normal">FILTERS:</h5>
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-xxl-2 pb-2">
                                    <div class="input-group shadow">
                                        <select class="form-control btn shadow-0 rounded-0 border border-dark pb-2 form-select align-left bg-white">
                                            <option>Parcel Item</option>
                                            <option>Action</option>
                                            <option>Another Action</option>
                                            <option>Something Else Here</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xxl-2 pb-2">
                                    <div class="input-group shadow">
                                        <select class="form-control btn shadow-0 rounded-0 border border-dark form-select align-left bg-white">
                                            <option>Parcel Size</option>
                                            <option>Action</option>
                                            <option>Another Action</option>
                                            <option>Something Else Here</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xxl-2 pb-2">
                                    <div class="input-group shadow">
                                        <select class="form-control btn shadow-0 rounded-0 border border-dark form-select align-left bg-white">
                                            <option>Parcel Width</option>
                                            <option>Action</option>
                                            <option>Another Action</option>
                                            <option>Something Else Here</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xxl-2 pb-2">
                                    <div class="input-group shadow">
                                        <select class="form-control btn shadow-0 rounded-0 border border-dark form-select align-left bg-white">
                                            <option>Amount</option>
                                            <option>Action</option>
                                            <option>Another Action</option>
                                            <option>Something Else Here</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xxl-2 pb-2">
                                    <div class="input-group shadow">
                                        <select class="form-control btn shadow-0 rounded-0 border border-dark form-select align-left bg-white">
                                            <option>Status</option>
                                            <option>Action</option>
                                            <option>Another Action</option>
                                            <option>Something Else Here</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        

                    </div>
                    
                </section>
                <!-- dropdown group ends here -->
                
                <!-- table starts here -->
                <section class="mb-5 px-5 h-90 overflow-auto">
                    <table class="table table-striped table-hover">
                    <thead class="text-white" style="background-color: #214D94;">
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
                            <td class="align-middle"> <button type="button" class="btn text-white btn-block mb-1" style="background-color:#214D94;" data-bs-toggle="modal" data-bs-target="#tracking-modal">TRACKING</button>
                            <button type="button" class="btn btn-secondary btn-block">PRINT</button> </td>
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
                            <td class="align-middle"> <button type="button" class="btn text-white btn-block mb-1" style="background-color:#214D94;" data-bs-toggle="modal" data-bs-target="#tracking-modal">VIEW</button>
                            <button type="button" class="btn btn-secondary btn-block">PRINT</button> </td>
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
                            <td class="align-middle"> <button type="button" class="btn text-white btn-block mb-1" style="background-color:#214D94;" data-bs-toggle="modal" data-bs-target="#tracking-modal">VIEW</button>
                            <button type="button" class="btn btn-secondary btn-block">PRINT</button> </td>
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
                            <td class="align-middle"> <button type="button" class="btn text-white btn-block mb-1" style="background-color:#214D94;" data-bs-toggle="modal" data-bs-target="#tracking-modal">VIEW</button>
                            <button type="button" class="btn btn-secondary btn-block">PRINT</button> </td>
                        </tr>

                    </tbody>
                    </table>
                </section>
                <!-- table end -->

                <!-- tracking modal -->
                <div class="modal fade" id="tracking-modal" aria-hidden="true" aria-labelledby="trackingModalToggleLabel" tabindex="-1">
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
                                        <div class="col-xl-6">
                                            <img src="img/television.png" class="card shadow-0 img-size my-2" alt="television">
                                            <button class="btn btn-success opacity-75 img-size my-2 px-3 py-2" disabled>
                                                <h6 class="mb-0 fw-bold text-capitalize">Current Bid: Php 165</h6>
                                            </button>
                                            <div class="row form-group align-items-end my-2">
                                                <div class="col-md-6">
                                                    <label class="control-label control-label-left fw-bold">BID</label>
                                                    <input type="number" class="form-control typeahead form-style" placeholder="BID AMOUNT">
                                                </div>
                                                <div class="col-md-6">
                                                    <button type="button" class="btn btn-warning mt-2">
                                                        BID NOW
                                                    </button>
                                                </div>
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
                                                        <td>irYs Hope</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Address:</th>
                                                        <td>California</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Contact Number:</th>
                                                        <td>0999-999-9999</td>
                                                    </tr>
                                                    </table>
                                                    <hr class="opacity-75">
                                                    <table class="m-2"style="width:100%">
                                                    <tr>
                                                        <th><h5 class="fw-bold opacity-75">RECEIVER</h5></th> 
                                                    </tr>
                                                    <tr>
                                                        <th>Name:</th>
                                                        <td>Moom</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Address:</th>
                                                        <td>Australia</td>
                                                        </tr>
                                                    <tr>
                                                        <th>Contact Number:</th>
                                                        <td>0999-999-9999</td>
                                                    </tr>
                                                    </table>
                                                    <hr class="opacity-75">
                                                    <table class="m-2"style="width:100%">
                                                    <tr>
                                                        <th><h5 class="fw-bold opacity-75">PARCEL INFORMATION</h5></th> 
                                                    </tr>
                                                    <tr>
                                                        <th>ID:</th>
                                                        <td>26</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Size & Weight:</th>
                                                        <td>17x30x41 | 97 kg</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Parcel Item:</th>
                                                        <td>TOOLS</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Freight Charges:</th>
                                                        <td>Php 68</td>
                                                    </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
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
                                                    <!-- <thead>
                                                        <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">First</th>
                                                        <th scope="col">Last</th>
                                                        <th scope="col">Handle</th>
                                                        </tr>
                                                    </thead> -->
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
                                            </div>
                                            <div class="price-div rounded" >
                                                <tr>
                                                    <th>Parcel Charges:</th>
                                                    <td class="fw-bold">Php 68</td>
                                                </tr>
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