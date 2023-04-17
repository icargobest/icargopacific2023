    @include('partials/admin-nav')

    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <style>
        .primary {
        background-color: #214D94;
        color: white;
        }
        body{
        font-family: 'Poppins';
        }
        .info, td{
            color: #214D94;
        }

        img {
            max-width: 100%;
            height: auto;
        }
    </style>

    <div class="container-fluid py-3">
        <div class="p-4" style="background-color: #EAEBEE;">
            <h3 class="text-dark mb-0">TELEVISION</h3>
            <hr class="opacity-75">
            <card class="card bg-white btn-wrapper p-4 shadow-lg">
                <!-- Mobile Sender and Receiver -->
                <div class="row overflow-auto">
                    <!-- Product Information -->
                    <div class="col-xl-10">
                        <div class="row">
                            <div class="col-sm-6 pt-2">
                                <table style="width:100%">
                                <tr>
                                    <th>
                                    <h5 class="fw-normal">SENDER</h5>
                                    </th>
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
                            </div>
                            <div class="col-sm-6 pt-2">
                                <table style="width:100%">
                                <tr>
                                    <th>
                                    <h5 class="fw-normal">RECEIVER</h5>
                                    </th>
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
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <hr class="opacity-75">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 pt-2">
                                <table style="width:100%">
                                <tr>
                                    <th>
                                    <h5 class="fw-normal">PARCEL INFORMATION</h5>
                                    </th>
                                </tr>
                                <tr>
                                    <th>ID:</th>
                                    <td>68</td>
                                </tr>
                                <tr>
                                    <th>SIZE & WEIGHT:</th>
                                    <td>17x30x41 | 97 kg</td>
                                </tr>
                                </table>
                            </div>
                            <div class="col-sm-6">
                                <table style="width:100%">
                                <tr>
                                    <th>CATEGORY:</th>
                                    <td>Appliances</td>
                                </tr>
                                <tr>
                                    <th>MODE OF PAYMENT:</th>
                                    <td>COD</td>
                                </tr>
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
                    <div class="col-xl-2">
                        <div>
                            <img src="img/television.png" class="card shadow-0" alt="television"  style="min-width:140px;">
                            <div class="pt-2">
                            <button type="button" class="btn btn-primary primary btn-block btn-lg shadow-0" style="min-width:140px; max-width:509px;">
                            Track Item</button>
                            </div>
                        </div>    
                    </div>
                </div>
                <hr class="opacity-75">
                <!-- table starts here -->
                <section class="mb-5 overflow-auto">
                    <table class="table table-striped table-hover">
                    <thead class="text-white" style="background-color: #214D94;">
                        <tr class="text-warning">
                            <th>COMPANY</th>
                            <th>BID AMOUNT</th>
                            <th>DATE</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>HART MORRINS ASSOCIATE</td>
                            <td>169</td>
                            <td>2023-04-29</td>
                            <td class="align-middle"><button type="button" class="btn btn-warning btn-block">ACCEPT</button> </td>
                        </tr>
                        <tr>
                            <td>HART MORRINS ASSOCIATE 2</td>
                            <td>269</td>
                            <td>2023-04-29</td>
                            <td class="align-middle"><button type="button" class="btn btn-warning btn-block">ACCEPT</button> </td>
                        </tr>
                        <tr>
                            <td>HART MORRINS ASSOCIATE 3</td>
                            <td>369</td>
                            <td>2023-04-29</td>
                            <td class="align-middle"><button type="button" class="btn btn-warning btn-block">ACCEPT</button> </td>
                        </tr>
                        <tr>
                            <td>HART MORRINS ASSOCIATE 4</td>
                            <td>120</td>
                            <td>2023-04-29</td>
                            <td class="align-middle"><button type="button" class="btn btn-warning btn-block">ACCEPT</button> </td>
                        </tr>
                    </tbody>
                    </table>
                </section>
            </card>      
        </div>
    </div>