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
    <script src="js/resources/bootstrap.js"></script>

    
    <style>
        body{
        font-family: 'Poppins';
        }
        th {
            color: white;
            font-weight: normal;
            text-align: center;
        }
        td {
            text-align: center;
        }
        .clr-blue {
            color: #214D94;
        }
        .modal-info {
            text-align: left;
        }
        .btn-style {
            min-width: 200px;
            background-color: #214D94;
        }
    </style>
    <div class="container-fluid py-3" style="background-color: #EBEEEE;">
        <div class="p-4">
            <div class="align-left justify-content-center">
            <h3 class="mb-0">
                <span class="btn btn-warning p-1" data-toggle="button" aria-pressed="false" autocomplete="off"><h4 class="mb-0">ASSIGN</h4></span>
                <span>DRIVER</span>
            </h3>
            </div>
            <hr class="opacity-75">
            
                <section class="h-90 overflow-auto bg-white">
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
                            <th>DRIVER</th>
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
                            <td><span class="badge badge-pill badge-primary">Processing</span></td>
                            <td class="align-middle"> <button type="button" class="btn text-white btn-block mb-1" style="background-color:#214D94;" data-bs-toggle="modal" data-bs-target="#assign-modal">ASSIGN DRIVER</button>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Photo</td>
                            <td>Binan City</td>
                            <td>Muntinlupa</td>
                            <td>Tools</td>
                            <td>17x30x41 | 97 kg</td>
                            <td>300</td>
                            <td><span class="badge badge-warning">Pending</span></td>
                            <td class="align-middle"> <button type="button" class="btn text-white btn-block mb-1" style="background-color:#214D94;" data-bs-toggle="modal" data-bs-target="#assign-modal">ASSIGN DRIVER</button>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Photo</td>
                            <td>Binan City</td>
                            <td>Muntinlupa</td>
                            <td>Tools</td>
                            <td>17x30x41 | 97 kg</td>
                            <td>300</td>
                            <td><span class="badge badge-warning">Pending</span></td>
                            <td class="align-middle"> <button type="button" class="btn text-white btn-block mb-1" style="background-color:#214D94;" data-bs-toggle="modal" data-bs-target="#assign-modal">ASSIGN DRIVER</button>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Photo</td>
                            <td>Binan City</td>
                            <td>Muntinlupa</td>
                            <td>Tools</td>
                            <td>17x30x41 | 97 kg</td>
                            <td>300</td>
                            <td><span class="badge badge-pill badge-primary">Processing</span></td>
                            <td class="align-middle"> <button type="button" class="btn text-white btn-block mb-1 btn-style" style="background-color:#214D94;" data-bs-toggle="modal" data-bs-target="#assign-modal">ASSIGN DRIVER</button>
                        </tr>

                    </tbody>
                    </table>
                </section>
                <!-- table end -->
                
                <!-- assign modal -->
                
                <div class="modal fade" id="assign-modal" aria-hidden="true" aria-labelledby="assignModalToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-md">
                        <div class="modal-content px-3">
                            <div class="modal-header opacity-100">
                                <!-- title -->
                                <h3 class="modal-title mb-0 h6-sm clr-blue" id="assignModalToggleLabel">ASSIGN DRIVER</h3>
                            </div>
                            <!-- modal body -->
                            <div class="modal-body overflow-auto">
                                <!-- second title -->
                                <h6 class="clr-blue pb-2">AVAILABLE DRIVER</h6>
                                <button class="btn btn-block p-0 mb-2" style="min-width: 385px;">
                                    <card class="card flex-row">
                                        <img class="card-img-left example-card-img-responsive rounded-circle p-2" src="https://static.wikia.nocookie.net/virtualyoutuber/images/8/8f/Amatsuka_Uto_cropped.jpg/revision/latest/scale-to-width-down/350?cb=20201217071448" style="max-width:75px;"/>
                                        <div class="card-body">
                                            <h4 class="card-title h5 h4-sm mb-0">DRIVER 1</h4>
                                        </div>
                                    </card>
                                </button>
                                <button class="btn btn-block p-0 mb-2" style="min-width: 385px;">
                                    <card class="card flex-row">
                                        <img class="card-img-left example-card-img-responsive rounded-circle p-2" src="https://static.wikia.nocookie.net/virtualyoutuber/images/4/46/Ninomae_Ina%27nis_Portrait.png/revision/latest/scale-to-width-down/350?cb=20200910192748" style="max-width:75px;"/>
                                        <div class="card-body">
                                            <h4 class="card-title h5 h4-sm mb-0">DRIVER 2</h4>
                                        </div>
                                    </card>
                                </button>
                                <button class="btn btn-block p-0 mb-2" disabled style="min-width: 385px;">
                                    <card class="card flex-row">
                                        <img class="card-img-left example-card-img-responsive rounded-circle p-2" src="https://static.wikia.nocookie.net/virtualyoutuber/images/8/86/Nanashi_Mumei_Portrait.png/revision/latest/scale-to-width-down/350?cb=20210817024548" style="max-width:75px;"/>
                                        <div class="card-body">
                                            <h4 class="card-title h5 h4-sm mb-0">DRIVER 3</h4>
                                        </div>
                                    </card>
                                </button>
                                <button class="btn btn-block p-0 mb-2" disabled style="min-width: 385px;">
                                    <card class="card flex-row">
                                        <img class="card-img-left example-card-img-responsive rounded-circle p-2" src="https://static.wikia.nocookie.net/virtualyoutuber/images/7/73/Ceres_Fauna_Portrait.png/revision/latest?cb=20210902015951" style="max-width:75px;"/>
                                        <div class="card-body">
                                            <h4 class="card-title h5 h4-sm mb-0">DRIVER 4</h4>
                                        </div>
                                    </card>
                                </button>
                                <button class="btn btn-block p-0 mb-2" style="min-width: 385px;">
                                    <card class="card flex-row">
                                        <img class="card-img-left example-card-img-responsive rounded-circle p-2" src="https://static.wikia.nocookie.net/virtualyoutuber/images/a/a2/Uruha_Rushia_-_Portrait.png/revision/latest?cb=20190821034540" style="max-width:75px;"/>
                                        <div class="card-body">
                                            <h4 class="card-title h5 h4-sm mb-0">DRIVER 5</h4>
                                        </div>
                                    </card>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                  
        </div>
    </div>
