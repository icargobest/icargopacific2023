{{-- naka comment po yung mga variable pero wala akong inalis --}}

<button
    type="button"
    class="btn created-button mx-auto"
    style="
        background-color: white;
        border-color: #214d94;
        color: black !important;
    "
    data-mdb-toggle="modal"
    data-mdb-target="#trackModal {{-- {{$ship->id}} --}}"
>
    Tracking
</button>

<div
    class="modal fade"
    id="trackModal{{-- {{$ship->id}} --}}"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
    data-mdb-backdrop="static"
    data-mdb-keyboard="true"
>
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div
                class="modal-header border-bottom"
                style="background-color: white !important"
            >
                <!-- title -->
                <h4
                    class="modal-title"
                    id="exampleModalLabel"
                    style="color: black !important"
                >
                    <strong> WAYBILL TRACKING </strong>
                </h4>
                <!-- close button -->
                <button
                    type="button"
                    class="btn-close"
                    data-mdb-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>

            <div class="modal-body mb-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="child1 col-md-3 col-sm-3 w-100">
                                <div class="parcel-pic">
                                    <img
                                        src="/img/box.jpg"
                                        alt="login form"
                                        class="img-fluid rounded mx-auto d-block mb-2"
                                        style="
                                            border-radius: 0 1rem 1rem 0;
                                            margin-left: 50%;
                                        "
                                    />
                                </div>
                            </div>
                            <div class="child2 col-md-9 col-sm-9 me-0 w-100">
                                <table
                                    class="table table-sm table-hover table-no-bottom-space table-striped table-borderless hover"
                                    id="tracking-table"
                                >
                                    <tbody>
                                        <tr>
                                            <th><strong>SENDER</strong></th>
                                        </tr>
                                        <tr>
                                            <th>NAME:</th>
                                            <td class="fw-bold" value="">
                                                Doner Barton
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>ADDRESS:</th>
                                            <td class="fw-bold" value="">
                                                Binan City
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="contact">
                                                CONTACT NUMBER:
                                            </th>
                                            <td
                                                class="contact fw-bold"
                                                value=""
                                            >
                                                09995686210
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><strong>RECIEVER</strong></th>
                                        </tr>
                                        <tr>
                                            <th>NAME:</th>
                                            <td class="fw-bold" value="">
                                                James Watson
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>ADDRESS:</th>
                                            <td class="fw-bold" value="">
                                                Muntinlupa
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="contact">
                                                CONTACT NUMBER:
                                            </th>
                                            <td class="contact fw-bold">
                                                09586545201
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <strong
                                                    >PARCEL INFORMATION</strong
                                                >
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>ID:</th>
                                            <td class="fw-bold" value="">26</td>
                                        </tr>
                                        <tr>
                                            <th>PARCEL SIZE & WEIGHT:</th>
                                            <td class="fw-bold" value="">
                                                17X30X41 | 97 KG
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>PARCEL ITEM:</th>
                                            <td class="fw-bold">Tools</td>
                                        </tr>
                                        <tr>
                                            <th>PARCEL CHARGES:</th>
                                            <td class="fw-bold">Php 68</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 shadow px-0">
                            <div class="child2 h-100 border">
                                <div
                                    class="d-block border-bottom bg-primary"
                                    style="background-color: #0c2f68 !important"
                                >
                                    <h6
                                        class="ms-3 pt-2 text-left"
                                        id="tracking-status"
                                    >
                                        STATUS
                                    </h6>
                                </div>
                                <div class="container mt-3">
                                    {{-- naghahanap pa ng tamang code para sa
                                    line --}}
                                    <div class="row text-center pb-5">
                                        <!-- order confirm -->
                                        <div class="col-md-3">
                                            <i
                                                class="fa fa-check-circle fa-2x"
                                                style="color: green"
                                            ></i>
                                            <p>Order Confirm</p>
                                        </div>
                                        <!-- picked by courier icon -->
                                        <div class="col-md-3">
                                            <i
                                                class="fa fa-user-circle fa-2x"
                                            ></i>
                                            <p>Pickup by Courier</p>
                                        </div>

                                        <!-- on the way -->
                                        <div class="col-md-3">
                                            <i class="fa fa-truck fa-2x"></i>
                                            <p>On the way</p>
                                        </div>
                                        <!-- delivered -->
                                        <div class="col-md-3">
                                            <i
                                                class="fas fa-clipboard-check fa-2x"
                                            ></i>
                                            <p>Delivered</p>
                                        </div>
                                    </div>
                                    <div
                                        class="container align-item-center text-center mt-5"
                                    >
                                        <div
                                            class="dropdownContainer mb-3 mt-5"
                                        >
                                            <select
                                                class="form-select bold-hover border-black capitalized b-shadow s-margin modified-select"
                                                aria-label="Default select example"
                                                style="max-width: 100%"
                                            >
                                                <option value="1" hidden>
                                                    PARCEL STATUS
                                                </option>
                                                <option value="1">
                                                    Action
                                                </option>
                                                <option value="2">
                                                    Action
                                                </option>
                                                <option value="3">
                                                    Action
                                                </option>
                                            </select>
                                        </div>
                                        <div
                                            class="border mt-1 mb-0"
                                            id="tracking-commits-and-location"
                                        >
                                            <label class="w-100 pt-2"
                                                >Tracking Commits and
                                                Location</label
                                            >
                                        </div>
                                        <div
                                            class="input-group input-group-sm mb-5 mt-0"
                                        >
                                            <input
                                                type="text"
                                                class="form-control w-100"
                                                aria-label="Sizing example input"
                                                aria-describedby="inputGroup-sizing-sm"
                                                placeholder="Please Enter your Comment"
                                            />
                                        </div>
                                        <div class="mt-5 mb-4">
                                            <button
                                                class="btn btn-primary px-4"
                                            >
                                                UPDATE
                                            </button>
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

<style>
    .child2 td {
        text-align: left !important;
    }
    .child2 th {
        text-align: left !important;
    }

    td.contact,
    th.contact {
        border-bottom: 1px solid black !important;
    }

    #tracking-status {
        text-align: left !important;
    }
</style>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script type="text/javascript">
    let trackingTable = new DataTable("#tracking-table");
</script>
