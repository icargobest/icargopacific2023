<head>
    
    <title>Company | Transfer Forwarding</title>

    <script src="https://code.jquery.com/jquery-1.12.4.js" ></script>

    <style>
        #table-div th, #table-div td{
          background-color: transparent !important;
          color:black !important;
          text-align: left !important;
          
        }

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
@include('partials.header')
@extends('layouts.app')
@include('partials.navigationCompany',['advance' => "nav-selected"])


<div class="content-containe mx-4 pt-4">
    <div class="main-wrapper border border-2" style=" max-width: 100%;">

        {{-- error message --}}
        @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
        </div>  
        @endif

        <div class="employee-header-container">
            <h3 class="">TRANSFER TO FORWARDING</h3>
        </div>

        <section class="search-filter-container mb-4">

            <div class="top-container1 mt-2">
                <div class="input-group rounded">
                    <input type="search" class="form-control rounded" placeholder="Tracking ID" aria-label="Search" aria-describedby="search-addon" />
                    <span class="input-group-text border-0" id="search-addon">
                      <i class="fas fa-search"></i>
                    </span>
                </div>
                
            </div>
        </section>

    </div>
    <div class="waybill-div mt-4 border">
      <div class="employee-header-container">
        <h3 class="">WAYBILL DETAILS</h3>
      </div>
      <div class="parent-div">

        <div class="card-body mx-2">
          <div class="row">
              <!-- Forms -->
              <div class="col-sm-6 col-md-6">

                @if(Auth::user()->type == 'company')
         
                <form action="{{route('advFreight.transfer', $ship->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                {{-- this is where the error message came out --}}
                <div class="div input-group rounded mb-4" style="width: 98% !important;">
                    <div class="mt-2">@include('flash-message')</div>
                    <input type="date" id="shipping_date" name="shipping_date" class="form-control @error('shipping_date')is-invalid @enderror" placeholder="SHIPPING DATE" aria-label="Search" aria-describedby="search-addon" style="margin-left: 15px;" />
                </div>

                <input type="hidden" name="id" value="{{$ship->id}}">
                <input type="hidden" name="transfer_from_company" value="{{Auth::user()->id}}">

                  <div class="input-group pb-3">
                      <input type="date" class="form-control" style="background-color: #EAEBEE"/>
                  </div>
                  <div class="input-group pb-3">
                      <select class="form-control" style="background-color: #EAEBEE">
                        <option value="" hidden>SELECT COMPANY</option>
                        <?php
                           foreach ($companies as $company) {
                              echo "<option value='{$company['user_id']}'>{$company['user_id']}</option>";
                           }
                          ?>
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
                    <input type="text" name="payment_method" value="{{$ship->mop}}" placeholder="{{$ship->mop}}"/>
                    <label class="form-label">Payment Method</label>
                  </div>
                  <div class="input-group pb-3">
                      <div class="form-outline">
                          <input type="number" name="freight_charges" class="form-control @error('freight_charges')is-invalid @enderror input-sm text-right amount" placeholder="FREIGHT CHARGES" style="background-color: #EAEBEE"/>
                          <label class="form-label">Freight Charges</label>
                      </div>
                  </div>
                  <div class="input-group pb-3">
                      <div class="form-outline">
                          <input type="number" name="total_amount" readonly id="total_amount" class="form-control" style="background-color: #EAEBEE"/>
                          <label class="form-label">Total Amount</label>
                      </div>
                  </div>
              </div>
              <!--  Forms End -->
              <!-- Form -->
              <div class="col-sm-6 col-md-6 mt-3">   
                  <div class="border border-secondary p-3 rounded" id="table-div">
                      <table class="table table-responsive table-sm table-borderless table-no-bottom-space">
                          <tbody>
                              <tr>
                                  <th scope="row">ID:</th>
                                  <td class="fw-bold py-2">{{$ship['id']}}</td>
                              </tr>
                              <tr>
                                  <th scope="row">Pick-up:</th>
                                  <td class="fw-bold py-2">{{$ship->sender['sender_address']}}</td>
                              </tr>
                              <tr>
                                  <th scope="row">Drop-off:</th>
                                  <td class="fw-bold py-2">{{$ship->recipient['recipient_address']}}</td>
                              </tr>
                              <tr>
                                  <th scope="row">Parcel Size & Weight:</th>
                                  <td class="fw-bold py-2">{{intval($ship->length)}}x{{intval($ship->width)}}x{{intval($ship->height)}} | {{intval($ship->weight)}}Kg</td>
                              </tr>
                              <tr>
                                  <th scope="row border-bottom-0">Parcel Item:</th>
                                  <td class="fw-bold py-2">{{$ship['order_type']}}</td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
                  <div class="d-grid gap-2 col-12 pt-4">
                      <button class="btn text-light shadow-0" style="background-color: #214D94;">
                      <h6 class="mb-0 fw-bold">Submit</h6>
                      </button>
                      <button class="btn text-light shadow-0" style="background-color: white; border-color:#214D94; color:black !important;">
                      <h6 class="mb-0 fw-bold">Cancel</h6>
                      </button>
                  </div>
              </div>
              
          </div>
        </form>
        @endif
        </div>
      </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
      
      var total_amount = function(){
        var total = 0;
        $('.amount').each(function(){
          var num = $(this).val().replace(',','');
  
          if(num != 0){
            temp = parseFloat(num * 0.1);
            total = parseFloat(num) + parseFloat(temp);
          }
        });
  
        $('#total_amount').val(total);
      }
  
      $('.amount').keyup(function(){
        total_amount();
      });
  
    });
  </script>