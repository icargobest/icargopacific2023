<title>test lang</title><br><br>
<table border="1">
  <tr>
    <td>id</td>
    <td>tracking number</td>
    <td>sender name</td>
    <td>sender address</td>
    <td>sender city</td>
    <td>sender state</td>
    <td>sender zip</td>
    <td>recipient name</td>
    <td>recipient address</td>
    <td>recipient city</td>
    <td>recipient state</td>
    <td>recipient zip</td>
    <td>length</td>
    <td>width</td>
    <td>height</td>
    <td>weight</td>
    <td>total price</td>
    <td>status</td>
  </tr>
  @foreach($branch1s as $branch1)
  <tr>
    <td>{{$branch1['id']}}</td>
    <td>{{$branch1['tracking_number']}}</td>
    <td>{{$branch1['sender_name']}}</td>
    <td>{{$branch1['sender_address']}}</td>
    <td>{{$branch1['sender_city']}}</td>
    <td>{{$branch1['sender_state']}}</td>
    <td>{{$branch1['sender_zip']}}</td>
    <td>{{$branch1['recipient_name']}}</td>
    <td>{{$branch1['recipient_name']}}</td>
    <td>{{$branch1['recipient_name']}}</td>
    <td>{{$branch1['recipient_name']}}</td>
    <td>{{$branch1['recipient_name']}}</td>
    <td>{{$branch1['length']}}</td>
    <td>{{$branch1['width']}}</td>
    <td>{{$branch1['height']}}</td>
    <td>{{$branch1['weight']}}</td>
    <td>{{$branch1['total_price']}}</td>
    <td>{{$branch1['status']}}</td>
  </tr>
  @endforeach
  <br><br>
</table><br><br><br><br>
<form action="/action_page.php">
  <label for="phone">select table to transfer:</label><br><br>
  <input type="text"  name="input" placeholder=""><br><br>
  <input type="submit">
</form>
