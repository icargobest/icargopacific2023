@include('partials.header')
@extends('layouts.app')
@include('partials.navigationDriver',['history' => "nav-selected"])
<title>Driver | History</title>

<main class="container py-5" style="margin-top:-49px !important">
    <div class="mt-4">
      <h2 class="" style="border-bottom: 2px solid black; padding-bottom: 5px; letter-spacing:1px;">DELIVER HISTORY</h3>
    </div>
    <div class="main-wrapper" style=" max-width:">

        <section class="search-filter-container">

            <div class="top-container1" style="max-width: 800px; margin-top: 15px">
                <h5 class="fw-normal mb-2 d-inline">SEARCH:</h5>
                <div class="input-group rounded">
                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" style="background-color: white">
                    <span class="input-group-text border-0" id="search-addon">
                      <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>


        </section>

        <div class="mt-2">
            @include('flash-message')
        </div>


        <div class="table-container">
            <table class="table table-striped history-table border border-2 shadow">
                <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Company</th>
                    <th scope="col">Date Ordered</th>
                    <th scope="col">Date Delivered</th>
                    <th scope="col">Status</th>
                </tr>
                </thead>
                <tbody class="history-tbody">
                    @foreach ($shipments as $ship)
                        @if(Auth::user()->type == 'driver' && ($ship->status == 'Delivered' || $ship->status == 'Assort'))
                            @if($ship->driver_id == $driverID )
                                <tr>
                                    <!-- Photo not showing -->
                                    <td style="width: 70px;">
                                        <img src="{{asset($ship->photo)}}" class="card shadow-0 w-25" style="min-width: 70px; object-fit: contain;" alt="Photo"/>
                                    </td>
                                    <td>{{$company_name}}</td>
                                    <td>{{ date('Y-m-d h:i:s A', strtotime($ship->created_at)) }}</td>
                                    <td>{{ date('Y-m-d h:i:s A', strtotime($ship->updated_at)) }}</td>
                                    @switch($ship->status)
                                        @case('Assort')
                                            <td class="" style="overflow: auto">
                                                <label class="status-deliveredv2">
                                                    Delivered
                                                </label>
                                            </td>
                                            @break
                                        @case('Delivered')
                                            <td class="" style="overflow: auto">
                                                <label class="status-deliveredv2">
                                                    Delivered
                                                </label>
                                            </td>
                                            @break
                                        @default
                                            <td></td>
                                    @endswitch
                                    
                                </tr>
                            @endif
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
</main>


@include('partials.footer')	
