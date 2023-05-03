@include('layouts.app')
@include('partials.navigationCompany')
    <!--Forwarding List-->
    <div class="container p-3">
      <div class="card">
      <div class="card-body overflow-x-scroll">
        <div class="d-grid gap-2 d-md-flex row p-3">
          <h4>Forwarding List</h4>  
        </div>

        <!-- Forwading list table -->
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
              <button type="button" class="btn btn-link btn-sm btn-rounded">Forward</button>
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
              <button type="button" class="btn btn-link btn-sm btn-rounded">Forward</button>
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
              <button type="button" class="btn btn-link btn-sm btn-rounded">Forward</button>
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
              <button type="button" class="btn btn-link btn-sm btn-rounded">Forward</button>
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
              <button type="button" class="btn btn-link btn-sm btn-rounded">Forward</button>
            </td>
          </tr>
        </tbody>
        </table>
      </div>
    </div>
    </div>
    </div>

