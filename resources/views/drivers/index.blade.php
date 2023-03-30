@include('partials.navigation', ['drivers' => 'fw-bold'])
    <!--Employee List-->
    <div class="bg-light p-4 rounded">
        <h1>Driver List</h1>
        <div class="lead">
            <button type="button" class="btn btn-success" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
              Add Driver
            </button>
            <a href="{{route('drivers.viewArchive')}}" class="btn btn-primary">
              Archive Driver
            </a>
            
            <!-- Modal -->
            <div class="modal top fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
                <div class="modal-dialog ">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add Driver</h5>
                      <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('drivers.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Driver Name -->
                        <div class="row mb-4">
                          <div class="col">
                            <div class="form-outline">
                              <input type="text" id="form6Example1" name="driver_name" class="form-control" />
                              <label class="form-label" for="form6Example1">Driver Name</label>
                            </div>
                          </div>
                        </div>

                        <!-- Vehicle Type -->
                        <div class="form-outline mb-4">
                          <input type="text" id="form6Example5" name="vehicle_type" class="form-control" />
                          <label class="form-label" for="form6Example5">Vehicle Type</label>
                        </div>

                        <!-- Plate No. -->
                         <div class="form-outline mb-4">
                          <input type="text" id="form6Example4" name="plate_no" class="form-control" />
                          <label class="form-label" for="form6Example4">Plate No.</label>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-block" data-mdb-dismiss="modal">
                              Save
                            </button>
                            <button type="submit" class="btn btn-danger btn-block mb-4" data-mdb-dismiss="modal">
                              Reset
                            </button>
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
                <th scope="col" width="25%">Driver Name</th>
                <th scope="col">Vehicle Type</th>
                <th scope="col">Plate No.</th>
                <th scope="col" width="1%" colspan="3"></th>
            </tr>
            </thead>
            <tbody>
                @foreach ($drivers as $driver)
                  @if ($driver->archived == false)
                    <tr>
                        <td>{{ $driver->id }}</td>
                        <td>{{ $driver->driver_name }}</td>
                        <td>{{ $driver->vehicle_type }}</td>
                        <td>{{ $driver->plate_no }}</td>
                        <td><a href="{{route('drivers.show', $driver->id)}}" class="btn btn-warning btn-sm">Show</a></td>
                        <td><a href="{{ route('drivers.edit',$driver->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                        <td><a href="{{route('drivers.archive', $driver->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to archive this driver?')">Archive</a>
                    @endif
                @endforeach
            </tbody>
        </table>
        {!! $drivers->links() !!}
        <div class="d-flex">
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
