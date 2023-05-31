    <head>
        <title>Company | Freight</title>

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
            vertical-align: middle;
            }
            </style>
    </head>
    @include('partials.header')
    @extends('layouts.app')
    @include('partials.navigationCompany', ['freight' => 'nav-selected'])



    <div class="mx-2">
        <div class="main-wrapper border border-2" style=" max-width: 100%;">

            <div class="employee-header-container">
                <h3 class="">FREIGHT LIST</h3>
            </div>

            <section class="mb-5 px-2 h-90" style="overflow-x:auto">
                <table class="table table-striped table-bordered table-hover table-borderless hover"
                id="companyfreight">
                    <thead class="table-dark">
                        <col>
                        <colgroup span="3"></colgroup>
                        <colgroup span="3"></colgroup>
                        <colgroup span="3"></colgroup>
                        <tr>
                            <thead>
                                <th class="text-center" colspan="2" scope="colgroup">SENDER</th>
                                <th class="text-center" colspan="2" scope="colgroup">RECEIVER</th>
                                <th class="text-center" colspan="4" scope="colgroup">ITEM INFORMATION</th>
                                <th class="text-center" colspan="1" scope="colgroup"></th>
                            </thead>

                        </tr>
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">NAME</th>
                                <th class="text-center" scope="col">ADDRESS</th>
                                <th class="text-center" scope="col">NAME</th>
                                <th class="text-center" scope="col">ADDRESS</th>
                                <th class="text-center" scope="col">TRACKING NUMBER</th>
                                <th class="text-center" scope="col">SIZE & WEIGHT</th>
                                <th class="text-center" scope="col">TOTAL PRICE</th>
                                <th class="text-center" scope="col">MODE of PAYMENT</th>
                                <th class="text-center" scope="col">ACTION</th>
                            </tr>
                        </thead>

                    </thead>

                    <tbody>
                        @foreach ($shipments as $ship)
                            @if (Auth::user()->type == 'company')
                                @if ($company->id == $ship->company_id && $ship->status != 'Delivered')
                                    <tr>

                                        {{-- sender namae --}}
                                        <td>{{ $ship->sender->sender_name }}</td>
                                        {{-- sender address --}}
                                        <td>{{ $ship->sender->sender_address }} , {{ $ship->sender->sender_city }} ,
                                            {{ $ship->sender->sender_state }} , {{ $ship->sender->sender_zip }}</td>
                                        {{-- receiver name --}}
                                        <td>{{ $ship->recipient->recipient_name }}</td>
                                        {{-- receiver address --}}
                                        <td>{{ $ship->recipient->recipient_address }} ,
                                            {{ $ship->recipient->recipient_city }} ,
                                            {{ $ship->recipient->recipient_state }} ,
                                            {{ $ship->recipient->recipient_zip }}</td>

                                        {{-- item id --}}
                                        <td><strong>{{ $ship->tracking_number }}</strong></td>
                                        {{-- Size & Weight --}}
                                        <td>{{ intval($ship->length) }}x{{ intval($ship->width) }}x{{ intval($ship->height) }}
                                            | {{ intval($ship->weight) }}Kg</td>
                                        {{-- Category --}}
                                        <td>{{ $ship->bid_amount }}</td>
                                        {{-- Mode of Pament --}}
                                        <td>{{ $ship->mop }}</td>

                                        <td class="tdbutton" style="max-width:120px">
                                            {{-- <button class="btn created-button mx-auto" data-bs-toggle="modal" data-bs-target="#trackModal">Tracking</button> --}}
                                            @include('company/freight.freight_tracking')
                                            {{-- @if ($ship->status == 'Assort')
                                                @if ($ship->status != 'Transferred')
                                                    @include('company.freight.transfer')
                                                @endif
                                            @endif --}}
                                            @include('company.freight.print-modal')
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    </div>



<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        let table = new DataTable("#companyfreight");
    });
</script>

@include('partials.footer')
