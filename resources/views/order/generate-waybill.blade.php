<!DOCTYPE html>
<html>
<head>
	<title>Waybill Form</title>
	<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
	<!--Bootstrap CSS-->
<link rel="stylesheet" href="/css/bootstrap.css">
{{-- POPPINS FONT --}}
    <link href="https://fonts.googleapis.com">
	<style>
		/* Style for the modal overlay */
		.body {
			background-color: #f2f2f2;
			display: flex;
			justify-content: center;
			align-items: center;
			font-family: 'Poppins';
			margin: 10px 0px
		}

        /* Style for the logo and qrcode */
        .image-row {
            display: flex;
        }

		/* Style for the modal container */
		.modal-container {
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			background-color: white;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
			width: 60%;
            max-height: 100%;
			overflow-y: auto;
		}

		/* Style for the close button */
		.close-button {
			position: absolute;
			top: 10px;
			right: 10px;
			font-size: 24px;
			color: #214D94;
			cursor: pointer;
		}

		/* Style for the waybill form */
		.sticker {
			background-color: white;
			padding: 20px;
			border: 1px solid #214D94;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
			max-width: 100%;

		}
		
		.sticker h1 {
			font-size: 35px;
			background-color: #214D94;
			color:  white;
			padding: 25px 25px 25px;
		}

		.sticker table {
			width: 100%;
			border-collapse: collapse;
			margin-bottom: 20px;
		}

		.sticker table th, .sticker table td {
			padding: 5px 20px 100px;
			text-align: left;
			border: 1px solid #214D94;
		}

		.sticker img {
			display: block;
			margin: 0 auto;
			max-width: 100%;
			height: auto;
			margin-top: 20px;
		}

        .print-button {
            background-color: #333;
            color: #fff;
            font-size: 12px;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
        }

		.textalignright
		{
			text-align:right;
		}

		.rotate-90{ 
			transform: rotate(-90deg);
			color: #214D94;
			letter-spacing: 3px;
			font-size: 25px;
			margin:-30px;
		}
		.rotate90{ 
			transform: rotate(90deg);
			color:  #214D94;
			letter-spacing: 3px;
			font-size: 25px;
			margin:-30px;
		}
		.rotatecolor{
			background-color: #F9CD1A;
		}
		.verticaltext{
           width:1px;
           word-wrap: break-word;
           white-space:pre-wrap; 
        }
		.smalltext{
			font-size: 15px;
		}

			.element {
			background: #F9CD1A;
			width: 600px;
			height: 75px;
			display: inline-block;
			clip-path: polygon(0 0, 100% 0%, 85% 100%, 0% 100%);
			}


        @media print {
            .print-button {
                display: none;
            }
        }
	</style>
</head>

