@include('partials.admin-nav')

<head>
    <link rel="stylesheet" href="{{ asset('css/employee.css') }}">

    <link rel="stylesheet" href="/css/waybill-list.css" />
</head>



<div class="container py-5">
    <div class="main-wrapper border border-2" style=" max-width: 100%;">

        <div class="employee-header-container">
            <h3 class="">EMPLOYEE LIST</h3>
        </div>

        <section class="search-filter-container">

            <div class="top-container1" style="max-width: 800px;">
                <h5 class="fw-normal mb-2 d-inline"> SEARCH:</h5>
                <div class="input-group rounded">
                    <input type="search" class="form-control rounded" placeholder="Search Employee" aria-label="Search" aria-describedby="search-addon" />
                    <span class="input-group-text border-0" id="search-addon">
                      <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>

            <div class="top-container2">
                <h5 class="fw-normal mb-2 d-inline"> FILTERS:</h5>
                <div class="dropdown-container">
                    <div class="employee dropdown">
                        <button class="btn btn-primary dropdown-toggle d-flex align-items-center" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"  style="width: 250px;">
                                <span>Title</span>
                            <span class="ms-auto"><i class="bi bi-caret-down-fill"></i></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                    <div class="employee dropdown">
                        <button class="btn btn-primary dropdown-toggle d-flex align-items-center" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                             <span>Status</span>
                        <span class="ms-auto"><i class="bi bi-caret-down-fill"></i></span>

                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                    <div class="employee dropdown">
                        <button class="btn btn-primary dropdown-toggle d-flex align-items-center" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <span>Position</span>
                        <span class="ms-auto"><i class="bi bi-caret-down-fill"></i></span>

                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>
                
            </div>

        </section>

        <div class="addemployee" >
            <button type="button" class="btn btn-primary mb-1" style="" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Employee</button>
        </div>


        <section class="mb-5 px-4 h-90" style="overflow-x:auto">
            <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                <tr class="header-tr">
                    <th>ID</th>
                    <th>NAME</th>
                    <th>TITLE</th>
                    <th>STATUS</th>
                    <th>POSITION</th>

                    <th class="" style="max-width:!20px"> </th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>1</td>
                    <td>AERON CHRIST G TALARO</td>
                    <td>FRONT END DEVELOPER</td>
                    <td>ACTIVE</td>
                    <td>IT INTERN</td>

                    <td class="tdbutton" style="max-width:120px"><button class="btn created-button mx-auto" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button></td>
                </tr>

                <tr>
                    <td>1</td>
                    <td>AERON CHRIST G TALARO</td>
                    <td>FRONT END DEVELOPER</td>
                    <td>ACTIVE</td>
                    <td>IT INTERN</td>

                    <td class="tdbutton" style="max-width:120px"><button class="btn created-button mx-auto" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button></td>
                </tr>

                <tr>
                    <td>1</td>
                    <td>AERON CHRIST G TALARO</td>
                    <td>FRONT END DEVELOPER</td>
                    <td>ACTIVE</td>
                    <td>IT INTERN</td>

                    <td class="tdbutton" style="max-width:120px"><button class="btn created-button mx-auto" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button></td>
                </tr>
                

            </tbody>
            </table>
        </section>



        
    </div>



</div>



{{-- Modals --}}


<div class="modal top fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
          <button type="button" class="btn-close" id="closeModalButton" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-divider"></div>

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
              <label class="form-label" for="form6Example3">Job</label>
            </div>

            <!-- Department -->
            <div class="form-outline mb-4">
              <input type="text" id="form6Example3" class="form-control" />
              <label class="form-label" for="form6Example3">Department</label>
            </div>
          
            <!-- Position -->
            <div class="form-outline mb-4">
              <input type="text" id="form6Example4" class="form-control" />
              <label class="form-label" for="form6Example4">Position</label>
            </div>
                    
          
            <!-- Message input -->
            <div class="form-outline mb-4">
              <textarea class="form-control" id="form6Example7" rows="4"></textarea>
              <label class="form-label" for="form6Example7">Additional information</label>
            </div>


            <div class="button-modal-container">

                <div class="leftmodal-button-container">
                    <button type="reset" class="btn btn-outline-primary" data-mdb-dismiss="modal">
                        Reset
                    </button>
                </div>
    
                <div class="rightmodal-button-container">
    
                    <button type="submit" class="btn btn-primary" id="addModal"data-mdb-dismiss="modal">
                        Add
                    </button>
    
                    <button type="submit" class="btn btn-primary" id="saveModal" data-mdb-dismiss="modal">
                        Save
                    </button>
            </div>

          </form>
        </div>
        </div>

      </div>
    </div>
  </div>
</div>







{{-- Modals --}}
<div class="modal top fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
          <button type="button" class="btn-close" id="closeModalButton2" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-divider"></div>

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
              <label class="form-label" for="form6Example3">Job</label>
            </div>

            <!-- Department -->
            <div class="form-outline mb-4">
              <input type="text" id="form6Example3" class="form-control" />
              <label class="form-label" for="form6Example3">Department</label>
            </div>
          
            <!-- Position -->
            <div class="form-outline mb-4">
              <input type="text" id="form6Example4" class="form-control" />
              <label class="form-label" for="form6Example4">Position</label>
            </div>
                    
          
            <!-- Message input -->
            <div class="form-outline mb-4">
              <textarea class="form-control" id="form6Example7" rows="4"></textarea>
              <label class="form-label" for="form6Example7">Additional information</label>
            </div>


            <div class="button-modal-container">

                <div class="leftmodal-button-container">
                    <button type="reset" class="btn btn-outline-primary" data-mdb-dismiss="modal">
                        Reset
                    </button>
                </div>
    
                <div class="rightmodal-button-container">
    
                    <button type="submit" class="btn btn-primary" id="addModal2"data-mdb-dismiss="modal">
                        Add
                    </button>
    
                    <button type="submit" class="btn btn-primary" id="saveModal2" data-mdb-dismiss="modal">
                        Save
                    </button>
            </div>

          </form>
        </div>
        </div>

      </div>
    </div>
  </div>
</div>



<script src="{{ asset('js/admin.employees.js') }}"></script>


@include('partials.footer') 
