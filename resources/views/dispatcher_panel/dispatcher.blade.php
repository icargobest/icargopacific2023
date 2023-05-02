@include('partials.navigation', ['driver' => 'fw-bold'])
@extends('layouts.status')

  <div class="container center p-3">
      <div class="row">
        <div class="col-sm-12 col-12">
          
          
            <div>
              <h2  class="fw-bold">DISPATCHER</h2>
            </div>

            <div class="container p-5 shadow" style=" background-color:white;">
            <div class="text-center">
              <main class="wrapper">
                <section class="container qrcontent" id="qrcontent">
                  <div>
                    <label>Enter Tracking ID to Search Parcel:</label>
                    <div class="row d-flex justify-content-center">
                    <input type="text" placeholder="Enter tracking ID" class="col-md-7 col-lg-3">
                    </div>
                    <div class="row d-flex justify-content-center">
                    <button type="button" class="btn btn-primary mt-3 col-md-7 col-lg-3" style="background-color:#1D4586; letter-spacing:1px; padding:5px;">Search</button>
                    </div>

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
                  <div class="col-12 d-flex justify-content-center mb-4">
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
                  <!-- Received Modal -->
                  <div class="modal fade" id="receivedmodal" tabindex="-1" aria-labelledby="receivedModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="receivedModalLabel">Shipment Received</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <p>Shipment has been received.</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="location.reload()">OK</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Out for Delivery Modal -->
                  <div class="modal fade" id="outfordeliveryModal" tabindex="-1" aria-labelledby="outfordeliveryModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="outfordeliveryModalLabel">Shipment Permission</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <p>Shipment Out for delivery.</p>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="location.reload()">OK</button>
                        </div>
                      </div>
                    </div> 
                  </div>   
                  <!-- Successful Delivery Modal -->
                  <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="successModalLabel">Shipment Success</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <p>Shipment has been Delivered.</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="location.reload()">OK</button>
                        </div>
                      </div>
                    </div>
                  </div> 
                  <!-- Not yet picked up Modal -->
                  <div class="modal fade" id="notpickupModal" tabindex="-1" aria-labelledby="notpickupModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="notpickupModalLabel">Shipment Status</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <p>Shipment has not been Picked Up yet.</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="location.reload()">OK</button>
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

<form method="POST" action="{{ url('/generate-code') }}">
    @csrf
    <div>
        <label for="data">Enter data:</label>
        <input type="text" name="data" id="data" required>
    </div>
    <div>
        <button type="submit">Generate code</button>
    </div>
</form>




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
    function onScanSuccess(data) {
      if (hasScanned) return; // check flag
      hasScanned = true;
        $.ajax({
            type: "POST",
            cache: false,
            url: "{{action('App\Http\Controllers\DispatcherQrScannerController@checkUser')}}",
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
                  iframe.srcdoc = '<html><head></head><body><h1>' + data.tracking_number + '</h1><br><button id="my-button">Update Shipment Status</button></body></html>';
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

                    if (data.status === "PickedUp" || data.status === "Assort" || data.status === "Dispatched" || data.status === "Delivered") {
                        pickedUp.classList.add('done');
                    }
                    if (data.status === "Assort" || data.status === "Dispatched" || data.status === "Delivered") {
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

                    var relevantStatusCodes = ["Processing", "PickedUp", "Assort", "Dispatched", "Delivered"];
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
                      case "Dispatched":
                        displayStatusCodes = ["Processing", "PickedUp", "Assort", "Dispatched"];
                        break;
                      case "Delivered":
                        displayStatusCodes = ["Processing", "PickedUp", "Assort", "Dispatched", "Delivered"];
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
                        statusTime.textContent = new Date().toLocaleString();
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

                    button.addEventListener("click", function() {
                      if (data.status === 'PickedUp') {
                        data.status = 'Assort';
                        var modal = new bootstrap.Modal(document.getElementById('receivedmodal'), {});
                        modal.show();

                        // Update the database with the new received value
                        $.ajax({
                          type: "POST",
                          url: "{{ action('App\Http\Controllers\DispatcherQrScannerController@updateReceived') }}",
                          data: {"_token": "{{ csrf_token() }}", id: data.id, status: data.status},
                          success: function (response) {
                            console.log(response);
                          }
                        });
                      } else if (data.status === 'Assort') {
                        data.status = 'Dispatched';
                        var deliveryModal = new bootstrap.Modal(document.getElementById('outfordeliveryModal'), {});
                        deliveryModal.show();

                        // Update the database with the new out for delivery value
                        $.ajax({
                          type: "POST",
                          url: "{{ action('App\Http\Controllers\DispatcherQrScannerController@updateOutfordelivery') }}",
                          data: {"_token": "{{ csrf_token() }}", id: data.id, status: data.status},
                          success: function (response) {
                            console.log(response);
                          }
                        });
                      } else if (data.status === 'Delivered') {
                        var deliveredModal = new bootstrap.Modal(document.getElementById('successModal'), {});
                        deliveredModal.show();
                      } else {
                        var modal = new bootstrap.Modal(document.getElementById('notpickupModal'), {});
                        modal.show();
                      }
                    });
                  };

                } else {
                    return confirm('There is no shipment with this qr code');
                }
            }
        })
      }

    var html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", {fps: 10, qrbox: 250});
    html5QrcodeScanner.render(onScanSuccess);

  </script>
  <script type="text/javascript">
    // Add event listener to Reset button
    document.getElementById("resetButton").addEventListener("click", function() {
        // Reload the current page
        location.reload();
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
<style>
  .result{
    background-color: green;
    color:#fff;
    padding:20px;
  }
  .row{
    display:flex;
  }
  #reader {
    background: black;
    width:300px;
  }
  button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 6px;
}
a#reader__dashboard_section_swaplink {
  background-color: blue; /* Green */
  border: none;
  color: white;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 6px;
}
span a{
  display:none
}

#reader__camera_selection{
  background: blueviolet;
  color: aliceblue;
}
#reader__dashboard_section_csr span{
  color:red
}
.tracking-status {
  display: flex;
  flex-direction: column;
}

.status-item {
  display: flex;
  flex-direction: row;
  align-items: flex-start;
  margin-bottom: 20px;
}

.status-time {
  width: 120px;
  font-size: 14px;
  font-weight: bold;
  margin-right: 10px;
  text-align: right;
}

.status-text {
  display: flex;
  flex-direction: column;
}

.status-title {
  font-size: 16px;
  font-weight: bold;
  margin-bottom: 5px;
}

.status-desc {
  font-size: 14px;
  line-height: 1.2;
}

.status-desc a {
  color: #007bff;
  text-decoration: none;
}

.status-item.delivered .status-title {
  color: #28a745;
}

.status-item.in-transit .status-title {
  color: #000000;
}

.status-item .status-title:before {
  content: '';
  display: inline-block;
  width: 10px;
  height: 10px;
  border-radius: 50%;
  margin-right: 10px;
}

.status-item.delivered .status-title:before {
  background-color: #28a745;
}

.status-item.in-transit .status-title:before {
  background-color: #000000;
}

.status-item:not(:first-child) .status-time {
  opacity: 0.5;
}
</style>
{{-- @include('partials.footer') --}}
