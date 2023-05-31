<title>Dispatcher | History</title>
@include('partials.header')
@extends('layouts.app')
@include('partials.navigationDispatcher', ['history' =>"nav-selected"])
<title>Dispatcher | History</title>
<main class="container py-5" style="margin-top:-60px !important">
    <div class="mt-4 driver-order-header py-2 px-4 shadow">
      <h3 style="letter-spacing:1px; margin-bottom: 0px !important;">Dispatch History</h3>
    </div>
    <div class="main-wrapper shadow" style="background-color:white;">

        <div class="mt-2">
            @include('flash-message')
        </div>


        <div class="table-container">
            <table class="table table-striped history-table border border-2 shadow table-borderless hover" id="dispatcherOrderHistoryTable">
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
                            @foreach ($shipments as $ship)
                                    @if($ship->company_id == $company_id_dispatcher && $ship->dispatcher_id == $dispatcher_id && $ship->status == 'Delivered')
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
                                            <td>
                                                <label class="status-deliveredv2">{{$ship->status}}</label>
                                            </td>
                                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script type="text/javascript">
    let dispatcherOrderHistoryTable = new DataTable('#dispatcherOrderHistoryTable');
</script>

@include('partials.footer')	
