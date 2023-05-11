<head>
<title>Company | Adv. Freight</title>
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
</style>

</head>
@extends('layouts.app')
@include('partials.navigationCompany',['advance' => "nav-selected"])


<div class="mx-2">
    <div class="main-wrapper border border-2" style=" max-width: 100%;">

        <div class="employee-header-container">
            <h3 class="">ADVANCE FREIGHT LIST</h3>
        </div>

        <section class="search-filter-container mb-4">

            <div class="top-container1" style="max-width: 800px;">
                <h5 class="fw-normal mb-2 d-inline"> SEARCH:</h5>
                <div class="input-group rounded">
                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                    <span class="input-group-text border-0" id="search-addon">
                      <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>

        </section>

        <section class="mb-5 px-2 h-90" style="overflow-x:auto">            
                <table class="table table-striped table-bordered table-hover">
                <thead class="table-dark">
                    <col>
                    <colgroup span="3"></colgroup>
                    <colgroup span="3"></colgroup>
                    <colgroup span="3"></colgroup>
                    <tr>
                        
                        <th colspan="3" scope="colgroup">SENDER</th>
                        <th colspan="3" scope="colgroup">RECEIVER</th>
                        <th colspan="4" scope="colgroup">ITEM INFORMATION</th>
                        <th colspan="1" scope="colgroup"></th>
                    </tr>
                    <tr>
                        <th scope="col">NAME</th>
                        <th scope="col">ADDRESS</th>
                        <th scope="col">NUMBER</th>
                        <th scope="col">NAME</th>
                        <th scope="col">ADDRESS</th>
                        <th scope="col">NUMBER</th>
                        <th scope="col">ID</th>
                        <th scope="col">SIZE & WEIGHT</th>
                        <th scope="col">CATEGORY</th>
                        <th scope="col">MODE of PAYMENT</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($shipments as $ship)
                    @if(Auth::user()->id == $ship->user_id || (Auth::user()->type == 'company' && $ship->company_bid == Auth::user()->name && $ship->status == 'Processing' || (Auth::user()->type == 'company' && $ship->company_bid == Auth::user()->name && $ship->status == 'Transferred')))
         
                    <tr>
                        
                        {{-- sender namae --}}
                        <td>{{$ship->sender->sender_name}}</td>
                        {{-- sender address --}}
                        <td>{{$ship->sender->sender_address}} , {{$ship->sender->sender_city}} , {{$ship->sender->sender_state}} , {{$ship->sender->sender_zip}}</td>
                        {{-- sender number --}}
                        <td>{{$ship->sender->sender_mobile}} @if($ship->sender->sender_tel != NULL) | {{$ship->sender->sender_tel}} @endif</td>
                        
                        {{-- receiver name --}}
                        <td>{{$ship->recipient->recipient_name}}</td>
                        {{-- receiver address --}}
                        <td>{{$ship->recipient->recipient_address}} , {{$ship->recipient->recipient_city}} , {{$ship->recipient->recipient_state}} , {{$ship->recipient->recipient_zip}}</td>
                        {{-- receiver number --}}
                        <td>{{$ship->recipient->recipient_mobile}} @if($ship->recipient->recipient_tel != NULL) | {{$ship->recipient->recipient_tel}} @endif</td>
                        
                        {{-- item id --}}
                        <td>1{{$ship->id}}</td>
                        {{-- Size & Weight --}}
                        <td>{{intval($ship->length)}}x{{intval($ship->width)}}x{{intval($ship->height)}} | {{intval($ship->weight)}}Kg</td>
                        {{-- Category --}}
                        <td>{{$ship->category}}</td>
                        {{-- Mode of Pament --}}
                        <td>COD</td>

                        <td class="tdbutton" style="max-width:120px"><button class="btn created-button mx-auto" data-bs-toggle="modal" data-bs-target="#editModal">Tracking</button>
                        <a href="{{ url('/company/freight/transfers') }}"><button class="btn created-button mx-auto">Forward</button></a>
                        <button class="btn created-button mx-auto" data-bs-toggle="modal" data-bs-target="#editModal">Print</button></td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
                </table>


        </section>



        
    </div>
</div>

<script></script>