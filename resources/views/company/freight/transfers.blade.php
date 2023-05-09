<head>
    
    <title>Company | Orders</title>

    <style>
        table {
    border-collapse: collapse;
    border-color: transparent !important;
  }
  th{
    color: white !important;
  }
  td, th {
    text-align: center !important;
    padding: 10px;
    border: 1px solid black;
    
  }

  .parent-div{
    display: flex;
    flex-direction: row;
  }

  .first-child{
    display: flex;
    flex-direction: column;
    margin: auto;
  }
/* 

  input[type=search] {
    width: 60%;

  } */
  input[type=text] {
    width: 100%;

  }

  .div{
    display: flex;
    justify-content: center;
  }

  .second-div{
    display: flex;
    flex-direction: column;
  }

  li{

    font-size: 18px;
  }
    </style>

</head>

  {{-- @include('partials.navigation', ['waybill' => 'fw-bold']) --}}
@extends('layouts.app')
@include('partials.navigationCompany')

<div class="mx-4">
    <div class="main-wrapper border border-2" style=" max-width: 100%;">

        <div class="employee-header-container">
            <h3 class="">TRANSFER TO FORWARDING</h3>
        </div>

        <section class="search-filter-container mb-4">

            <div class="top-container1">
                <div class="input-group rounded">
                    <input type="search" class="form-control rounded" placeholder="Tracking ID" aria-label="Search" aria-describedby="search-addon" />
                    <span class="input-group-text border-0" id="search-addon">
                      <i class="fas fa-search"></i>
                    </span>
                </div>
                
            </div>
        </section>

    </div>
      <div class="employee-header-container">
        <h3 class="">WAYBILL DETAILS</h3>
      </div>
      <div class="parent-div">

        <div class="card-body">
          <div class="row">
              <!-- Forms -->
              <div class="col-sm-6">
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
              <div class="col-sm-6">   
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
</div>