<title>Dispatcher | History</title>

@extends('layouts.app')
@include('partials.navigationDispatcher', ['history' =>"nav-selected"])
<title>Dispatcher | History</title>
<main class="container py-5" style="margin-top:-49px !important">
    <div class="mt-4">
      <h2 class="" style="border-bottom: 2px solid black; padding-bottom: 5px; letter-spacing:1px;">DISPATCH HISTORY</h3>
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
                    <th scope="col">Date Dispatched</th>
                    <th scope="col">Driver Name</th>
                    <th scope="col">Status</th>
                </tr>
                </thead>
                <tbody class="history-tbody">
                    @foreach ($drivers as $user)
                        @if($user->dispatcher_id == Auth::id())
                            @foreach ($shipments as $ship)
                                    @if($ship->company_id == $company_id_dispatcher && $ship->driver_id == $user->id && $ship->driver_id != null)
                                        <tr>
                                            <!-- Photo not showing -->
                                            <td style="width: 70px;">
                                                <img src="{{asset($ship->photo)}}" class="card shadow-0 w-25" style="min-width: 70px; object-fit: contain;" alt="Photo"/>
                                            </td>
                                            <td>{{$company_name}}</td>
                                            <td>{{$ship->created_at}}</td>
                                            <td>{{$ship->updated_at}}</td>
                                            <td>
                                                @foreach ($drivers as $driver)
                                                    @if($driver->id == $ship->driver_id)
                                                        {{$driver->user->name}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{$ship->status}}</td>
                                        </tr>
                                    @endif
                            @endforeach
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
</main>


@include('partials.footer')	
