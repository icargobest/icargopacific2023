<head>
    <link rel="stylesheet" href="{{ asset('css/style_order.css') }}">
    <title>Orders</title>
</head>


<form  method="POST" action="{{route('shipment.transfer')}}">
    @csrf
    <input type="hidden" name="id" value="{{$shipments['id']}}"><br><br>
    <label class="form-label" for="trackingNum">Tracking Number: {{$shipments['tracking_number']}}</label><br><br>
    <label class="form-label" for="stationfromID">Transfer from Station#: {{$shipments['station_id']}}</label><br><br>
    <label class="form-label" for="stationNumber">Transfer To:</label>
    <select class="form-control" id="exampleFormControlSelect1" name="transferto_station_id" required>
        @foreach($stations as $stats)
        <option value="{{$stats->station_number}}">{{$stats->station_number}}</option>
        @endforeach
    </select>
    <button type="submit">Transfer</button>
</form>