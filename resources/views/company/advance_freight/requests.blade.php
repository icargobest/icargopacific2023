@extends('layouts.app')
@include('partials.navigationCompany')

<head>
    <link rel="stylesheet" href="{{ asset('css/style_order.css') }}">
    <title>Company | Requests</title>
    <br>
    @if($errors->any())
    @foreach($errors->all() as $err)
        <strong>{{$err}}</strong>
    @endforeach
    @endif
</head>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#transferModal">Requests</button>

<!-- Modal -->
<div class="modal top fade" id="transferModal" tabindex="-1" aria-labelledby="transferModal" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="transferModal">Freight Forwarding Requests</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

          <div class="modal-body">
          
          <table class="table table-bordered table-striped">
                <thead>
                  <th>Tracking Number</th>
                  <th>Order Type</th>
                  <th>Sender Name</th>
                  <th>Recipient Name</th>
                  <th>Bid Amount</th>
                </thead>
                @foreach ($shipments as $ship)
                @if(Auth::user()->type == 'company' && $ship->advTransferredto == Auth::user()->id && $ship->advTransferredStatus == "Pending")
                <tr>

                  <td>{{$ship->tracking_number}}</td>
                  <td>{{$ship->order_type}}</td>
                  <td>{{$ship->sender->sender_name}}</td>
                  <td>{{$ship->recipient->recipient_name}}</td>
                  <td>{{$ship->bid_amount}}</td>

                  <td>
                    <a href="{{url('/company/advFreight/accept', $ship->id)}}" class="btn btn-success">Accept</a>
                  </td>

                  <td>
                    <a href="{{url('/company/advFreight/decline', $ship->id)}}" class="btn btn-danger">Decline</a>
                  </td>

                </tr>
                
            
            @endif
            @endforeach
            </table>
              <div class="button-modal-container">


                </div>
          
          </div>
      </div>
    </div>
  </div>

@include('partials.footer')	


