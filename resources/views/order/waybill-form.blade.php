<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <title>Customer | Order Form</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
@include('partials.header')
@include('layouts.app')
@include('partials.navigationUser', ['order' => 'nav-selected'])


<div class="waybillForm-container container p-3">

    <div class="reminder-wrapper row px-3">
        <div class="card col p-4 shadow-sm">
            <span class="infoTitle"><i class="bi bi-info-circle-fill"></i><span>NOTICE!</span></span><br>
            <h6>Complete the following Information to Proceed</h6>
            <ul class="mt-3 ">
                <li><i class="bi bi-1-circle-fill"></i><span>Sender Information</span></li>
                <li><i class="bi bi-2-circle-fill"></i><span>Receiver Information</span></li>
                <li><i class="bi bi-3-circle-fill"></i><span>Parcel Details</span></li>
                <li class="mandatory"><span class="required">*</span> Fields are mandatory.</li>
            </ul>
        </div>
    </div>

    <form class="userInputs d-flex px-3" method="POST" action="{{ route('addOrder') }}" enctype="multipart/form-data">

        {{-- SENDER FORM --}}
        @csrf
        <div class="senderForm-wrapper row p-0 shadow-sm">
            <header class="mb-3"><span>SENDER INFORMATION</span><i class="bi bi-1-circle-fill"></i></header>
            <div class="button-holder sameInfo d-flex justify-content-end">
                <button type="button" id="sameInfoBtn" class="btn btn-primary">
                    Same as my info
                </button>
            </div>
            <div class="senderForm p-4">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" class="form-control" />
                <input type="hidden" name="station_id" value="0" class="form-control" />

                {{-- NAME INPUT --}}
                <div class="nameInput mb-4">
                    <span>
                        <label class="form-label" for="nameSender">Full Name</label><span class="required">*</span>
                    </span>
                    <div class="form-outline">
                        <input type="text" id="nameSender" name="senderName" class="form-control" required />
                    </div>
                </div>

                <!-- Address input -->
                <div class="addressInput mb-4">
                    <span>
                        <label class="form-label" for="addressSender">Street Address</label><span
                            class="required">*</span>
                    </span>
                    <div class="form-outline">
                        <input type="text" id="addressSender" name="senderAddress" class="form-control" required />
                    </div>
                </div>

                <!-- Contact input -->
                <div class="row mb-4">
                    <div class="col">

                        {{-- MOBILE INPUT --}}
                        <div class="mobileInput">
                            <span>
                                <label class="form-label" for="mobileSender">Mobile Number</label><span
                                    class="required">*</span>
                            </span>
                            <div class="form-outline">
                                <input type="text" id="mobileSender" name="senderMobile" class="form-control"
                                    required />
                            </div>
                        </div>

                    </div>

                    <div class="col">

                        {{-- TELEPHONE INPUT --}}
                        <div class="telephoneInput">
                            <span>
                                <label class="form-label" for="telephoneSender">Telephone</label>
                            </span>
                            <div class="form-outline">
                                <input type="text" id="telephoneSender" name="senderTelephone"
                                    class="form-control" />
                            </div>
                        </div>

                    </div>
                </div>
                {{-- EMAIL INPUT --}}
                <div class="emailInput mb-4">
                    <span>
                        <label class="form-label" for="emailSender">Email Address</label> <span
                            class="required">*</span>
                    </span>
                    <div class="form-outline">
                        <input type="email" id="emailSender" name="senderEmail" class="form-control" required />
                    </div>
                </div>


                <!-- City Zip input -->
                <div class="row mb-4">

                    <div class="col">
                        {{-- MUNICIPALITY --}}
                        <div class="municipalityInput">
                            <span>
                                <label class="form-label" for="municipalitySender">Municipality/City</label> <span
                                    class="required">*</span>
                            </span>
                            <div class="form-outline">
                                <input type="text" id="municipalitySender" name="senderCity" class="form-control"
                                    required />
                            </div>
                        </div>

                    </div>

                    <div class="col">
                        {{-- POSTAL --}}
                        <div class="postalInput">
                            <span>
                                <label class="form-label" for="postalSender">Postal Code</label> <span
                                    class="required">*</span>
                            </span>
                            <div class="form-outline">
                                <input type="text" id="postalSender" name="senderZip" class="form-control"
                                    required />
                            </div>
                        </div>

                    </div>
                </div>

                <!--State input-->
                <div class="stateInput mb-4">
                    <span>
                        <label class="form-label" for="stateSender">State</label> <span class="required">*</span>
                    </span>
                    <div class="form-outline">
                        <input type="text" id="stateSender" name="senderState" class="form-control" required />
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
                    <span>
                        <label class="form-label" for="nameReceiver">Full Name</label><span class="required">*</span>
                    </span>
                    <div class="form-outline">
                        <input type="text" id="nameReceiver" name="receiverName" class="form-control" required />
                    </div>
                </div>

                <!-- Address input -->
                <div class="addressInput mb-4">
                    <span>
                        <label class="form-label" for="addressReceiver">Street Address</label><span
                            class="required">*</span>
                    </span>
                    <div class="form-outline">
                        <input type="text" id="addressReceiver" name="receiverAddress" class="form-control"
                            required />
                    </div>
                </div>

                <!-- Contact input -->
                <div class="row mb-4">
                    <div class="col">

                        {{-- MOBILE INPUT --}}
                        <div class="mobileInput">
                            <span>
                                <label class="form-label" for="mobileReceiver">Mobile Number</label><span
                                    class="required">*</span>
                            </span>
                            <div class="form-outline">
                                <input type="text" id="mobileReceiver" name="receiverMobile" class="form-control"
                                    required />
                            </div>
                        </div>

                    </div>

                    <div class="col">

                        {{-- TELEPHONE INPUT --}}
                        <div class="telephoneInput">
                            <span>
                                <label class="form-label" for="telephoneReceiver">Telephone</label>
                            </span>
                            <div class="form-outline">
                                <input type="text" id="telephoneReceiver" name="receiverTelephone"
                                    class="form-control" />
                            </div>
                        </div>

                    </div>
                </div>
                {{-- EMAIL INPUT --}}
                <div class="emailInput mb-4">
                    <span>
                        <label class="form-label" for="emailReceiver">Email Address</label><span
                            class="required">*</span>
                    </span>
                    <div class="form-outline">
                        <input type="email" id="emailReceiver" name="receiverEmail" class="form-control"
                            required />
                    </div>
                </div>


                <!-- City Zip input -->
                <div class="row mb-4">

                    <div class="col">
                        {{-- MUNICIPALITY --}}
                        <div class="municipalityInput">
                            <span>
                                <label class="form-label" for="cityReceiver">Municipality/City</label><span
                                    class="required">*</span>
                            </span>
                            <div class="form-outline">
                                <input type="text" id="cityReceiver" name="receiverCity" class="form-control"
                                    required />
                            </div>
                        </div>

                    </div>

                    <div class="col">
                        {{-- POSTAL --}}
                        <div class="postalInput">
                            <span>
                                <label class="form-label" for="postalReceiver">Postal Code</label><span
                                    class="required">*</span>
                            </span>
                            <div class="form-outline">
                                <input type="text" id="postalReceiver" name="receiverZip" class="form-control"
                                    required />
                            </div>
                        </div>

                    </div>
                </div>

                <!--State input-->
                <div class="stateInput mb-4">
                    <span>
                        <label class="form-label" for="stateReceiver">State</label><span class="required">*</span>
                    </span>
                    <div class="form-outline">
                        <input type="text" id="stateReceiver" name="receiverState" class="form-control"
                            required />
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
                            <span>
                                <label for="serviceParcel">Service</label><span class="required">*</span>
                            </span>
                            <div class="form-outline">
                                <select class="form-control" id="serviceParcel" name="service_type" required>
                                    <option value="Standard">Standard</option>
                                    <option value="Express">Express</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- !Dropdown Type menu-->
                    <div class="form-group col-4">
                        <div class="typeInput">
                            <span><label for="typeParcel">Type</label><span class="required">*</span>
                            </span>
                            <div class="form-outline">
                                <select class="form-control" id="typeParcel" name="order_type" required>
                                    <option value="Document">Document</option>
                                    <option value="Other">Other/s</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- !Dropdown Type menu-->
                    <div class="form-group col-4">
                        <div class="paymentInput">
                            <span><label for="paymentParcel">Mode of Payment</label><span class="required">*</span>
                            </span>
                            <div class="form-outline">
                                <select class="form-control" id="paymentParcel" name="mop" required>
                                    <option value="COD">Cash On
                                        Delivery(COD)</option>
                                    <option value="Gcash Payment">Gcash
                                        Payment</option>
                                    <option value="Credit/Debit Card">
                                        Credit/Debit Card</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Parcel details input -->
                <div class="row mb-5">
                    <div class="col">
                        <div class="weightInput">
                            <span>
                                <label class="form-label" for="weightParcel">Weight</label><span
                                    class="required">*</span>
                            </span>
                            <div class="form-outline">
                                <input type="number" id="weightParcel" name="weight" class="form-control"
                                    required />
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="lengthInput">
                            <span>
                                <label class="form-label" for="lengthParcel">Length</label><span
                                    class="required">*</span>
                            </span>
                            <div class="form-outline">
                                <input type="number" id="lengthParcel" name="length" class="form-control"
                                    required />
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="widthInput">
                            <span>
                                <label class="form-label" for="widthParcel">Width</label><span
                                    class="required">*</span>
                            </span>
                            <div class="form-outline">
                                <input type="number" id="widthParcel" name="width" class="form-control"
                                    required />
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="heightInput">
                            <span>
                                <label class="form-label" for="heightParcel">Height</label><span
                                    class="required">*</span>
                            </span>
                            <div class="form-outline">
                                <input type="number" id="heightParcel" name="height" class="form-control"
                                    required />
                            </div>
                        </div>
                    </div>

                    <!--Dropdown category menu-->
                    <div class="col">
                        <div class="categoryInput">
                            <span>
                                <label for="categoryParcel">Category</label><span class="required">*</span>
                            </span>
                            <div class="form-outline">
                                <select class="form-control" id="categoryParcel" name="category">
                                    <option value="Domestic">Domestic</option>
                                    <option value="International">International</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>

                <!--Bid input-->
                <div class="form-outline mb-5">
                    <div class="bidInput">
                        <span>
                            <label class="form-label" for="bidParcel">Maximum Bid</label><span
                                class="required">*</span>
                        </span>
                        <div class="form-outline">
                            <input type="number" id="bidParcel" name="amount" class="form-control" required />
                        </div>
                    </div>
                </div>

                <!--Image input-->
                <div class="imageInput w-50 mb-4">
                    <span>Image<span class="required">*</span></span>
                    <div class="form-outline mb-4">
                        <input type="file" name="photo" id="photo" />
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

<script>
    document.getElementById('sameInfoBtn').addEventListener('click', function() {
        // Get user information values from users table
        var userName = "{{ Auth::user()->name }}";
        var userEmail = "{{ Auth::user()->email }}";

        // Retrieve additional information from customers table using AJAX or fetch API
        fetch('/customer-info') // Replace with the appropriate route to retrieve customer information
            .then(response => response.json())
            .then(data => {
                var userAddress = data.street;
                var userMobile = data.contact_no;
                var userTelephone = data.tel;
                var userCity = data.city;
                var userZip = data.postal_code;
                var userState = data.state;

                // Populate sender information fields with user and customer information
                document.getElementById('nameSender').value = userName;
                document.getElementById('addressSender').value = userAddress;
                document.getElementById('mobileSender').value = userMobile;
                document.getElementById('telephoneSender').value = userTelephone;
                document.getElementById('emailSender').value = userEmail;
                document.getElementById('municipalitySender').value = userCity;
                document.getElementById('postalSender').value = userZip;
                document.getElementById('stateSender').value = userState;
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
</script>
