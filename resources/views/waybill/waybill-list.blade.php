


@extends('layouts.app')
@include('partials.navigationCompany')

<head>
    <link rel="stylesheet" href="{{ asset('css/waybill-list.css') }}">
</head>

<main class="container py-5" style="margin-top:-49px !important">
    <div class="main-wrapper border border-2" style=" max-width: 100%;">
        <div class="employee-header-container">
            <h3 class="">WAYBILL LIST</h3>
        </div>


        <section class="search-filter-container">

            <div class="top-container1" style="max-width: 800px;">
                <h5 class="fw-normal mb-2 d-inline">SEARCH:</h5>
                <div class="input-group rounded">
                    <input type="search" class="form-control rounded" placeholder="Search Driver" aria-label="Search" aria-describedby="search-addon" />
                    <span class="input-group-text border-0" id="search-addon">
                      <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>

            <div class="top-container2">
                <h5 class="fw-normal mb-2 d-inline"> FILTERS:</h5>
                <div class="dropdownContainer">
                <div class="first-filter">
                    <select class="form-select bold-hover border-black capitalized b-shadow s-margin modified-select" aria-label="Default select example" style="width:150px;">
                        <option value="1" hidden>PARCEL ITEM</option>
                        <option value="1">Action</option>
                        <option value="2">Action</option>
                        <option value="3">Action</option>
                    </select>

                    <select class="form-select bold-hover border-black capitalized b-shadow s-margin modified-select" aria-label="Default select example" style="width:150px;">
                        <option value="1" hidden>PARCEL SIZE</option>
                        <option value="1">Action</option>
                        <option value="2">Action</option>
                        <option value="3">Action</option>
                    </select>

                    <select class="form-select bold-hover border-black capitalized b-shadow s-margin modified-select" aria-label="Default select example" style="width:150px;">
                        <option value="1" hidden>PARCEL WIDTH</option>
                        <option value="1">Action</option>
                        <option value="2">Action</option>
                        <option value="3">Action</option>
                    </select>
                </div>
                <div class="second-filter">
                    <select class="form-select bold-hover border-black capitalized b-shadow s-margin modified-select" aria-label="Default select example" style="width:150px;">
                        <option value="1" hidden>AMOUNT</option>
                        <option value="1">Action</option>
                        <option value="2">Action</option>
                        <option value="3">Action</option>
                    </select>

                    <select class="form-select bold-hover border-black capitalized b-shadow s-margin modified-select" aria-label="Default select example" style="width:150px;">
                        <option value="1" hidden>STATUS</option>
                        <option value="1">Action</option>
                        <option value="2">Action</option>
                        <option value="3">Action</option>
                    </select>
                </div>

                </div>
            </div>

        </section>

        <div class="mt-2">
            @include('partials.messages')
        </div>


        <div class="table-container">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col"style="text-align:center;">ID</th>
                    <th scope="col"style="text-align:center;">PHOTO</th>
                    <th scope="col"style="text-align:center;">PICKUP</th>
                    <th scope="col"style="text-align:center;">DROPOFF</th>
                    <th scope="col"style="text-align:center;">PARCEL ITEM</th>
                    <th scope="col"style="text-align:center;">PARCEL SIZE & WIDTH</th>
                    <th scope="col"style="text-align:center;">TOTAL AMOUNT</th>
                    <th scope="col"style="text-align:center;">STATUS</th>
                    <th scope="col"style="text-align:center;">ACTION</th>
                </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($shipments as $shipment)
                        @if ($ship->archived == 0) --}}
                            <tr>
                                <td>1</td>
                                <td>PHOTO</td>
                                <td>BINAN</td>
                                <td>MUNTINLUPA</td>
                                <td>TOOLS</td>
                                <td>25X25CM | 96KG</td>
                                <td>200</td>
                                <td>PROCESSING</td>
                                
                                <td class="td-buttons d-flex" style="overflow:auto;">@include('waybill.view')
                                    @include('waybill.tracking')
                                    @include('waybill.print')
                                </td>
                            </tr>
                      {{--   @endif
                    @endforeach --}}
                </tbody>
            </table>
        </div>
        
    </div>
</main>


@include('partials.footer')	
