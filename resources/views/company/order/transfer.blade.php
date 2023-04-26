<head>
    <link rel="stylesheet" href="{{ asset('css/style_order.css') }}">
    <title>Company | Orders</title>
</head>
<br>
@if($errors->any())
@foreach($errors->all() as $err)
    <strong>{{$err}}</strong>
@endforeach
@endif

<form method="POST" action="{{route('shipment.transfer')}}">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{$shipments['id']}}"><br><br>
    <label class="form-label" for="trackingNum">Tracking Number: {{$shipments['tracking_number']}}</label><br><br>
    <label class="form-label" for="stationfromID">Transfer from Station#: {{$shipments['station_id']}}</label><br><br>
    <label class="form-label" for="stationNumber">Transfer To:</label>
    <select class="form-control" id="exampleFormControlSelect1" name="transferto_station_id">
        <option value="">select station ID</option>
        @foreach($stations as $stats)
        <option value="{{$stats->station_number}}">{{$stats->station_number}}</option>
        @endforeach
    </select>
    <button type="submit">Transfer</button>
</form>
