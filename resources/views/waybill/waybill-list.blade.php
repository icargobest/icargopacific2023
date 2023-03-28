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
                            <td class="align-middle"> <button type="button" class="btn btn-primary btn-block mb-1">Tracking</button>
                            <button type="button" class="btn btn-primary btn-block mb-1">View</button>
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
                            <td class="align-middle"> <button type="button" class="btn btn-primary btn-block mb-1">Tracking</button>
                            <button type="button" class="btn btn-primary btn-block mb-1">View</button>
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
                            <td class="align-middle"> <button type="button" class="btn btn-primary btn-block mb-1">Tracking</button>
                            <button type="button" class="btn btn-primary btn-block mb-1">View</button>
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
                            <td class="align-middle"> <button type="button" class="btn btn-primary btn-block mb-1">Tracking</button>
                            <button type="button" class="btn btn-primary btn-block mb-1">View</button>
                            <button type="button" class="btn btn-secondary btn-block">Print</button> </td>
                        </tr>

                    </tbody>
                    </table>
                </section>
                <!-- table end -->
        </div>
    </div>


@include('partials.footer') 