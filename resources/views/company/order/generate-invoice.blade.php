
    <title>Invoice #{{$ship->id}}</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>
<body>

    <table class="order-details">
        <thead>
            <tr>
                <th width="25%" colspan="1">
                    <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($ship->user_id.'-'.$ship->tracking_number.'-'.$ship->id, 'C128',2,50) }}" alt="barcode"/>
                </th>
                <th>
                    <img src="data:image/png;base64,{!! base64_encode(QrCode::format('png')->size(100)->generate($ship->tracking_number))!!}">
                </th width="50%" colspan="5">
                <th width="25%" colspan="3" class="text-end company-data">
                    <span>Invoice Id: {{$ship->id}}</span> <br>
                    <span>Date: {{date(' d / m / Y')}}</span> <br>
                    <span>Company: {{$ship->company_bade}}</span> <br>
                    <span>Zip code : (postal code)</span> <br>
                    <span>Address: (address of company)</span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="1">Order Details</th>
                <th width="25%" colspan="2">Sender Details</th>
                <th width="25%" colspan="2">Recipient Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Order Id: {{$ship->id}}</td>

                <td>Full Name:</td>
                <td>{{$ship->sender_name}}</td>

                <td>Full Name:</td>
                <td>{{$ship->recipient_name}}</td>
            </tr>
            <tr>
                <td>Tracking Id/No.: {{$ship->tracking_number}}</td>

                <td>Email Id:</td>
                <td>{{$ship->sender_email}}</td>

                <td>Email Id:</td>
                <td>{{$ship->recipient_name}}</td>
            </tr>
            <tr>
                <td>Ordered Date: {{$ship->created_at}}</td>

                <td>Phone:</td>
                <td>{{$ship->sender_mobile}}</td>

                <td>Phone:</td>
                <td>{{$ship->recipient_mobile}}</td>
            </tr>
            <tr>
                <td>Payment Mode:</td>

                <td>Address:</td>
                <td>{{$ship->sender_address}}, {{$ship->sender_city}}, {{$ship->sender_zip}}, {{$ship->sender_state}}</td>

                <td>Address:</td>
                <td>{{$ship->recipient_address}}, {{$ship->recipient_city}}, {{$ship->recipient_zip}}, {{$ship->recipient_state}}</td>
            </tr>
            <tr>
                <td>Order Status: {{$ship->status}}</td>


                <td>Pin code:</td>
                <td>566999</td>

                <td>Pin code:</td>
                <td>566999</td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Order Items
                </th>
            </tr>
            <tr class="bg-blue">
                <th>Product</th>
                <th>Details</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$ship->item}}</td>
                <td width="15%">{{$ship->length}}x{{$ship->width}}x{{$ship->height}} | {{$ship->weight}} Kg</td>
                <td width="10%">${{$ship->total_price}}</td>
                <td width="10%">{{$ship->quantity}}</td>
                <td width="15%" class="fw-bold">${{$ship->total_price}}</td>
            </tr>
            <tr>
                <td colspan="3" class="total-heading">Total Amount - <small>Inc. all vat/tax</small> :</td>
                <td colspan="1" class="total-heading">${{$ship->total_price}}</td>
            </tr>
        </tbody>
    </table>

    <br>
    <p class="text-center">
        Thank your for shopping with iCargo Pacific
    </p>
</body>
</html>
