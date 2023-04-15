<form action="{{route('company.transfer')}}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$shipments['id']}}"><br><br>
    <label class="form-label" for="trackingNum">Tracking Number: {{$shipments['tracking_number']}}</label><br><br>
    <label class="form-label" for="stationfromID">Transfer from Station#: {{$shipments['station_id']}}</label><br><br>
    <label class="form-label" for="stationfromName">Station Name: {{$shipments['station']}}</label><br><br>
    <label class="form-label" for="transfer_to_id">Transfer To:</label>
    <input type="text" name="station_id" placeholder="Enter Station ID"><br><br>
    <label class="form-label" for="transfer_to_name">Station Name:</label>
    <input type="text" name="station" placeholder="Enter Station Name"><br><br>
    <button type="submit">Transfer</button>
</form>