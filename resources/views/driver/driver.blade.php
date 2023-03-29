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
                    <a class="btn btn-primary mt-3">Start</a>
                    <a class="btn btn-danger mt-3">Reset</a>
                  </div>
                  <div class="container" style="text-align:center;">
                    <div id = "reader" style="margin:auto;" width="230" height="230" style="border: 1px solid gray"></div>
                  </div>
                  <div class="scanresult">
                    <label>Result:</label>
                    <div id="my-iframe-container"></div>
                    <span id="result"></span>
                  </div>
                </section>
              </main>
            </div>
          </div>
        </div>
      </div>
    </div>
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://reeteshghimire.com.np/wp-content/uploads/2021/05/html5-qrcode.min_.js"></script>
  <script type="text/javascript">
    // after success to play camera Webcam Ajax paly to send data to Controller
    function onScanSuccess(data) {
        $.ajax({
            type: "POST",
            cache: false,
            url: "{{action('App\Http\Controllers\QrScannerController@checkUser')}}",
            data: {"_token": "{{ csrf_token() }}", data: data},
            success: function (data) {
                // after success to get Answer from controller if User Registered login user by scanner
                // iframe for user info
                if (data.result == 1) {
                    var iframe = document.createElement('iframe');
                    iframe.srcdoc = '<html><head></head><body><h1>' + data.name + '</h1></body></html>';
                    iframe.style.width = '100%';
                    iframe.style.height = '500px';
                    document.getElementById('my-iframe-container').appendChild(iframe);
                    html5QrcodeScanner.clear();
                } else {
                    return confirm('There is no user with this qr code');
                }
            }
        })
    }

    var html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", {fps: 10, qrbox: 250});
    html5QrcodeScanner.render(onScanSuccess);

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
