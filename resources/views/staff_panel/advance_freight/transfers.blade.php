<head>
<title>Staff | Transfer Forwarding</title>
</head>
@include('partials.header')
@extends('layouts.app')
@include('partials.navigationCompany',['advance' => "nav-selected"])
@if($errors->any())
    @foreach($errors->all() as $err)
        <strong>{{$err}}</strong>
    @endforeach
@endif

<div class="mx-4">
    <div class="main-wrapper border border-2" style=" max-width: 100%;">
    @if(session()->has('message'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        {{session()->get('message')}}
    </div>  
    @endif
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
          @if(Auth::user()->type == 'staff')
          
         
          <form action="{{route('staff_advFreight.transfer', $ship->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <input type="hidden" name="id" value="{{$ship->id}}">

          <div class="div mb-4">
            <label class="form-label" for="transfer_to_company"></label>
            <select type="text" id="transfer_to_company" name="transfer_to_company" style="width:95% !important; height:33.26px; border-radius:0.375rem;"required>
              <option value="" hidden>SELECT COMPANY</option>
              <?php
                 foreach ($companies as $company) {
                    echo "<option value='{$company['user_id']}'>{$company['user_id']}</option>";
                 }
                ?>
            </select>
          </div>

          <div class="div mb-4">
            <input type="text" name="payment_method" value="{{$ship->mop}}" placeholder="{{$ship->mop}}"/>
          </div>

          <div class="div mb-4">
            <input type="search" id="freight_charges" name="freight_charges" class="form-control rounded" placeholder="FREIGHT CHARGES"/>
          </div>

          <div class="div mb-4">
            <input type="search" class="form-control rounded" placeholder="TOTAL AMOUNT"/>
          </div>
        
        </div>

        <div class="second-child col-sm-6 col-md-6 border">
          <div class="second-div ">
              <div class="receiverInfo border pt-4">
                <ul>
                    <li class="mb-3">ID : <span><strong>{{$ship['id']}}</strong></span></li>
                    <li class="mb-3">PICKUP : <span><strong>{{$ship->sender['sender_address']}}</strong></li>
                    <li class="mb-3">DROP-OFF : <span><strong>{{$ship->recipient['recipient_address']}}</strong></li>
                    <li class="mb-3">PARCEL SIZE & WEIGHT : <span><strong>{{intval($ship->length)}}x{{intval($ship->width)}}x{{intval($ship->height)}} | {{intval($ship->weight)}}Kg</strong></span></li>
                    <li class="mb-3">PARCEL ITEM : <span><strong>{{$ship['order_type']}}</strong></span></li>
                </ul>
              </div>

              <div class="mt-4 text-center">
                <button class="btn btn-primary w-100">SUBMIT</button>
              </div>
              
          </div>
        </div>
      </form>
        
        
        @endif
      </div>
</div>




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
