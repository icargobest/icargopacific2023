@include('partials.navigation', ['waybill' => 'fw-bold'])


    <!--Waybill List-->
    <div class="container p-3">
      <div class="card">
      <div class="card-body overflow-x-scroll">
        <div class="d-grid gap-2 d-md-flex row p-3">
          <h4>Waybill List</h4>
          <div class="tex-wrap">
            <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
              Create Waybill
            </button>
            <!-- Modal -->
            <div class="modal top fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Waybill</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form>
                      <!-- 2 column grid layout with text inputs for the first and last names -->
                      <div class="row mb-4">
                        <div class="col">
                          <div class="form-outline">
                            <input type="text" id="form6Example1" class="form-control" />
                            <label class="form-label" for="form6Example1">First name</label>
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-outline">
                            <input type="text" id="form6Example2" class="form-control" />
                            <label class="form-label" for="form6Example2">Last name</label>
                          </div>
                        </div>
                      </div>

                      <!-- Email input -->
                      <div class="form-outline mb-4">
                        <input type="email" id="form6Example5" class="form-control" />
                        <label class="form-label" for="form6Example5">Email</label>
                      </div>
                    
                      <!-- Job -->
                      <div class="form-outline mb-4">
                        <input type="text" id="form6Example3" class="form-control" />
                        <label class="form-label" for="form6Example3">Street Address</label>
                      </div>

                      <!-- Department -->
                      <div class="form-outline mb-4">
                        <input type="text" id="form6Example3" class="form-control" />
                        <label class="form-label" for="form6Example3">Telephone</label>
                      </div>
                    
                      <!-- Position -->
                      <div class="form-outline mb-4">
                        <input type="text" id="form6Example4" class="form-control" />
                        <label class="form-label" for="form6Example4">Mobile Number</label>
                      </div>
                              
                      <!-- Number input -->
                      <!--
                      <div class="form-outline mb-4">
                        <input type="number" id="form6Example6" class="form-control" />
                        <label class="form-label" for="form6Example6">Phone</label>
                      </div>
                      -->
                    
                      <!-- Message input -->
                      <div class="form-outline mb-4">
                        <textarea class="form-control" id="form6Example7" rows="4"></textarea>
                        <label class="form-label" for="form6Example7">Additional information</label>
                      </div>

                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-block" data-mdb-dismiss="modal">
                      Next
                    </button>
                    <button type="submit" class="btn btn-danger btn-block mb-4" data-mdb-dismiss="modal">
                      Reset
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
              
        </div>

        <!-- waybill list table -->
        <table class="table align-middle mb-0 bg-white table-striped">
        <thead class="bg-light">
          <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Pickup</th>
            <th>Drop-off</th>
            <th>Parcel Item</th> 
            <th>Parcel Size & Weight</th>
            <th>Total Amount</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>
              <div class="d-flex align-items-center">
                <img src="https://mdbootstrap.com/img/new/avatars/1.jpg" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
              </div>
            </td>
            <td><p class="fw-normal mb-1">Zephania Park Davao City Philippine</p></td>
            <td><p class="fw-normal mb-1">Sample Drop-off</p></td>
            <td><p class="fw-normal mb-1">Sample Parcel Item</p></td>
            <td><p class="fw-normal mb-1">Sample Size & Weight</p></td>
            <td><p class="fw-normal mb-1">Sample Total Amount</p></td>
            <td><span class="badge badge-primary rounded-pill d-inline">Processing</span></td>
            <td>
              <button type="button" class="btn btn-link btn-sm btn-rounded">Print</button>
              <button type="button" class="btn btn-link btn-sm btn-rounded"><a href="/waybill/viewinformation">View</a></button>
            </td>
          </tr>
            <td>2</td>
            <td>
              <div class="d-flex align-items-center">
                <img src="https://mdbootstrap.com/img/new/avatars/2.jpg" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
              </div>
            </td>
            <td><p class="fw-normal mb-1">Sample Pickup</p></td>
            <td><p class="fw-normal mb-1">Sample Drop-off</p></td>
            <td><p class="fw-normal mb-1">Sample Parcel Item</p></td>
            <td><p class="fw-normal mb-1">Sample Size & Weight</p></td>
            <td><p class="fw-normal mb-1">Sample Total Amount</p></td>
            <td><span class="badge badge-primary rounded-pill d-inline">Processing</span></td>
            <td>
              <button type="button" class="btn btn-link btn-sm btn-rounded">Print</button>
              <button type="button" class="btn btn-link btn-sm btn-rounded"><a href="/waybill/viewinformation">View</a></button>
            </td>
          </tr>
          <tr>
            <td>3</td>
            <td>
              <div class="d-flex align-items-center">
                <img src="https://mdbootstrap.com/img/new/avatars/3.jpg" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
              </div>
            </td>
            <td><p class="fw-normal mb-1">Sample Pickup</p></td>
            <td><p class="fw-normal mb-1">Sample Drop-off</p></td>
            <td><p class="fw-normal mb-1">Sample Parcel Item</p></td>
            <td><p class="fw-normal mb-1">Sample Size & Weight</p></td>
            <td><p class="fw-normal mb-1">Sample Total Amount</p></td>
            <td><span class="badge badge-danger rounded-pill d-inline">Pending</span></td>
            <td>
              <button type="button" class="btn btn-link btn-sm btn-rounded">Print</button>
              <button type="button" class="btn btn-link btn-sm btn-rounded"><a href="/waybill/viewinformation">View</a></button>            
            </td>
          </tr>
          <tr>
            <td>4</td>
            <td>
              <div class="d-flex align-items-center">
                <img src="https://mdbootstrap.com/img/new/avatars/4.jpg" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
              </div>
            </td>
            <td><p class="fw-normal mb-1">Sample Pickup</p></td>
            <td><p class="fw-normal mb-1">Sample Drop-off</p></td>
            <td><p class="fw-normal mb-1">Sample Parcel Item</p></td>
            <td><p class="fw-normal mb-1">Sample Size & Weight</p></td>
            <td><p class="fw-normal mb-1">Sample Total Amount</p></td>
            <td><span class="badge badge-danger rounded-pill d-inline">Pending</span></td>
            <td>
              <button type="button" class="btn btn-link btn-sm btn-rounded">Print</button>
              <button type="button" class="btn btn-link btn-sm btn-rounded"><a href="/waybill/viewinformation">View</a></button>            
            </td>
          </tr>
          <tr>
            <td>5</td>
            <td>
              <div class="d-flex align-items-center">
                <img src="https://mdbootstrap.com/img/new/avatars/5.jpg" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
              </div>
            </td>
            <td><p class="fw-normal mb-1">Sample Pickup</p></td>
            <td><p class="fw-normal mb-1">Sample Drop-off</p></td>
            <td><p class="fw-normal mb-1">Sample Parcel Item</p></td>
            <td><p class="fw-normal mb-1">Sample Size & Weight</p></td>
            <td><p class="fw-normal mb-1">Sample Total Amount</p></td>
            <td><span class="badge badge-primary rounded-pill d-inline">Processing</span></td>
            <td>
              <button type="button" class="btn btn-link btn-sm btn-rounded">Print</button>
              <button type="button" class="btn btn-link btn-sm btn-rounded"><a href="/waybill/viewinformation">View</a></button>            
            </td>
          </tr>
        </tbody>
        </table>
      </div>
    </div>
    </div>
    <!-- End of Waybill List -->
    
    <!-- MDB -->
    <script type="text/javascript" src="/js/mdb.min.js"></script>

{{-- @include('partials.footer') --}}