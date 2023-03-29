@include('partials.navigation', ['employee' => 'fw-bold'])
    <!--Employee List-->
    <div class="bg-light p-4 rounded">
        <h1>Users</h1>
        <div class="lead">
            Manage your users here.
            <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                Add Employee
            </button>
            <a href="{{route('viewArchive')}}" class="btn btn-success">
                Archive
            </a>

            <!-- Add Modal -->
            <div class="modal top fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
                <div class="modal-dialog ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
                      <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="{{route('addEmployee')}}">
                        @csrf
                        <!-- Name Input -->
                        <div class="row mb-4">
                          <div class="col">
                            <div class="form-outline">
                              <input type="text" id="form6Example1" name="FullName" class="form-control" />
                              <label class="form-label" for="form6Example1">Name</label>
                            </div>
                          </div>
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                          <input type="email" id="form6Example5" name="email" class="form-control" />
                          <label class="form-label" for="form6Example5">Email</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                          <input type="password" id="form6Example5" name="password" class="form-control" />
                          <label class="form-label" for="form6Example5">Password</label>
                        </div>

                        <!-- Position -->
                         <div class="form-outline mb-4">
                          <input type="text" id="form6Example4" name="role" class="form-control" />
                          <label class="form-label" for="form6Example4">Position</label>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-block">
                              Save
                            </button>
                            <a class="btn btn-secondary btn-block mb-4" data-mdb-dismiss="modal">
                              Back
                            </a>
                          </div>
                      </form>
                    </div>

                  </div>
                </div>
              </div>
            </div>
        </div>


        <div class="mt-2">
            @include('partials.messages')
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col" width="1%">#</th>
                <th scope="col" width="15%">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col" width="1%" colspan="3"></th>
            </tr>
            </thead>
            <tbody>
                @foreach ($employees as $emp)
                    @if ($emp->archived == 0)
                        <tr>
                            <td>{{$emp->id}}</td>
                            <td>{{$emp->name}}</td>
                            <td>{{$emp->email}}</td>
                            <td>{{$emp->role}}</td>
                            <td><a href="{{route('viewEmployee', $emp->id)}}" class="btn btn-warning btn-sm">Show</a></td>
                            <td><a href="{{route('updateEmployee', $emp->id)}}" class="btn btn-info btn-sm">Edit</a></td>
                            <td><a href="{{route('archiveEmployee', $emp->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to archive this employee?')">Archive</a>
                            </td>
                            <td>
                            </td>
                        </tr>
                    @endif
                @endforeach

            </tbody>
        </table>

        <div class="d-flex">
        </div>

    </div>



<!-- Archive Modal -->
<div class="modal top fade" id="archiveModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Archive Employee</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to archive this employee?</p>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ route('archiveEmployee', $emp->id) }}">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-danger">Archive</button>
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Cancel</button>
                </form>
            </div>
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
