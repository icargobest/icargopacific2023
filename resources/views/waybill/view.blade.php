{{-- naka comment po yung mga variable pero wala akong inalis --}}

<button type="button" class="btn btn-dark btn-sm" data-mdb-toggle="modal" data-mdb-target="#showModal{{-- {{$ship->id}} --}}">
    View
</button>


<div class="modal top fade modal-lg m-auto" id="showModal{{-- {{$ship->id}} --}}" tabindex="-1" aria-labelledby="waybill-detail-modal" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <!-- title -->
          <h5 class="modal-title" id="waybill-detail-modal">WAYBILL DETAILS</h5>
          <!-- close button -->
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <!-- modal content -->
        <div class="modal-body">
          <div class="container">
            <div class="row">
                <!-- picture in waybill -->
                <div class="col-lg-5 col-md-5 col-sm-5"> 
                    <div class="child1 text-center">  
                        <img src="/img/box.jpg"
                        alt="login form" class="img-fluid w-100 h-100" style="border-radius: 0 1rem 1rem 0;" />   
                    </div>
                </div>
                <!-- table of details in waybill -->
                <div class="col-lg-7 col-md-7 col-sm-7">
                    <div class="child2 h-90">
                        <table class="table table-hover table-sm table-no-bottom-space" id="view-table">
                            <tbody>
                                <tr>
                                    <th>ID:</th>
                                    <td class="fw-bold" value="{{-- {{$ship->id}} --}}">26</td>
                                </tr>
                                <tr>
                                    <th>Pickup:</th>
                                    <td class="fw-bold" value="{{-- {{$ship->sender_name}},{{$ship->sender_address}} --}}">John Doe Binan City</td>
                                </tr>
                                <tr>
                                    <th>Drop off:</th>
                                    <td class="fw-bold" value="{{-- {{$ship->recipient_name}}, {{$ship->recipient_address}} --}}">Muntinlupa</td>
                                </tr>
                                <tr>
                                    <th>Parcel Size & Weight:</th>
                                    <td class="fw-bold" value="{{-- {{$ship->length}}x{{$ship->width}}x{{$ship->height}} | {{$ship->weight}}Kg --}}">17x30x41 | 97 kg</td>
                                </tr>
                                <tr>
                                    <th>Parcel Item</th>
                                    <td class="fw-bold">Tools</td>
                                </tr>
                                <tr>
                                    <th><strong>Charges:</strong></th>
                                    <td class="fw-bold"><strong>Php 68</strong></td>
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

                        {{-- @if(Auth::user()->type == 'company') --}}
                    <form method="POST" action="{{-- {{route('addBid')}} --}}">
                        {{-- @csrf --}}
                        <input type="hidden" name="company_id" value="{{-- {{Auth::user()->id}} --}}" />
                        <input type="hidden" name="company_name" value="{{-- {{Auth::user()->name}} --}}" />
                        <input type="hidden" name="shipment_id" value="{{-- {{$ship->id}} --}}" />
                        <div class="rounded mt-5">
                          <h5 class="d-flex"><strong>BID</strong></h5>
                          <div class=" d-flex align-items-center h-50">
                              <div class="form-outline align-items-center">
                                  <input type="email" id="form2Example17" class="form-control form-control-lg ms-2" />
                                  <label class="form-label ps-2" for="form2Example17">BID AMOUNT</label>
                              </div>
                                  <button class="btn btn-primary btn-lg ms-3 mx-4 px-0 text-center" id="bid-button" type="button">BID NOW</button>
                          </div>
                      </div>
                    </form>
                    </div>
              </div>
              </div>
            </div>
        </div>
    </div>
  </div>
  
</div>
@include('partials.footer')
