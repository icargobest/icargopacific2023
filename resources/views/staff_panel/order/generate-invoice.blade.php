<!DOCTYPE html>
<html>

<head>
    <title>Invoice #{{ $ship->id }}</title>
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="/css/bootstrap.css">
    {{-- POPPINS FONT --}}
    <link href="https://fonts.googleapis.com">
    <title>Invoice #{{ $ship->id }}</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <style>
        body {
            font-family: 'Poppins';
        }

        p {
            margin: 4px;
        }

        @media print {
            .print-button {
                display: none;
            }
        }

        .print-button {
            background-color: #333;
            color: #fff;
            font-size: 12px;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <main class="container border bg-white w-100 p-3">
        <div>
            <button class="print-button" onclick="window.print()">Print</button>
        </div>
        <header class="row">
            <div class="col-2">
                <img src="/img/icargo-logo-1.jpg" style="max-height:60px;">
            </div>
            <div class="col-4">
                <h3 class="mb-0 fw-bold" style="color: #214D94;">iCARGO</h3>
                <h3 class="mb-0 fw-bold" style="color: #F9CD1A;">PACIFIC</h3>
            </div>
            <div class="col-4 text-end">
                <h1 class="mb-0 fw-bold" style="color: #214D94; letter-spacing: 3px;">INVOICE</h1>
                <h5 class="mb-0">NO: {{ $ship->id }}</h5>
            </div>
            <div class="col-1 text-end">
                <img src="data:image/png;base64,{{ DNS2D::getBarcodePNG("$ship->user_id - $ship->tracking_number - $ship->id", 'QRCODE', 10, 10) }}"
                    alt="QR Code" style="max-height:70px;">
            </div>
        </header>
        <hr>
        <div class="row">
            <div class="col-6">
                <p class="fw-bold">SENDER:</p>
                <p>{{ $ship->sender->sender_name }}</p>
                <p>{{ $ship->sender->sender_mobile }}
                    @if ($ship->sender->sender_tel != null)
                        | {{ $ship->sender->sender_tel }}
                    @endif
                </p>
                <p>{{ $ship->sender->sender_address }}
                    , {{ $ship->sender->sender_city }},
                </p>
                <p>
                    {{ $ship->sender->sender_state }}
                    , {{ $ship->sender->sender_zip }}
                </p>
            </div>
            <div class="col-6 text-end m-0">
                <p class="fw-bold m-0">RECEIVER:</p>
                <p>{{ $ship->recipient->recipient_name }}</p>
                <p>{{ $ship->recipient->recipient_mobile }}
                    @if ($ship->recipient->recipient_tel != null)
                        | {{ $ship->recipient->recipient_tel }}
                    @endif
                </p>
                <p>{{ $ship->recipient->recipient_address }}
                    , {{ $ship->recipient->recipient_city }},
                </p>
                <p>{{ $ship->recipient->recipient_state }}
                    , {{ $ship->recipient->recipient_zip }}
                </p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-8">
                <table>
                    <tbody>
                        <tr>
                            <th colspan="2">ORDER DETAILS:</th>
                        </tr>
                        <tr>
                            <td>Order ID:</td>
                            <td>{{ $ship->id }}</td>
                        </tr>
                        <tr>
                            <td>Tracking No.:</td>
                            <td>{{ $ship->tracking_number }}</td>
                        </tr>
                        <tr>
                            <td>Order Date:</td>
                            <td>{{ $ship->created_at }}</td>
                        </tr>
                        <tr>
                            <td>Payment Mode:</td>
                            <td>{{ $ship->mop }}</td>
                        </tr>
                        <tr>
                            <td>Order Status:</td>
                            <td>{{ $ship->status }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-4 d-flex flex-column align-items-end justify-content-end">
                <p class="fw-bold">Date Issued:</p>
                <p>{{ date('d/m/Y', strtotime($log->isPendingTime)) }}</p>
            </div>
        </div>
        <section class="mb-5 my-3 overflow-auto">
            <table class="table table-striped table-hover">
                <thead class="text-white" style="background-color: #214D94;">
                    <tr>
                        <td>Product</td>
                        <td>Details</td>
                        <td>Price</td>
                        <td>Qty</td>
                        <td>Total</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $ship->item }}</td>
                        <td width="25%">{{ intval($ship->length) }}
                            x{{ intval($ship->width) }}
                            x{{ intval($ship->height) }}
                            | {{ intval($ship->weight) }}Kg
                        </td>
                        <td width="15%">Php {{ $ship->total_price }}</td>
                        <td width="7%">{{ $ship->quantity }}</td>
                        <td width="15%">Php {{ $ship->total_price }}</td>
                    </tr>
                    <tr>
                        <th>
                            Total
                            <small class="fw-normal"> - (Include all VAT/TAX):</small>
                        </th>
                        <td colspan="3"></td>
                        <td class="fw-bold">Php {{ $ship->total_price }}</td>
                    </tr>
                </tbody>
            </table>
        </section>
        <footer class="justify-content-end">
            <hr class="opacity-75">
            <div class="text-center">
                <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG("$ship->user_id - $ship->tracking_number - $ship->id", 'C128', 2, 50) }}"
                    alt="barcode" style="height:60px;">
            </div>
            <hr class="opacity-75">
        </footer>
    </main>
</body>

</html>