<body>
	<div class="body">
	<div class="sticker">
		<button class="print-button" onclick="window.print()">
			Print
		</button>
		<h1 class="m-0">WAYBILL SUMMARY</h1>
		<div class="image-row p-0 m-0">
			<p class="element h4 p-4 m-0" style="color: #214D94">[{{$ship->tracking_number}}]</p>
			<table class="p-0 m-0">
				<thead>
					<tr>
						<td class="p-1 border-0 my-0 mx-auto" colspan="2">
							<img class="mx-auto my-0" src="/img/icargo-logo-1.jpg" style="max-height:60px;">
						</td>
						<td class="p-1 border-0 my-0 mx-auto" colspan="2" rowspan="2">
							<img class="mx-auto my-0" src="/img/jst-express-logo.png" style="max-height:80px;">
						</td>
					</tr>
				</thead>			
					</tr>
					<tr>
						<td class="m-0 p-0 border-0 text-end" style="color: #214D94"><p class="smalltext m-0 fw-bold">iCARGO</p></td>
						<td class="m-0 p-0 border-0" style="color: #F9CD1A"><p class="smalltext m-0 fw-bold">PACIFIC</p>
					</tr>
			</table>			
		</div>
		<table class="p-0 m-0">
			<thead>
					<tr>
						<th width="30%" height="75px" colspan="4" class="p-1 m-0">
							<p class="m-0">ORDER DATE:</p> <!-- margin-0 -->
							<p class="fw-normal m-0">{{date(' d / m / Y')}}</p> <!-- font-normal, margin-0 -->
						</th>
						<th rowspan="2" width="70%" colspan="6" class="m-0 p-1 text-center">
							<img class="m-0 p-1 mx-auto my-0 p-1" src="data:image/png;base64,{{ DNS1D::getBarcodePNG("$ship->user_id - $ship->tracking_number - $ship->id", 'C128',2,50) }}" alt="barcode" style="height:70px;">
						</th>	
					</tr>
					<tr>
						<th colspan="4" height="75px" class="p-1 m-0">
							<p class="m-0">ORDER NO:</p>
							<p class="fw-normal m-0">{{$ship->id}}</p>
						</th>
					</tr>
			</thead>
		</table>
		<table class="m-0 p-0" >
			<tbody>
				<tr>
					<th class="m-0 p-0" height="150px" width="2%" colspan="1" style="background-color:#F9CD1A;">					
						<div class="d-flex justify-content-center rotate-90">
							<p>SENDER</p>	
						</div>
					</th> 
					<th class="p-0" height="150px" width="1%" colspan="1" style="background-color:#214D94;"></th>
					<th class="m-0 p-1" height="150px" width="97%"  colspan="8">
						<div>SENDER'S NAME</div>
						<p height="150px" class="fw-normal">
							{{$ship->sender->sender_name}}<br>
							{{$ship->sender->sender_address}}, {{$ship->sender->sender_city}},
							{{$ship->sender->sender_state}}, {{$ship->sender->sender_zip}}<br>
							{{$ship->sender->sender_mobile}}
							@if($ship->sender->sender_tel != NULL)
							| {{$ship->sender->sender_tel}} @endif

						</p>
					</th>
				</tr>
				<tr>
					<th class="m-0 p-1" height="150px" colspan="8" width="97%">
						<div>RECEIVER'S NAME</div>
						<p class="fw-normal">
							{{$ship->recipient->recipient_name}}<br>
							{{$ship->recipient->recipient_address}},{{$ship->recipient->recipient_city}},				 
							{{$ship->recipient->recipient_state}},{{$ship->recipient->recipient_zip}}<br>
							{{$ship->recipient->recipient_mobile}}
							@if($ship->recipient->recipient_tel != NULL)
							| {{$ship->recipient->recipient_tel}} @endif
						</p>
						<th class="p-0" height="150px" width="1%" colspan="1" style="background-color:#214D94;"></th>
					</th>
					<th class="m-0 p-0" colspan="1" height="150px" width="2%" style="background-color:#F9CD1A;">
						<div class="d-flex justify-content-center rotate90">
							<p>RECEIVER</p>	
						</div>
					</th>
				</tr>
				<tr>
					<th class="m-0 p-1" height="150px" colspan="10" width="100%"><div>ITEM INFORMATION</div>
						<p class="fw-normal">
						{{$ship->tracking_number}}<br>
						{{intval($ship->length)}}x{{intval($ship->width)}}x{{intval($ship->height)}} | {{intval($ship->weight)}} Kg
						<p>Total Price:</p>
					</th>
				</tr>
			</tbody>
			</table>
			<table class="m-0 p-0">
			<tbody>
				<tr>
					<th class="m-0 p-0" colspan="3" width="20%">                
						<img class="mx-auto my-0 p-1" src="data:image/png;base64,{{ DNS2D::getBarcodePNG("$ship->user_id - $ship->tracking_number - $ship->id", 'QRCODE',5, 5) }}" alt="QR Code">
					</th>
					<th class="mx-auto my-0" height="150px" c="7" width="80%">
						<p>MODE OF PAYMENT</p>
						<p class="fw-normal">{{$ship->mop}}</p>
					</th>
				</tr>
			</tbody>
		</table>
	</div>
</div>
</body>
</html>
