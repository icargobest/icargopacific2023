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
                <div class="scanvideo">
                  <video id="video" width="230" height="230" style="border: 1px solid gray"></video>
                </div>
                <div class="scanresult">
                  <label>Result:</label>
                  <span id="result"></span>
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
</body>
</html>
{{-- @include('partials.footer') --}}
