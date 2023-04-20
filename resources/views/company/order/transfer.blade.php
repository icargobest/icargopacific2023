<head>
    <link rel="stylesheet" href="{{ asset('css/style_order.css') }}">
    <title>Orders</title>
  </head>


<form  method="POST" action="{{route('shipment.transfer')}}">
    @csrf
    <input type="hidden" name="id" value="{{$shipments['id']}}"><br><br>
    <label class="form-label" for="trackingNum">Tracking Number: {{$shipments['tracking_number']}}</label><br><br>
    <label class="form-label" for="stationfromID">Transfer from Station#: {{$shipments['station_id']}}</label><br><br>
    <label class="form-label" for="stationfromName">Station Name: {{$shipments['station_name']}}</label><br><br>
    <label class="form-label" for="transferto_station_id">Transfer To:</label>
    <input type="text" name="transferto_station_id" placeholder="Enter Station ID" required><br><br>
    <label class="form-label" for="transferto_station">Station Name:</label>
    <input type="text" name="transferto_station" placeholder="Enter Station Name" required><br><br>
    <button type="submit">Transfer</button>
</form>