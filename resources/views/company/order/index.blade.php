<head>
    <link rel="stylesheet" href="{{ asset('css/style_order.css') }}">
    <title>Company | Order List</title>
    <link rel="shortcut icon" href="{{ asset('ICARGOicon.ico') }}">
</head>

  {{-- @include('partials.navigation', ['waybill' => 'fw-bold']) --}}
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

	<style>
        body{
            font-family: 'Poppins';
        }
        .img-size {
            object-fit: contain;
            min-width: 100px;
        }
        th {
            background-color: white !important;
            color: black;
            font-weight: normal;
        }
        td {
            text-align: left;
            font-weight: bold;
        }
    </style>
    {{-- ORDER CONTAINER RECONCEPTUALIZE --}}
	<div class="container mw-100 my-0">
        <div class="bg-white shadow" style="max-width: 100%;">
            <div class="waybill-head py-3 ps-5" style="background-color: #214D94;">
                <h3 class="text-white mb-0">ORDER LIST</h3>
            </div>
            {{-- CARD CREATED AFTER FILLING UP --}}
            <!-- table starts here -->
            <section class="mb-5 px-5 my-3 overflow-auto">
                <table class="table table-striped table-hover">
                <thead class="text-white" style="background-color: #214D94;">
                    <tr>
                        <th>ID</th>
                        <th>PHOTO</th>
                        <th>PICKUP</th>
                        <th>DROPOFF</th>
                        <th>ITEM</th>
                        <th>SIZE & WIDTH</th>
                        <th>MINIMUM BID</th>
                        <th>STATUS</th>
                        <th> </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($shipments as $ship)
                    @if(Auth::user()->id == $ship->user_id || (Auth::user()->type == 'company' && $ship->company_bid == Auth::user()->name && $ship->status == 'Processing') || (Auth::user()->type == 'company' && $ship->company_bid == null && $ship->status == 'Pending'))
                    <tr>
                        
                        <td>{{$ship->id}}</td>
                        <!-- <td><img src="{{asset($ship->photo)}}" class="card shadow-0 img-size" alt=""/></td> -->
                        <td class="mw-25">
                            <img class="card shadow-0 img-size w-25" src="https://images.unsplash.com/photo-1600331073565-d1f0831de6cb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=885&q=80" alt="">
                        </td>
                        <td>{{$ship->sender->sender_address}}, {{$ship->sender->sender_city}}, {{$ship->sender->sender_state}}, {{$ship->sender->sender_zip}}</td>
                        <td>{{$ship->recipient->recipient_address}}, {{$ship->recipient->recipient_city}}, {{$ship->recipient->recipient_state}}, {{$ship->recipient->recipient_zip}}</td>
                        <td>{{$ship->category}}</td>
                        <td>{{intval($ship->length)}}x{{intval($ship->width)}}x{{intval($ship->height)}} | {{intval($ship->weight)}}Kg</td>
                        <td>{{$ship->min_bid_amount}}</td>
                        <td>Processing</td>
                        <td>
                            @include('company.order.view')
                        </td>
                        
                    </tr>
                    @endif
                    @endforeach
                </tbody>
                </table>
            </section>
            <!-- table end -->
            {{-- END OF CARD --}}
        </div>
    </div>

    <!-- End of Waybill List -->
    @include('partials.footer')
