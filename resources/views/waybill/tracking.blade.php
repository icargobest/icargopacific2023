{{-- naka comment po yung mga variable pero wala akong inalis --}}

<button type="button" class="btn btn-dark btn-sm" data-mdb-toggle="modal" data-mdb-target="#trackModal {{-- {{$ship->id}} --}}">
  Tracking
</button>

<div class="modal fade" id="trackModal{{-- {{$ship->id}} --}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header border-bottom">
        <!-- title -->
        <h5 class="modal-title" id="exampleModalLabel">WAYBILL TRACKING</h5>
        <!-- close button -->
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body mb-4">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <div class="child1 ">
                <div class="parcel-pic">
                  <img src="/img/box.jpg"
                  alt="login form" class="img-fluid w-50 h-50 mb-2" style="border-radius: 0 1rem 1rem 0;" /> 
                </div>
              </div>
              <div>
                <table class="table table-sm table-hover table-transparent table-no-bottom-space" id="tracking-table">
                  <tbody>
                      <tr>
                          <th>ID:</th>
                          <td class="fw-bold" value="{{-- {{$ship->id}} --}}">26</td>
                      </tr>
                      <tr>
                          <th>Pickup:</th>
                          <td class="fw-bold" value="{{-- {{$ship->sender_name}} --}}, {{-- {{$ship->sender_address}} --}}">John Doe Binan City</td>
                      </tr>
                      <tr>
                          <th>Drop off:</th>
                          <td class="fw-bold" value="{{-- {{$ship->recipient_name}} --}}, {{-- {{$ship->recipient_address}} --}}">Muntinlupa</td>
                      </tr>
                      <tr>
                          <th>Parcel Size & Weight:</th>
                          <td class="fw-bold" value="{{-- {{$ship->length}}x{{$ship->width}}x{{$ship->height}} | {{$ship->weight}}Kg --}}">17x30x41 | 97 kg</td>
                      </tr>
                      <tr>
                          <th>Parcel Item</th>
                          <td class="fw-bold" value="" >Tools</td>
                      </tr>
                      <tr>
                          <th>Parcel Charges:</th>
                          <td class="fw-bold">Php 68</td>
                      </tr>
                      
                  </tbody>
                </table>
                    <!-- highlighted price -->
                    <div class="price-div rounded ms-0" >
                      <!-- highlighted price -->
                      <div class="ms-0 mx-4" >
                        <strong class="ms-3">Current Bid:</strong>
                        <span><strong>{{-- {{$ship->bid_amount}} --}}Php 68</strong></span>
                      </div>
                    </div> 
              </div>
              </div>
              <div class="col-md-6 col-sm-6">
                <div class="child2 h-100 border">
                  <div class="d-block border-bottom bg-primary">
                      <h6 class="ms-3 pt-2" id="tracking-status">STATUS</h6>
                  </div>
                  <div class="container mt-3">
                    {{-- naghahanap pa ng tamang code para sa line --}}
                    <div class="row text-center" >
                      <!-- order confirm -->
                      <div class="col-md-3">
                        <i class="fa fa-check-circle fa-2x" style="color:green"></i>
                        <p>Order Confirm</p>
                        </div>
                        <!-- picked by courier icon -->
                        <div class="col-md-3">
                          <i class="fa fa-user-circle fa-2x"></i>
                          <p>Pickup by Courier</p>
                      </div>

                      <!-- on the way -->
                      <div class="col-md-3">
                          <i class="fa fa-truck fa-2x"></i>
                          <p>On the way</p>
                      </div>
                      <!-- delivered -->
                      <div class="col-md-3">
                          <i class="fas fa-clipboard-check fa-2x"></i>
                          <p>Delivered</p>
                      </div> 
                                <div class="container align-item-center text-center mt-3">
                                  <div class="dropdownContainer mb-3">
                                        <select class="form-select bold-hover border-black capitalized b-shadow s-margin modified-select" aria-label="Default select example" style=" max-width: 100%;">
                                            <option value="1" hidden>PARCEL STATUS</option>
                                            <option value="1">Action</option>
                                            <option value="2">Action</option>
                                            <option value="3">Action</option>
                                        </select>
                                  </div>
                                  <div class="border mt-1 mb-0" id="tracking-commits-and-location">
                                      <label class="w-100 pt-2">Tracking Commits and Location</label>
                                  </div>
                                      <div class="input-group input-group-sm mb-5 mt-0">
                                          <input type="text" class="form-control w-100" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Please Enter your Comment">
                                      </div>
                                  <div class="mt-5 mb-4">
                                    <button class="btn btn-primary px-4">UPDATE</button>
                                  </div>
                              </div>
      
                          </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>