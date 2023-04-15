@include('partials.navigation', ['shipments ' => 'fw-bold'])
<title>test lang</title><br><br>
<table>
  <tr>
    <td>id</td>
    <td>station id</td>
    <td>station name</td>
    <td>tracking number</td>
  </tr>

  @foreach($shipments as $shipment)
  <tr>
    <td>{{$shipment['id']}}</td>
    <td>{{$shipment['station_id']}}</td>
    <td>{{$shipment['station']}}</td>
    <td>{{$shipment['tracking_number']}}</td>
    <td><a href={{"edit/".$shipment['id']}}>Transfer</a></td> 
  </tr>
  @endforeach
  <br><br>
</table><br><br><br><br>
