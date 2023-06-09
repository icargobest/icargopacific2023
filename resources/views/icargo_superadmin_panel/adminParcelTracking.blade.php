<title>Track Parcel</title>

@extends('layouts.app')
@extends('partials.navigationSuperAdmin')
@extends('layouts.status')
@include('partials.navigationStaff',['qr' => "nav-selected"])

@php
    use Illuminate\Http\Request;
    $request = Request::capture();
@endphp

<link rel="stylesheet" href="./line-awesome.min.css">
  <div class="container center p-3">
      <div class="row">
        <div class="col-sm-12 col-12">
            <div>
              <h2 class="fw-bold">PARCEL TRACKING</h2>
            </div>
            <div class="container p-5 shadow" style=" background-color:white;">
            <div class="text-center">

              <main class="wrapper">
                <section class="container qrcontent" id="qrcontent">
                  {{-- <div>
                    <p>Enter tracking ID to search for parcel:</p>

                    <input type="text" placeholder="Enter tracking ID">
                    <button type="button" class="btn btn-primary">Search</button>

                  </div> --}}
                  <form action="/search" method="POST">
                    @csrf
                    <label for="id">Enter Tracking ID:</label>
                    <div class="row d-flex justify-content-center">
                      <input type="text" id="id" name="tracking_number" class="col-md-7 col-lg-3" value= "{{ $request->tracking_number }}">
                    </div>
                    <div class="row d-flex justify-content-center">
                      <button type="submit" class="btn btn-primary mt-3 col-md-7 col-lg-3" style="background-color:#1D4586; letter-spacing:1px; padding:5px;">SEARCH</button>
                    </div>
                  </form>
                <div id="message"></div>
              </div>

                  <!--
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Enter tracking ID">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">Search</button>
                    </div>
                  </div>
                  -->

                  <div style="display:none">
                    <label>QR Scanner</label>
                  </div>
                  <div class="col-12 d-flex justify-content-center mb-4" style="">
                    <div class="col-12 col-md-3 d-flex justify-content-center">
                      <a class="btn btn-danger mt-3" id="resetButton" style="padding:5px; width: 50%;">Reset</a>
                    </div>
                  </div>

                  {{-- <div class="p-3 col-4 border">
                    <!--<a class="btn btn-primary mt-3">Start</a> -->
                    <a class="btn btn-danger mt-3" id="resetButton" style="padding:5px">Reset</a>
                  </div> --}}

                  <div class="container d-flex justify-content-center mb-4" style="text-align:center;">
                    <div id = "reader" style="margin:auto;" width="230" height="230" style="border: 1px solid gray"></div>
                  </div>
                  <div class="scanresult" style="text-align:center;">
                    <label>Result:</label>
                    <div class="track--wrapper" style="display: none;">
                      <div class="track__item" id="picked-up">
                          <div class="track__thumb">
                              <i class="las la-briefcase"></i>
                          </div>
                          <div class="track__content">
                              <h5 class="track__title">@lang('Picked Up')</h5>
                          </div>
                      </div>
                      <div class="track__item" id="assort">
                          <div class="track__thumb">
                              <i class="lar la-building"></i>
                          </div>
                          <div class="track__content">
                              <h5 class="track__title">@lang('Logistics')</h5>
                          </div>
                      </div>
                      <div class="track__item" id="delivered">
                          <div class="track__thumb">
                              <i class="las la-truck-pickup"></i>
                          </div>
                          <div class="track__content">
                              <h5 class="track__title">@lang('Delivery')</h5>
                          </div>
                      </div>
                      <div class="track__item" id="completed">
                          <div class="track__thumb">
                              <i class="las la-check-circle"></i>
                          </div>
                          <div class="track__content">
                              <h5 class="track__title">@lang('Completed')</h5>
                          </div>
                      </div>
                    </div>
                    <div id="status-summary-container" style="margin-top: 20px;"></div>
                    <div id="my-iframe-container"></div>
                    <span id="result"></span>
                  </div>
                  <div class="modal fade" id="noShipmentModal" tabindex="-1" aria-labelledby="noShipmentModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="noShipmentModalLabel">Shipment Alert</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body modal-info">
                          <p>The shipment does not exist.</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn" data-bs-dismiss="modal" onclick="location.reload()" style="width:50%; background-color:gray; color:white;">CLOSE</button>
                        </div>
                      </div>
                    </div>
                  </div> 
                </section>
              </main>
            </div>
            </div>


      </div>
    </div>
  </div>

    <!-- MDB -->
    <script type="text/javascript" src="/js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
    <!--Bootstrap-->
    <script src="/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css" integrity="sha512-q+m8jZd2zaZcd1kByh2QYDJ8skcWkbKvR5U6n5RK6fzX3Z5nSPjKc0uV7o+qf3J0erwz1EdJ+r+2/DN9acEJBQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css" integrity="sha512-0//djsNFsFkTjxbZ++OHMQiC3qo3Wlgd8aJP/i0F9+Cfd2QOQHPhONtItYPwZcBjKq3kHICa8d1POmD9mC9Hg==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js" integrity="sha512-mMmTf/duwDgEyCjqVJ0rcWMW8uV7yJ0+LlD6KxCwt6UuV2ZaSE1+u5QeS5W8Kk7ayy+jX5oqE4ELJWc4M1wC4w==" crossorigin="anonymous"></script>
  </body>
