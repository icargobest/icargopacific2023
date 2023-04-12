@include('partials.navigation', ['driver' => 'fw-bold'])

  <div class="container center p-3">
      <div class="row">
        <div class="col-sm-12 col-12">
          <div class="card">
          <div class="text-center">
            <div class="card-header text-center p-3">
              <h2>Driver Tracking</h2>
            </div>
            <div class="card-body">
              <main class="wrapper">
                <section class="container qrcontent" id="qrcontent">
                  <div>
                    <p>Enter tracking ID to search for parcel:</p>

                    <input type="text" placeholder="Enter tracking ID">
                    <button type="button" class="btn btn-primary">Search</button>

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
                  <div class="p-3">
                    <!--<a class="btn btn-primary mt-3">Start</a> -->
                    <a class="btn btn-danger mt-3" id="resetButton">Reset</a>
                  </div>
                  <div class="container" style="text-align:center;">
                    <div id = "reader" style="margin:auto;" width="230" height="230" style="border: 1px solid gray"></div>
                  </div>
                  <div class="scanresult">
                    <label>Result:</label>
                    <div id="my-iframe-container"></div>
                    <span id="result"></span>
                  </div>
                  <!-- Pickup Modal -->
                  <div class="modal fade" id="pickupModal" tabindex="-1" aria-labelledby="pickupModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="pickupModalLabel">Shipment Picked Up</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <p>Shipment has been picked up.</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="location.reload()">OK</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Waiting for Dispatch Modal -->
                  <div class="modal fade" id="alreadyPickedModal" tabindex="-1" aria-labelledby="alreadyPickedModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="alreadyPickedModalLabel">Shipment Received by Dispatcher</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <p>Waiting for dispatcher to dispatch the shipment.</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="location.reload()">OK</button>
                        </div>
                      </div>
                    </div> 
                  </div> 
                  <!-- Success Delivery Modal -->
                  <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="successModalLabel">Shipment Success!</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <p>Shipment Delivered Succesfully.</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="location.reload()">OK</button>
                        </div>
                      </div>
                    </div>
                  </div>    
                  <!-- Delivered Modal -->
                  <div class="modal fade" id="deliveredModal" tabindex="-1" aria-labelledby="deliveredModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="deliveredModalLabel">Shipment Success</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <p>Shipment Delivered.</p>
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
    var pickedup = 0;
    function onScanSuccess(data) {
        $.ajax({
            type: "POST",
            cache: false,
            url: "{{action('App\Http\Controllers\DriverQrScannerController@checkUser')}}",
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
                  iframe.srcdoc = '<html><head></head><body><h1>' + data.name + '</h1><br><button id="my-button">Update Shipment Status</button></body></html>';
                  iframe.style.width = '100%';
                  iframe.style.height = '500px';
                  iframeContainer.appendChild(iframe);
                  html5QrcodeScanner.clear();

                    // add event listener to button when iframe is loaded
                    iframe.onload = function() {
                    var button = iframe.contentDocument.getElementById("my-button");
                    button.addEventListener("click", function() {
                      if (data.pickup === 0) {
                        data.pickup = 1;
                        var modal = new bootstrap.Modal(document.getElementById('pickupModal'), {});
                        modal.show();

                        // Update the database with the new pickup value
                        $.ajax({
                          type: "POST",
                          url: "{{ action('App\Http\Controllers\DriverQrScannerController@updatePickup') }}",
                          data: {"_token": "{{ csrf_token() }}", id: data.id, pickup: data.pickup},
                          success: function (response) {
                            console.log(response);
                          }
                        });
                      } else if (data.pickup === 1 && data.received === 1 && data.delivery === 1 && data.delivered === 0) {
                        data.delivered = 1;
                        var deliveredModal = new bootstrap.Modal(document.getElementById('deliveredModal'), {});
                        deliveredModal.show();

                        // Update the database with the new delivered value
                        $.ajax({
                          type: "POST",
                          url: "{{ action('App\Http\Controllers\DriverQrScannerController@updateDelivered') }}",
                          data: {"_token": "{{ csrf_token() }}", id: data.id, delivered: data.delivered},
                          success: function (response) {
                            console.log(response);
                          }
                        });
                      } else if (data.pickup === 1 && data.received === 1 && data.delivery === 1 && data.delivered === 1) {
                        data.delivered = 1;
                        var deliveredModal = new bootstrap.Modal(document.getElementById('successModal'), {});
                        deliveredModal.show();
                      } else {
                        var modal = new bootstrap.Modal(document.getElementById('alreadyPickedModal'), {});
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
</style>
{{-- @include('partials.footer') --}}
