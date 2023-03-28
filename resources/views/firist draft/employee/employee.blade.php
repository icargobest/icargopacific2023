@include('partials.navigation', ['employee' => 'fw-bold'])


  
    <!--Employee List-->
    <div class="container p-3">
      <div class="card">
      <div class="card-body overflow-x-scroll">
        <div class="d-grid gap-2 d-md-flex row p-3">
          <h4>Employee List</h4>
          <div class="text-wrap">
            <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
              Add Employee
            </button>
            <!-- Modal -->
            <div class="modal top fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
              <div class="modal-dialog ">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
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
                      Save
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
        <table class="table align-middle mb-0 bg-white table-striped">
        <thead class="bg-light">
          <tr>
            <th>Name</th>
            <th>Title</th>
            <th>Status</th>
            <th>Position</th> 
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <div class="d-flex align-items-center">
                <img
                    src="https://mdbootstrap.com/img/new/avatars/8.jpg"
                    alt=""
                    style="width: 45px; height: 45px"
                    class="rounded-circle"
                    />
                <div class="ms-3">
                  <p class="fw-bold mb-1">John Doe</p>
                  <p class="text-muted mb-0">john.doe@gmail.com</p>
                </div>
              </div>
            </td>
            <td>
              <p class="fw-normal mb-1">Software engineer</p>
              <p class="text-muted mb-0">IT department</p>
            </td>
            <td>
              <span class="badge badge-success rounded-pill d-inline">Active</span>
            </td>
            <td>Senior</td>
            <td>
              <button type="button" class="btn btn-link btn-sm btn-rounded">
                Edit
              </button>
            </td>
          </tr>
          <tr>
            <td>
              <div class="d-flex align-items-center">
                <img
                    src="https://mdbootstrap.com/img/new/avatars/6.jpg"
                    class="rounded-circle"
                    alt=""
                    style="width: 45px; height: 45px"
                    />
                <div class="ms-3">
                  <p class="fw-bold mb-1">Alex Ray</p>
                  <p class="text-muted mb-0">alex.ray@gmail.com</p>
                </div>
              </div>
            </td>
            <td>
              <p class="fw-normal mb-1">Consultant</p>
              <p class="text-muted mb-0">Finance</p>
            </td>
            <td>
              <span class="badge badge-primary rounded-pill d-inline"
                    >Onboarding</span
                >
            </td>
            <td>Junior</td>
            <td>
              <button
                      type="button"
                      class="btn btn-link btn-rounded btn-sm fw-bold"
                      data-mdb-ripple-color="dark"
                      >
                Edit
              </button>
            </td>
          </tr>
          <tr>
            <td>
              <div class="d-flex align-items-center">
                <img
                    src="https://mdbootstrap.com/img/new/avatars/7.jpg"
                    class="rounded-circle"
                    alt=""
                    style="width: 45px; height: 45px"
                    />
                <div class="ms-3">
                  <p class="fw-bold mb-1">Kate Hunington</p>
                  <p class="text-muted mb-0">kate.hunington@gmail.com</p>
                </div>
              </div>
            </td>
            <td>
              <p class="fw-normal mb-1">Designer</p>
              <p class="text-muted mb-0">UI/UX</p>
            </td>
            <td>
              <span class="badge badge-warning rounded-pill d-inline">Awaiting</span>
            </td>
            <td>Senior</td>
            <td>
              <button
                      type="button"
                      class="btn btn-link btn-rounded btn-sm fw-bold"
                      data-mdb-ripple-color="dark"
                      >
                Edit
              </button>
            </td>
          </tr>
        </tbody>
        </table>
      </div>
    </div>
    </div>
    <!-- MDB -->
    <script type="text/javascript" src="/js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
    <!--Bootstrap JS-->
    <script src="/js/bootstrap.bundle.js"></script>
</body>
</html>
{{-- @include('partials.footer') --}}