<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('css/style_waybillForm.css') }}">

    <title>Customer | Waybill Form</title>
    <link rel="shortcut icon" href="{{ asset('ICARGOicon.ico') }}">

</head>

@include('layouts.app')
@include('partials.navigationUser')

<div class="waybillForm-container container">

    <div class="reminder-wrapper row px-3">
        <div class="card col p-4 shadow-sm">
            <span class="infoTitle"><i class="bi bi-info-circle-fill"></i><span>NOTICE!</span></span><br>
            <h6>Complete the following Information to Proceed</h6>
            <ul class="mt-3 ">
                <li><i class="bi bi-1-circle-fill"></i><span>Sender Information</span></li>
                <li><i class="bi bi-2-circle-fill"></i><span>Receiver Information</span></li>
                <li><i class="bi bi-3-circle-fill"></i><span>Parcel Details</span></li>
            </ul>
        </div>
    </div>

    <form class="userInputs d-flex px-3" method="POST" action="{{route('addOrder')}}" enctype="multipart/form-data">
      {{-- SENDER FORM --}}
     @csrf
      <div class="senderForm-wrapper row p-0 shadow-sm">
        <header class="mb-3"><span>SENDER INFORMATION</span><i class="bi bi-1-circle-fill"></i></header>

        <div class="senderForm p-4">
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}" class="form-control" />
            <input type="hidden" name="station_id" value="0" class="form-control" />

            {{-- NAME INPUT --}}
            <div class="nameInput mb-4">
              <span>
                <label class="form-label" for="form6Example1">Full Name</label><span class="required">*</span>
              </span>
               <div class="form-outline">
                 <input type="text" id="form6Example1" name="senderName" class="form-control" required />
               </div>
             </div>

           <!-- Address input -->
           <div class="addressInput mb-4">
             <span>
              <label class="form-label" for="form6Example5">Street Address</label><span class="required">*</span>
            </span>
             <div class="form-outline">
               <input type="text" id="form6Example5" name="senderAddress" class="form-control" required />
             </div>  
           </div>

           <!-- Contact input -->
           <div class="row mb-4">
             <div class="col">

               {{-- MOBILE INPUT --}}
               <div class="mobileInput">
                <span>
                  <label class="form-label" for="form6Example3">Mobile Number</label><span class="required">*</span>
                </span>
                 <div class="form-outline">
                   <input type="text" id="form6Example3" name="senderMobile" class="form-control" required />
                 </div>
               </div>

             </div>

             <div class="col">

               {{-- TELEPHONE INPUT --}}
               <div class="telephoneInput">
                <span>
                  <label class="form-label" for="form6Example3">Telephone</label>
                </span>
                 <div class="form-outline">
                   <input type="text" id="form6Example3" name="senderTelephone" class="form-control" />
                 </div>
               </div>

             </div>
           </div>
           {{-- EMAIL INPUT --}}
           <div class="emailInput mb-4">
            <span>
              <label class="form-label" for="form6Example5">Email Address</label> <span class="required">*</span>
            </span>
             <div class="form-outline">
               <input type="email" id="form6Example5" name="senderEmail" class="form-control" required />
             </div> 
           </div>


           <!-- City Zip input -->
           <div class="row mb-4">

             <div class="col">
               {{-- MUNICIPALITY --}}
               <div class="municipalityInput">
                <span>
                  <label class="form-label" for="form6Example3">Municipality/City</label> <span class="required">*</span>
                </span>
                 <div class="form-outline">
                   <input type="text" id="form6Example3" name="senderCity" class="form-control" required />
                 </div>
               </div>

             </div>

             <div class="col">
                 {{-- POSTAL --}}
                 <div class="postalInput">
                  <span>
                    <label class="form-label" for="form6Example3">Postal Code</label> <span class="required">*</span>
                  </span>
                   <div class="form-outline">
                     <input type="text" id="form6Example3" name="senderZip" class="form-control" required />
                   </div>
                 </div>

             </div>
           </div>

           <!--State input-->
           <div class="stateInput mb-4">
            <span>
              <label class="form-label" for="form6Example3">State</label> <span class="required">*</span>
            </span>
             <div class="form-outline">
               <input type="text" id="form6Example3" name="senderState" class="form-control" required />
             </div>
           </div>

           <div class="button-holder d-flex justify-content-end">
            <a href="#receiverForm">
              <button type="button" class="rcvrNextBtn btn btn-primary">
                NEXT
              </button>
            </a>
           </div>

       </div>

      </div>

      {{-- RECEIVER FORM --}}

      <div class="receiverForm-wrapper row p-0 shadow-sm" id="receiverForm">
        <header class="mb-3"><span>RECEIVER INFORMATION</span> <i class="bi bi-2-circle-fill"></i></header>

        <div class="senderForm p-4">

            {{-- NAME INPUT --}}
            <div class="nameInput mb-4">
               <span>Full Name <span class="required">*</span></span>
               <div class="form-outline">
                 <input type="text" id="form6Example1" name="receiverName" class="form-control" required />
                 {{-- <label class="form-label" for="form6Example1">Full Name</label> --}}
               </div>
             </div>

           <!-- Address input -->
           <div class="addressInput mb-4">
             <span>Street Address <span class="required">*</span></span>
             <div class="form-outline">
               <input type="text" id="form6Example5" name="receiverAddress" class="form-control" required />
               {{-- <label class="form-label" for="form6Example5">Street Address</label> --}}
             </div>
           </div>

           <!-- Contact input -->
           <div class="row mb-4">
             <div class="col">

               {{-- MOBILE INPUT --}}
               <div class="mobileInput">
                 <span>Mobile Number <span class="required">*</span></span>
                 <div class="form-outline">
                   <input type="text" id="form6Example3" name="receiverMobile" class="form-control" required />
                   {{-- <label class="form-label" for="form6Example3">Mobile Number</label> --}}
                 </div>
               </div>

             </div>

             <div class="col">

               {{-- TELEPHONE INPUT --}}
               <div class="telephoneInput">
                 <span>Telephone</span>
                 <div class="form-outline">
                   <input type="text" id="form6Example3" name="receiverTelephone" class="form-control" />
                   {{-- <label class="form-label" for="form6Example3">Telephone</label> --}}
                 </div>
               </div>

             </div>
           </div>
           {{-- EMAIL INPUT --}}
           <div class="emailInput mb-4">
             <span>Email Address <span class="required">*</span></span>
             <div class="form-outline">
               <input type="email" id="form6Example5" name="receiverEmail" class="form-control" required />
               {{-- <label class="form-label" for="form6Example5">Email Address</label> --}}
             </div>
           </div>


           <!-- City Zip input -->
           <div class="row mb-4">

             <div class="col">
               {{-- MUNICIPALITY --}}
               <div class="municipalityInput">
                 <span>Municipality/ City <span class="required">*</span></span>
                 <div class="form-outline">
                   <input type="text" id="form6Example3" name="receiverCity" class="form-control" required />
                   {{-- <label class="form-label" for="form6Example3">Municipality/City</label> --}}
                 </div>
               </div>

             </div>

             <div class="col">
                 {{-- POSTAL --}}
                 <div class="postalInput">
                   <span>Postal Code <span class="required">*</span></span>
                   <div class="form-outline">
                     <input type="text" id="form6Example3" name="receiverZip" class="form-control" required />
                     {{-- <label class="form-label" for="form6Example3">Postal Code</label> --}}
                   </div>
                 </div>

             </div>
           </div>

           <!--State input-->
           <div class="stateInput mb-4">
             <span>State <span class="required">*</span></span>
             <div class="form-outline">
               <input type="text" id="form6Example3" name="receiverState" class="form-control" required />
               {{-- <label class="form-label" for="form6Example3">State</label> --}}
             </div>
           </div>

           <div class="button-holder d-flex justify-content-end">
            <a href="#parcelForm">
              <button type="button" class="prclNextBtn btn btn-primary">
                NEXT
              </button>
            </a>
           </div>

       </div>

      </div>

      {{-- PARCEL DETAILS FORM --}}

      <div class="parcelForm-wrapper row p-0 shadow-sm mb-4" id="parcelForm">
        <header class="mb-3"><span>PARCEL DETAILS</span> <i class="bi bi-3-circle-fill"></i></header>

        <div class="senderForm p-4">

            <div class="row mb-5">

                <div class="form-group col-4">
                  <div class="serviceInput">
                    <span>Service <span class="required">*</span></span>
                    <div class="form-outline">
                      {{-- <label for="exampleFormControlSelect1">Service</label> --}}
                      <select class="form-control" id="exampleFormControlSelect1" name="service_type" required>
                          <option value="Standard">Standard</option>
                          <option value="Express">Express</option>
                      </select>
                    </div>
                  </div>
                </div>

                <!-- !Dropdown Type menu-->
                <div class="form-group col-4">
                    <div class="typeInput">
                      <span>Type<span class="required">*</span></span>
                      <div class="form-outline">
                        {{-- <label for="exampleFormControlSelect1">Type</label> --}}
                        <select class="form-control" id="exampleFormControlSelect1" name="order_type" required>
                            <option value="Document">Document</option>
                            <option value="Other">Other/s</option>
                        </select>
                        </div>
                    </div>
                </div>

                <!-- !Dropdown Type menu-->
                <div class="form-group col-4">
                    <div class="mopInput">
                      <span>Mode of Payment<span class="required">*</span></span>
                      <div class="form-outline">
                        <select class="form-control" id="exampleFormControlSelect1" name="mode_of_payment" required>
                            <option value="COD">Cash On Delivery(COD)</option>
                            <option value="Gcash Payment">Gcash Payment</option>
                            <option value="Credit/Debit Card">Credit/Debit Card</option>
                        </select>
                        </div>
                    </div>
                </div>
              </div>

            <!-- Parcel details input -->
            <div class="row mb-5">
              <div class="col">
                  <div class="weightInput">
                    <span>Weight<span class="required">*</span></span>
                    <div class="form-outline">
                      <input type="text" id="form6Example3" name="weight" class="form-control" required/>
                      {{-- <label class="form-label" for="form6Example3">Weight</label> --}}
                    </div>
                  </div>
              </div>
              <div class="col">
                  <div class="lengthInput">
                    <span>Length<span class="required">*</span></span>
                    <div class="form-outline">
                      <input type="text" id="form6Example3" name="length" class="form-control" required/>
                      {{-- <label class="form-label" for="form6Example3">Length</label> --}}
                    </div>
                  </div>
              </div>
              <div class="col">
                  <div class="widthInput">
                    <span>Width<span class="required">*</span></span>
                    <div class="form-outline">
                      <input type="text" id="form6Example3" name="width" class="form-control" required/>
                      {{-- <label class="form-label" for="form6Example3">Width</label> --}}
                    </div>
                  </div>
              </div>
              <div class="col">
                  <div class="heightInput">
                    <span>Height<span class="required">*</span></span>
                    <div class="form-outline">
                      <input type="text" id="form6Example3" name="height" class="form-control" required/>
                      {{-- <label class="form-label" for="form6Example3">Height</label> --}}
                    </div>
                  </div>
              </div>

              <!--Dropdown category menu-->
              <div class="col">
                <div class="categoryInput">
                  <span>Category<span class="required">*</span></span>
                  <div class="form-outline">
                    {{-- <label for="exampleFormControlSelect1">Category</label> --}}
                    <select class="form-control" id="exampleFormControlSelect1" name="category">
                        <option value="Other">Other/s</option>
                    </select>
                  </div>
                </div>
              </div>

            </div>

            <!--Bid input-->
            <div class="form-outline mb-5">
                <div class="bidInput">
                  <span>Maximum Bid <span class="required">*</span></span>
                  <div class="form-outline">
                    <input type="text" id="form6Example3" name="amount" class="form-control" required/>
                    {{-- <label class="form-label" for="form6Example3">Minimum Bid</label> --}}
                  </div>
                </div>
            </div>

            <!--Image input-->
            <div class="imageInput w-50">
              <span>Image<span class="required">*</span></span>
              <div class="form-outline mb-4">
                <input type="file" name="photo"  id="photo"/>
              </div>
            </div>

           <div class="button-holder d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">
                SUBMIT
            </button>
           </div>
       </div>

      </div>

    </form>



</div>

<script type="text/javascript">

// NEXT BUTTONS
const rcvrnextBtn = document.querySelector(".rcvrNextBtn");
const prclnextBtn = document.querySelector(".prclNextBtn");


// FORMS
const rcvrForm = document.querySelector(".receiverForm-wrapper");
const prclForm = document.querySelector(".parcelForm-wrapper");

// TRIGGER FUNCTIONS

rcvrnextBtn.addEventListener('click', () => {

rcvrForm.classList.add("displayItem")

});

prclnextBtn.addEventListener('click', () => {

prclForm.classList.add("displayItem")

});


</script>
