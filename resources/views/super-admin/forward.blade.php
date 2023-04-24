<head>
    <title>ADMIN | TRANSFER TO FORWARDING</title>
    <link rel="shortcut icon" href="{{ asset('ICARGOicon.ico') }}">
</head>

<!-- Navbar -->
@include('layouts.app')
@include('partials.navigationCompany')
<!-- Navbar -->

<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}">
<script src="{{ asset('js/bootstrap.js')}}"></script>
<script src="{{ asset('js/mdb.min.js')}}"></script>

<style>
    th {
        background-color: white !important;
        color: black;
        font-weight: normal;
    }
</style>

<div class="container-fluid pt-4 pb-4">
    <!-- Transfer Search Bar -->
    <div class="card rounded-0">
        <div class="shadow text-white p-3" style="background-color: #214D94;">
            <h3 class="mb-0">TRANSFER TO FORWARDING</h3>
        </div>
        <div class="card-body">
            <div class="input-group">
            <div class="form-outline">
                <input type="search" class="form-control" style="background-color: #EAEBEE"/>
                <label class="form-label">Tracking ID</label>
            </div>
            <button type="button" class="btn btn-dark shadow-0" style="background-color: #214D94;">
                <i class="fas fa-search"></i>
            </button>
            </div>
        </div>
    </div>
    <!-- Waybill Details -->
    <div class="card rounded-0 mt-4">
        <div class="shadow text-white p-3" style="background-color: #214D94;">
            <h3 class="mb-0">WAYBILL DETAILS</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Forms -->
                <div class="col-lg-6">
                    <div class="input-group pb-3">
                        <input type="date" class="form-control" style="background-color: #EAEBEE"/>
                    </div>
                    <div class="input-group pb-3">
                        <select class="form-control" style="background-color: #EAEBEE">
                            <option>Select Company</option>
                            <option>Company 1</option>
                            <option>Company 2</option>
                            <option>Company 3</option>
                        </select>
                        <!--  Icon
                        <span class="input-group-append">
                            <span class="input-group-text bg-white">
                                <i class="fas fa-chevron-down"></i>
                            </span>
                        </span>
                        -->  
                    </div>
                    <div class="input-group pb-3">
                        <select class="form-control" style="background-color: #EAEBEE;">
                            <option>Select Transport</option>
                            <option>Boat</option>
                            <option>Truck</option>
                            <option>Van</option>
                        </select>
                    </div>
                    <div class="input-group pb-3 ">
                        <select class="form-control" style="background-color: #EAEBEE">
                            <option>Select Method</option>
                            <option>Cash</option>
                            <option>Bill</option>
                            <option>Bank</option>
                        </select>
                    </div>
                    <div class="input-group pb-3">
                        <div class="form-outline">
                            <input type="number" class="form-control" style="background-color: #EAEBEE"/>
                            <label class="form-label">Freight Charges</label>
                        </div>
                    </div>
                    <div class="input-group pb-3">
                        <div class="form-outline">
                            <input type="number" class="form-control" style="background-color: #EAEBEE"/>
                            <label class="form-label">Total Amount</label>
                        </div>
                    </div>
                </div>
                <!--  Forms End -->
                <!-- Form -->
                <div class="col-lg-6 overflow-auto">   
                    <div class="border border-secondary p-3 rounded">
                        <table class="table table-responsive table-sm table-striped m-0">
                            <tbody>
                                <tr>
                                    <th scope="row">ID:</th>
                                    <td class="fw-bold">28</td>
                                </tr>
                                <tr>
                                    <th scope="row">Pick-up:</th>
                                    <td class="fw-bold">Muntinlupa City</td>
                                </tr>
                                <tr>
                                    <th scope="row">Drop-off:</th>
                                    <td class="fw-bold">Las Pinas City</td>
                                </tr>
                                <tr>
                                    <th scope="row">Parcel Size & Weight:</th>
                                    <td class="fw-bold">Sample Size & Weight</td>
                                </tr>
                                <tr>
                                    <th scope="row border-bottom-0">Parcel Item:</th>
                                    <td class="fw-bold">Computer & Gadgets</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-grid gap-2 col-12 pt-4">
                        <button class="btn text-light shadow-0" style="background-color: #214D94;">
                        <h6 class="mb-0">Submit</h6>
                        </button>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
<!-- Container -->
</div>

<script src="/js/bootstrap.bundle.js"></script>
