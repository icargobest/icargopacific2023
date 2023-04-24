@include('partials.navigation', ['waybill' => 'fw-bold'])
  

    <!-- View -->
    <div class="pt-2 d-flex justify-content-center">
      <div class="card text-center" style="width: 300px;">
          <div class="card-header h5 text-white bg-primary">Waybill Information</div>
          <div class="card-body">
              <p class="card-text">
                  <!-- Enter your email address and we'll send you an email with instructions to reset your password. -->
              </p>
              <div>ID</div>
              <div>Pickup</div>
              <div>Drop-off</div>
              <div>Parcel Size & Weight</div>
              <div>Parcel Item</div>
              <div>Freight Charges</div>
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary m-3" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
              Close
              </button>
    
              
          </div>
      </div>
  </div>


    <!-- MDB -->
    <script type="text/javascript" src="/js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
    <!--Bootstrap-->
    <script src="/js/bootstrap.bundle.js"></script>


</body>
</html>
{{-- @include('partials.footer') --}}
    