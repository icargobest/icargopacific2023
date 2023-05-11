<head>
    
    <title>Company | Transfer Forwarding</title>

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
@include('partials.navigationCompany',['advance' => "nav-selected"])


<div class="mx-4">
    <div class="main-wrapper border border-2" style=" max-width: 100%;">

        <div class="employee-header-container">
            <h3 class="">TRANSFER TO FORWARDING</h3>
        </div>

    </div>
      <div class="employee-header-container">
        <h3 class="">WAYBILL DETAILS</h3>
      </div>
      <div class="parent-div">

        <div class="first-child col-sm-6 col-md-6 ">

          <div class="div input-group rounded mb-4" style="width: 98% !important;">
            <input type="search" class="form-control rounded" placeholder="SHIPPING DATE" aria-label="Search" aria-describedby="search-addon" style="margin-left: 15px;" />
            <span class="input-group-text border-0" id="search-addon">
              <i class="fa fa-calendar"></i>
            </span>
          </div>

          <div class="div mb-4">
            <label class="form-label" for="transfer_station_number"></label>
            <select type="text" name="select_company" style="width:95% !important; height:33.26px; border-radius:0.375rem;"required>
              <option value="" hidden>SELECT COMPANY</option>
              <?php
                // foreach ($stations as $station) {
                //     echo "<option value='{$station['station_number']}'>{$station['station_number']}</option>";
                // }
                ?>
            </select>
          </div>

          <div class="div mb-4">
            <select type="text" name="select_transport" style="width:95% !important; height:33.26px; border-radius:0.375rem;"required>
              <option value="" hidden>SELECT TRANSPORT</option>
              <?php
                // foreach ($stations as $station) {
                //     echo "<option value='{$station['station_number']}'>{$station['station_number']}</option>";
                // }
                ?>
            </select>
          </div>

          <div class="div mb-4">
            <select type="text" name="select_method" style="width:95% !important; height:33.26px; border-radius:0.375rem;"required>
              <option value="" hidden>SELECT METHOD</option>
              <?php
                // foreach ($stations as $station) {
                //     echo "<option value='{$station['station_number']}'>{$station['station_number']}</option>";
                // }
                ?>
            </select>
          </div>

          <div class="div mb-4">
            <input type="search" class="form-control rounded" placeholder="FREIGHT CHARGES"/>
          </div>

          <div class="div mb-4">
            <input type="search" class="form-control rounded" placeholder="TOTAL AMOUNT"/>
          </div>
        
        </div>

        <div class="second-child col-sm-6 col-md-6 border">
          <div class="second-div ">
              <div class="receiverInfo border pt-4">
                <ul>
                    <li class="mb-3">ID : <span><strong>#28</strong></span></li>
                    <li class="mb-3">PICKUP : <span><strong>Sample Pick-up</strong></li>
                    <li class="mb-3">DROP-OFF : <span><strong>Sample Drop-off</strong></li>
                    <li class="mb-3">PARCEL SIZE & WEIGHT : <span><strong>29X88 | 6KG</strong></span></li>
                    <li class="mb-3">PARCEL ITEM : <span><strong>Computer & Tablets</strong></span></li>
                </ul>
              </div>

              <div class="mt-4 text-center">
                <button class="btn btn-primary w-100">SUBMIT</button>
              </div>
          </div>
        </div>
      </div>
</div>