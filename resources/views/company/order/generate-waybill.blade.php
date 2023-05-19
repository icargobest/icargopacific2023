<!DOCTYPE html>
<html>
<head>
	<title>Waybill Form</title>
	<style>
		/* Style for the modal overlay */
		body {
			background-color: #f2f2f2;
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
		}

        /* Style for the logo and qrcode */
        .image-row {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin-top: 20px;
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
			max-width: 60%;
			max-height: 100%;
		}

		.sticker h1 {
			font-size: 32px;
			color: #214D94;
			margin-top: 0;
			margin-bottom: 20px;
			text-align: center;
		}

		.sticker table {
			width: 100%;
			border-collapse: collapse;
			margin-bottom: 20px;
		}

		.sticker table th, .sticker table td {
			padding: 10px;
			text-align: left;
			border: 1px solid #214D94;
		}

		.sticker table th {
			background-color: #214D94;
			color: white;
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

        @media print {
            .print-button {
                display: none;
            }
        }
	</style>
</head>
<body>

            <div class="sticker">
                <div class="image-row">
                    <img src="/img/icargo-logo-1.jpg" style="max-height:50px;">

                        <td>
                            <p><strong>Name:</strong> {{$ship->recipient->recipient_name}}<br><br>
                            <strong>Address:</strong> {{$ship->recipient->recipient_address}}<br>
                            {{$ship->recipient->recipient_city}}, {{$ship->recipient->recipient_zip}}<br>
                            {{$ship->recipient->recipient_state}}</p>
                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <th>Shipment Details</th>
                    </tr>
                    <tr>
                        <td>
                            <p><strong>Tracking Number:</strong> {{$ship->tracking_number}}</p>
                            <p><strong>Details:</strong> {{intval($ship->length)}}x{{intval($ship->width)}}x{{intval($ship->height)}} | {{intval($ship->weight)}} Kg</p>
                            <p><strong>Mode of Payment:</strong> </p>
                            <p><strong>Total Price:</strong> </p>
                        </td>
                    </tr>
					<button class="print-button" onclick="window.print()">Print</button>
                </table>
                <th width="25%" colspan="1">
                    <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG("$ship->user_id - $ship->tracking_number - $ship->id", 'C128',2,50) }}" alt="barcode">
                </th>
				
            </div>
			



</body>
</html>