</html>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://reeteshghimire.com.np/wp-content/uploads/2021/05/html5-qrcode.min_.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js" integrity="sha512-SdfTTHSsNYsKuyEKgI16zZGt4ZLcKu0aVYjC8q3PLVPMvFWIuEBQKDNQX9IfZzRbZEN1PH6Q2N35A8WcKdhdNw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script type="text/javascript">
    // after success to play camera Webcam Ajax paly to send data to Controller
    var hasScanned = false;
    var $j = jQuery.noConflict();
    function onScanSuccess(data) {
      if (hasScanned) return; // check flag
      hasScanned = true;
        $j.ajax({
            type: "POST",
            cache: false,
            url: "{{action('App\Http\Controllers\SuperQrScannerController@checkUser')}}",
            data: {"_token": "{{ csrf_token() }}", data: data},
            success: function (data) {
                // after success to get Data from controller if Shipment is available in the database
                // iframe for waybill info
                if (data.result == 1) {
                  var iframeContainer = document.getElementById('my-iframe-container');
                  // check if there is already an iframe in the container
                  if (iframeContainer.childElementCount > 0) {
                    iframeContainer.removeChild(iframeContainer.childNodes[0]);
                  }
                  var iframe = document.createElement('iframe');
                  iframe.srcdoc = '<html><head></head><body class="driver-waybill-info" style=""><div class="col-4" style="text-align:center; width:100%;"><p>Tracking Number:</p><h1 style="margin:0px;">' + data.tracking_number + '</h1></div><div style="text-align:center; width:100%;"></div></body></html>';
                  iframe.style.width = '100%';
                  iframe.style.height = '500px';
                  iframeContainer.appendChild(iframe);
                  $('.track--wrapper').show();
                  html5QrcodeScanner.clear();

                    // add event listener to button when iframe is loaded
                    iframe.onload = function() {
                    var button = iframe.contentDocument.getElementById("my-button");
                    var pickedUp = document.getElementById('picked-up');
                    var assort = document.getElementById('assort');
                    var delivered = document.getElementById('delivered');
                    var completed = document.getElementById('completed');

                    if (data.status === "PickedUp" || data.status === "Assort" || data.status === "Dispatched" ||  data.status === "Transferred" || data.status === "Arrived" || data.status === "Delivered") {
                        pickedUp.classList.add('done');
                    }
                    if (data.status === "Assort" ||  data.status === "Transferred" || data.status === "Arrived" || data.status === "Dispatched" || data.status === "Delivered") {
                        assort.classList.add('done');
                    }
                    if (data.status === "Dispatched" || data.status === "Delivered") {
                        delivered.classList.add('done');
                    }
                    if (data.status === "Delivered") {
                        completed.classList.add('done');
                    }

                    var statusContainer = document.getElementById("status-summary-container");
                    statusContainer.classList.add("tracking-status");

                    var relevantStatusCodes = ["Processing", "PickedUp", "Assort", "Transferred", "Arrived", "Dispatched", "Delivered"];
                    var displayStatusCodes = [];

                    // Determine which status codes to display based on the current status
                    switch (data.status) {
                      case "Processing":
                        displayStatusCodes = ["Processing"];
                        break;
                      case "PickedUp":
                        displayStatusCodes = ["Processing", "PickedUp"];
                        break;
                      case "Assort":
                        displayStatusCodes = ["Processing", "PickedUp", "Assort"];
                        break;
                      case "Transferred":
                        displayStatusCodes = ["Processing", "PickedUp", "Assort", "Transferred"];
                        break;
                      case "Arrived":
                        displayStatusCodes = ["Processing", "PickedUp", "Assort", "Transferred", "Arrived"];
                        break;
                      case "Dispatched":
                        if (data.isArrived === 1 && data.isTransferred === 1){
                          displayStatusCodes = ["Processing", "PickedUp", "Assort", "Transferred", "Arrived", "Dispatched"];
                        } else {
                          displayStatusCodes = ["Processing", "PickedUp", "Assort", "Dispatched"];
                        }
                        break;
                      case "Delivered":
                        if (data.isArrived === 1 && data.isTransferred === 1){
                          displayStatusCodes = ["Processing", "PickedUp", "Assort", "Transferred", "Arrived", "Dispatched", "Delivered"];
                        } else {
                          displayStatusCodes = ["Processing", "PickedUp", "Assort", "Dispatched", "Delivered"];
                        }
                        break;
                      default:
                        break;
                    }

                    // Reverse the order of the status codes to show the latest on top
                    displayStatusCodes.reverse();

                    // Loop through the relevant status codes and display the ones that should be displayed
                    for (var i = 0; i < relevantStatusCodes.length; i++) {
                      var statusCode = relevantStatusCodes[i];
                      if (displayStatusCodes.includes(statusCode)) {
                        // Create a new status item
                        var statusItem = document.createElement("div");
                        statusItem.classList.add("status-item");
                        if (statusCode === "Delivered") {
                          statusItem.classList.add("delivered");
                        } else {
                          statusItem.classList.add("in-transit");
                        }

                        // Create the status time element
                        var statusTime = document.createElement("div");
                        statusTime.classList.add("status-time");
                        if (statusCode === "Processing") {
                            statusTime.textContent = data.isProcessedTime;
                        } else if (statusCode === "PickedUp") {
                            statusTime.textContent = data.isPickUpTime;
                        } else if (statusCode === "Assort") {
                            statusTime.textContent = data.isAssortTime;
                        } else if (statusCode === "Transferred") {
                            statusTime.textContent = data.isTransferredTime;
                        } else if (statusCode === "Arrived") {
                            statusTime.textContent = data.isArrivedTime;
                        } else if (statusCode === "Dispatched") {
                            statusTime.textContent = data.isDispatchedTime;
                        } else if (statusCode === "Delivered") {
                            statusTime.textContent = data.isDeliveredTime;
                        }
                        statusItem.appendChild(statusTime);

                        // Create the status text element
                        var statusText = document.createElement("div");
                        statusText.classList.add("status-text");

                        // Create the status title element
                        var statusTitle = document.createElement("div");
                        statusTitle.classList.add("status-title");
                        if (statusCode === "Processing") {
                          statusTitle.textContent = "Order is Being Processed";
                        } else if (statusCode === "PickedUp") {
                          statusTitle.textContent = "Parcel has been Picked Up by Driver";
                        } else if (statusCode === "Assort") {
                          statusTitle.textContent = "Parcel is in Logistics";
                        } else if (statusCode === "Transferred") {
                          statusTitle.textContent = "Parcel is in Transit";
                        } else if (statusCode === "Arrived") {
                          statusTitle.textContent = "Parcel arrived in Logistics";
                        } else if (statusCode === "Dispatched") {
                          statusTitle.textContent = "Parcel is Out for Delivery";
                        } else if (statusCode === "Delivered") {
                          statusTitle.textContent = "Parcel has been Delivered";
                        }
                        statusText.appendChild(statusTitle);

                        // Create the status description element
                        var statusDesc = document.createElement("div");
                        statusDesc.classList.add("status-desc");
                        if (statusCode === "Delivered") {
                          statusDesc.textContent = "Parcel has been Delivered.";
                        } else if (statusCode === "Dispatched"){
                          statusDesc.textContent = "Parcel out for delivery.";
                        } else if (statusCode === "Arrived") {
                          statusDesc.textContent = "Parcel arrived in Logistics.";
                        } else if (statusCode === "Transferred") {
                          statusDesc.textContent = "Parcel is in Transit.";
                        } else if (statusCode === "Assort"){
                          statusDesc.textContent = "Parcel is in Logistics.";
                        } else if (statusCode === "PickedUp"){
                          statusDesc.textContent = "Parcel picked up.";
                        } else if (statusCode === "Processing"){
                          statusDesc.textContent = "Parcel is being Processed.";
                        } else {
                          statusDesc.textContent = "Your parcel is on its way.";
                        }
                        statusText.appendChild(statusDesc);

                        // Add the status text to the status item and the status item to the container
                        statusItem.appendChild(statusText);
                        statusContainer.insertBefore(statusItem, statusContainer.firstChild);
                      }
                    }
            };
            } else {
                var modal = new bootstrap.Modal(document.getElementById('noShipmentModal'), {});
                modal.show();
            }
        }
        });
    }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {fps: 10, qrbox: 250});
        html5QrcodeScanner.render(onScanSuccess);

  </script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    var $j = jQuery.noConflict();
    var hasSearched = false;
    $j('form').submit(function(e) {
      e.preventDefault();
      if (hasSearched) return; // check flag
      hasSearched = true;
      var formData = $(this).serialize();
      $j.ajax({
        url: $(this).attr('action'),
        type: 'POST',
        data: formData,
        success: function(response) {
            $('#message').text(response.message);
            if (response.shipment) {
                // after success to get Data from controller if Shipment is available in the database
                var iframeContainer = document.getElementById('my-iframe-container');
                // check if there is already an iframe in the container
                if (iframeContainer.childElementCount > 0) {
                    iframeContainer.removeChild(iframeContainer.childNodes[0]);
                }
                var iframe = document.createElement('iframe');
                iframe.srcdoc = '<html><head></head><body class="driver-waybill-info" style=""><div class="col-4" style="text-align:center; width:100%;"><p>Tracking Number:</p><h1 style="margin:0px;">' + response.shipment.tracking_number + '</h1></div><div style="text-align:center; width:100%;"></div></body></html>';
                iframe.style.width = '100%';
                iframe.style.height = '500px';
                iframeContainer.appendChild(iframe);
                $('.track--wrapper').show();
                html5QrcodeScanner.clear();

                // add event listener to button when iframe is loaded
                iframe.onload = function() {
                    var button = iframe.contentDocument.getElementById("my-button");
                    var pickedUp = document.getElementById('picked-up');
                    var assort = document.getElementById('assort');
                    var delivered = document.getElementById('delivered');
                    var completed = document.getElementById('completed');

                    if (response.shipment.status === "PickedUp" || response.shipment.status === "Assort" || response.shipment.status === "Dispatched" ||  response.shipment.status === "Transferred" || response.shipment.status === "Arrived" || response.shipment.status === "Delivered") {
                        pickedUp.classList.add('done');
                    }
                    if (response.shipment.status === "Assort" ||  response.shipment.status === "Transferred" || response.shipment.status === "Arrived" || response.shipment.status === "Dispatched" || response.shipment.status === "Delivered") {
                        assort.classList.add('done');
                    }
                    if (response.shipment.status === "Dispatched" || response.shipment.status === "Delivered") {
                        delivered.classList.add('done');
                    }
                    if (response.shipment.status === "Delivered") {
                        completed.classList.add('done');
                    }

                    var statusContainer = document.getElementById("status-summary-container");
                    statusContainer.classList.add("tracking-status");

                    var relevantStatusCodes = ["Processing", "PickedUp", "Assort", "Transferred", "Arrived", "Dispatched", "Delivered"];
                    var displayStatusCodes = [];

                    // Determine which status codes to display based on the current status
                    switch (response.shipment.status) {
                      case "Processing":
                        displayStatusCodes = ["Processing"];
                        break;
                      case "PickedUp":
                        displayStatusCodes = ["Processing", "PickedUp"];
                        break;
                      case "Assort":
                        displayStatusCodes = ["Processing", "PickedUp", "Assort"];
                        break;
                      case "Transferred":
                        displayStatusCodes = ["Processing", "PickedUp", "Assort", "Transferred"];
                        break;
                      case "Arrived":
                        displayStatusCodes = ["Processing", "PickedUp", "Assort", "Transferred", "Arrived"];
                        break;
                      case "Dispatched":
                        if (response.order_history.isArrived === 1 && response.order_history.isTransferred === 1){
                          displayStatusCodes = ["Processing", "PickedUp", "Assort", "Transferred", "Arrived", "Dispatched"];
                        } else {
                          displayStatusCodes = ["Processing", "PickedUp", "Assort", "Dispatched"];
                        }
                        break;
                      case "Delivered":
                        if (response.order_history.isArrived === 1 && response.order_history.isTransferred === 1){
                          displayStatusCodes = ["Processing", "PickedUp", "Assort", "Transferred", "Arrived", "Dispatched", "Delivered"];
                        } else {
                          displayStatusCodes = ["Processing", "PickedUp", "Assort", "Dispatched", "Delivered"];
                        }
                        break;
                      default:
                        break;
                    }

                    // Reverse the order of the status codes to show the latest on top
                    displayStatusCodes.reverse();

                    // Loop through the relevant status codes and display the ones that should be displayed
                    for (var i = 0; i < relevantStatusCodes.length; i++) {
                      var statusCode = relevantStatusCodes[i];
                      if (displayStatusCodes.includes(statusCode)) {
                        // Create a new status item
                        var statusItem = document.createElement("div");
                        statusItem.classList.add("status-item");
                        if (statusCode === "Delivered") {
                          statusItem.classList.add("delivered");
                        } else {
                          statusItem.classList.add("in-transit");
                        }

                        // Create the status time element
                        var statusTime = document.createElement("div");
                        statusTime.classList.add("status-time");
                        if (statusCode === "Processing") {
                            statusTime.textContent = response.order_history.isProcessedTime;
                        } else if (statusCode === "PickedUp") {
                            statusTime.textContent = response.order_history.isPickUpTime;
                        } else if (statusCode === "Assort") {
                            statusTime.textContent = response.order_history.isAssortTime;
                        } else if (statusCode === "Transferred") {
                            statusTime.textContent = response.order_history.isTransferredTime;
                        } else if (statusCode === "Arrived") {
                            statusTime.textContent = response.order_history.isArrivedTime;
                        } else if (statusCode === "Dispatched") {
                            statusTime.textContent = response.order_history.isDispatchedTime;
                        } else if (statusCode === "Delivered") {
                            statusTime.textContent = response.order_history.isDeliveredTime;
                        }
                        statusItem.appendChild(statusTime);

                        // Create the status text element
                        var statusText = document.createElement("div");
                        statusText.classList.add("status-text");

                        // Create the status title element
                        var statusTitle = document.createElement("div");
                        statusTitle.classList.add("status-title");
                        if (statusCode === "Processing") {
                          statusTitle.textContent = "Order is Being Processed";
                        } else if (statusCode === "PickedUp") {
                          statusTitle.textContent = "Parcel has been Picked Up by Driver";
                        } else if (statusCode === "Assort") {
                          statusTitle.textContent = "Parcel is in Logistics";
                        } else if (statusCode === "Transferred") {
                          statusTitle.textContent = "Parcel is in Transit";
                        } else if (statusCode === "Arrived") {
                          statusTitle.textContent = "Parcel arrived in Logistics";
                        } else if (statusCode === "Dispatched") {
                          statusTitle.textContent = "Parcel is Out for Delivery";
                        } else if (statusCode === "Delivered") {
                          statusTitle.textContent = "Parcel has been Delivered";
                        }
                        statusText.appendChild(statusTitle);

                        // Create the status description element
                        var statusDesc = document.createElement("div");
                        statusDesc.classList.add("status-desc");
                        if (statusCode === "Delivered") {
                          statusDesc.textContent = "Parcel has been Delivered.";
                        } else if (statusCode === "Dispatched"){
                          statusDesc.textContent = "Parcel out for delivery.";
                        } else if (statusCode === "Arrived") {
                          statusDesc.textContent = "Parcel arrived in Logistics.";
                        } else if (statusCode === "Transferred") {
                          statusDesc.textContent = "Parcel is in Transit.";
                        } else if (statusCode === "Assort"){
                          statusDesc.textContent = "Parcel is in Logistics.";
                        } else if (statusCode === "PickedUp"){
                          statusDesc.textContent = "Parcel picked up.";
                        } else if (statusCode === "Processing"){
                          statusDesc.textContent = "Parcel is being Processed.";
                        } else {
                          statusDesc.textContent = "Your parcel is on its way.";
                        }
                        statusText.appendChild(statusDesc);

                        // Add the status text to the status item and the status item to the container
                        statusItem.appendChild(statusText);
                        statusContainer.insertBefore(statusItem, statusContainer.firstChild);
                      }
                    }
            };
            } else {
            return confirm('There is no shipment with this qr code');
            }
        }
        });
    });
  </script>

  <script type="text/javascript">
      document.getElementById("resetButton").addEventListener("click", function() {
          history.replaceState({}, document.title, location.pathname);
          document.querySelector("form").submit();
          document.getElementById("id").value = "";
      });
  </script>
 </div>
 </div>
</div>
<hr/>

    <script type="text/javascript">
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
    </script>
    <!--Bootstrap-->
    <script src="/js/bootstrap.bundle.js"></script>

