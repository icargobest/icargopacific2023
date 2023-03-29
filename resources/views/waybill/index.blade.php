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

            <!--Sender Modal -->
            <div class="modal top fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Waybill</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="{{route('addShipment')}}">
                        <h1>SENDER INFO</h1>
                        @csrf
                      <!-- 2 column grid layout with text inputs for the first and last names -->
                      <div class="form-outline mb-4">
                        <input type="text" id="form6Example1" name="senderName" class="form-control" />
                        <label class="form-label" for="form6Example1">Full Name</label>
                      </div>

                      <!-- Address input -->
                      <div class="form-outline mb-4">
                        <input type="text" id="form6Example5" name="senderAddress" class="form-control" />
                        <label class="form-label" for="form6Example5">Street Address</label>
                      </div>

                      <!-- Contact input -->
                      <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" id="form6Example3" name="senderMobile" class="form-control" />
                                <label class="form-label" for="form6Example3">Mobile Number</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" id="form6Example3" name="senderTelephone" class="form-control" />
                                <label class="form-label" for="form6Example3">Telephone</label>
                            </div>
                        </div>
                      </div>

                      <!--Email input-->
                      <div class="form-outline mb-4">
                        <input type="email" id="form6Example5" name="senderEmail" class="form-control" />
                        <label class="form-label" for="form6Example5">Email Address</label>
                      </div>


                      <!-- City Zip input -->
                      <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" id="form6Example3" name="senderCity" class="form-control" />
                                <label class="form-label" for="form6Example3">Municipality/City</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <input type="text" id="form6Example3" name="senderZip" class="form-control" />
                                <label class="form-label" for="form6Example3">Postal Code</label>
                            </div>
                        </div>
                      </div>

                      <!--State input-->
                      <div class="form-outline mb-4">
                        <input type="text" id="form6Example3" name="senderState" class="form-control" />
                        <label class="form-label" for="form6Example3">State</label>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <a class="btn btn-secondary btn-block mb-4" data-mdb-dismiss="modal">
                        Back
                    </a>
                    <a class="btn btn-primary btn-block" data-mdb-toggle="modal" data-mdb-target="#exampleModal1" data-bs-dismiss="modal">
                      Next
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <!--Receiver Modal-->
            <div class="modal top fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Create Waybill</h5>
                      <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                          <h1>RECEIVER INFO</h1>
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        <div class="form-outline mb-4">
                          <input type="text" id="form6Example1" name="receiverName" class="form-control" />
                          <label class="form-label" for="form6Example1">Full Name</label>
                        </div>

                        <!-- Address input -->
                        <div class="form-outline mb-4">
                          <input type="text" id="form6Example5" name="receiverAddress" class="form-control" />
                          <label class="form-label" for="form6Example5">Street Address</label>
                        </div>

                        <!-- Contact input -->
                        <div class="row mb-4">
                          <div class="col">
                              <div class="form-outline">
                                  <input type="text" id="form6Example3" name="receiverMobile" class="form-control" />
                                  <label class="form-label" for="form6Example3">Mobile Number</label>
                              </div>
                          </div>
                          <div class="col">
                              <div class="form-outline">
                                  <input type="text" id="form6Example3" name="receiverTelephone" class="form-control" />
                                  <label class="form-label" for="form6Example3">Telephone</label>
                              </div>
                          </div>
                        </div>

                        <!--Email input-->
                        <div class="form-outline mb-4">
                          <input type="email" id="form6Example5" name="receiverEmail" class="form-control" />
                          <label class="form-label" for="form6Example5">Email Address</label>
                        </div>

                        <!-- City Zip input -->
                        <div class="row mb-4">
                          <div class="col">
                              <div class="form-outline">
                                  <input type="text" id="form6Example3" name="receiverCity" class="form-control" />
                                  <label class="form-label" for="form6Example3">Municipality/City</label>
                              </div>
                          </div>
                          <div class="col">
                              <div class="form-outline">
                                  <input type="text" id="form6Example3" name="receiverZip" class="form-control" />
                                  <label class="form-label" for="form6Example3">Postal Code</label>
                              </div>
                          </div>
                        </div>

                        <!--State input-->
                        <div class="form-outline mb-4">
                          <input type="text" id="form6Example3" name="receiverState" class="form-control" />
                          <label class="form-label" for="form6Example3">State</label>
                        </div>

                    </div>
                    <div class="modal-footer">
                      <a class="btn btn-secondary btn-block" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                        Previous
                      </a>
                      <a class="btn btn-primary btn-block" data-mdb-toggle="modal" data-mdb-target="#exampleModal2">
                        Next
                      </a>
                    </div>
                  </div>
                </div>
            </div>

            <!--Parcel Modal-->
            <div class="modal top fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Create Waybill</h5>
                      <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                          <h1>PARCEL INFO</h1>
                        <!-- ! Dropdown Service menu-->
                        <div class="form-outline mb-4">
                          <input type="text" id="form6Example1" name="sevice" class="form-control" />
                          <label class="form-label" for="form6Example1">Service</label>
                        </div>

                        <!-- !Dropdown Type menu-->
                        <div class="form-outline mb-4">
                          <input type="text" id="form6Example5" name="type" class="form-control" />
                          <label class="form-label" for="form6Example5">Type</label>
                        </div>

                        <!-- Parcel details input -->
                        <div class="row mb-4">
                          <div class="col">
                              <div class="form-outline">
                                  <input type="text" id="form6Example3" name="weight" class="form-control" />
                                  <label class="form-label" for="form6Example3">Weight</label>
                              </div>
                          </div>
                          <div class="col">
                              <div class="form-outline">
                                  <input type="text" id="form6Example3" name="length" class="form-control" />
                                  <label class="form-label" for="form6Example3">Length</label>
                              </div>
                          </div>
                          <div class="col">
                              <div class="form-outline">
                                  <input type="text" id="form6Example3" name="width" class="form-control" />
                                  <label class="form-label" for="form6Example3">Width</label>
                              </div>
                          </div>
                          <div class="col">
                              <div class="form-outline">
                                  <input type="text" id="form6Example3" name="height" class="form-control" />
                                  <label class="form-label" for="form6Example3">Height</label>
                              </div>
                          </div>
                          <!--Dropdown category menu-->
                          <div class="col">
                              <div class="form-outline">
                                  <input type="text" id="form6Example3" name="category" class="form-control" />
                                  <label class="form-label" for="form6Example3">Category</label>
                              </div>
                          </div>
                        </div>

                        <!--Image input-->
                        <div class="form-outline mb-4">
                          <input type="file" id="form6Example5" class="form-control" />
                        </div>

                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-secondary btn-block" data-mdb-toggle="modal" data-mdb-target="#exampleModal1">
                          Previous
                        </a>
                      <a class="btn btn-danger btn-block mb-4" data-mdb-dismiss="modal">
                        Reset
                      </a>
                      <button type="submit" class="btn btn-success btn-block mb-4">
                        Submit
                      </button>
                    </div>
                    </form>
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
                <th></th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($shipments as $ship)
                    <tr>
                        <td>{{$ship->id}}</td>
                        <td></td>
                        <td>{{$ship->sender_address}} , {{$ship->sender_city}} , {{$ship->sender_state}} , {{$ship->sender_zip}}</td>
                        <td>{{$ship->recipient_address}} , {{$ship->recipient_city}} , {{$ship->recipient_state}} , {{$ship->recipient_zip}}</td>
                        <td></td>
                        <td>{{$ship->length}}x{{$ship->width}}x{{$ship->height}} | {{$ship->weight}}Kg </td>
                        <td>{{$ship->total_price}}</td>
                        <td>{{$ship->status}}</td>
                        @if($ship->status == 'pending')
                            <td><a href="{{route('viewShipment', $ship->id)}}" class="btn btn-dark btn-sm"> View</a></td>
                        @elseif($ship->status == 'processing')
                            <td><a href="" class="btn btn-dark btn-sm">Tracking</a></td>
                        @endif
                        <td><a href="{{route('generate',$ship->id)}}" class="btn btn-dark btn-sm">Invoice</a></td>
                        <td><a href="{{route('print',$ship->id)}}" class="btn btn-dark btn-sm">Print</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </div>
    </div>
    <!-- End of Waybill List -->

    <!--View Modal-->
    <div class="modal top fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Waybill Details</h5>
              <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <fieldset disabled>
                <input type="text" name="id" value="{{$ship->id}}">
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="form-outline mb-4">
                  <input type="text" id="form6Example1" name="senderName" class="form-control" value="{{$ship->sender_name}}"/>
                  <label class="form-label" for="form6Example1">Pick Up</label>
                </div>

                <!-- Address input -->
                <div class="form-outline mb-4">
                  <input type="text" id="form6Example5" name="senderAddress" class="form-control" />
                  <label class="form-label" for="form6Example5">Street Address</label>
                </div>

                <!-- Contact input -->
                <div class="row mb-4">
                  <div class="col">
                      <div class="form-outline">
                          <input type="text" id="form6Example3" name="senderMobile" class="form-control" />
                          <label class="form-label" for="form6Example3">Mobile Number</label>
                      </div>
                  </div>
                  <div class="col">
                      <div class="form-outline">
                          <input type="text" id="form6Example3" name="senderTelephone" class="form-control" />
                          <label class="form-label" for="form6Example3">Telephone</label>
                      </div>
                  </div>
                </div>

                <!--Email input-->
                <div class="form-outline mb-4">
                  <input type="email" id="form6Example5" name="senderEmail" class="form-control" />
                  <label class="form-label" for="form6Example5">Email Address</label>
                </div>


                <!-- City Zip input -->
                <div class="row mb-4">
                  <div class="col">
                      <div class="form-outline">
                          <input type="text" id="form6Example3" name="senderCity" class="form-control" />
                          <label class="form-label" for="form6Example3">Municipality/City</label>
                      </div>
                  </div>
                  <div class="col">
                      <div class="form-outline">
                          <input type="text" id="form6Example3" name="senderZip" class="form-control" />
                          <label class="form-label" for="form6Example3">Postal Code</label>
                      </div>
                  </div>
                </div>

                <!--State input-->
                <div class="form-outline mb-4">
                  <input type="text" id="form6Example3" name="senderState" class="form-control" />
                  <label class="form-label" for="form6Example3">State</label>
                </div>
            </fieldset>
            </div>
            <div class="modal-footer">
              <a class="btn btn-primary btn-block" data-mdb-toggle="modal" data-mdb-target="#exampleModal1" data-bs-dismiss="modal">
                Next
              </a>
              <a class="btn btn-secondary btn-block mb-4" data-mdb-dismiss="modal">
                  Back
              </a>
            </div>
          </div>
        </div>
      </div>


      <!-- MDB -->

      <script type="text/javascript" src="/js/mdb.min.js"></script>

{{-- @include('partials.footer') --}}
