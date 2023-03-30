@include('partials.navigation', ['drivers' => 'fw-bold'])
    <!--Employee List-->
    <div class="bg-light p-4 rounded">
        <h1>Archive Drivers</h1>
        <div class="lead">
            <a href="{{route('drivers.index')}}" class="btn btn-primary">Back</a>
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
                        <th scope="col" width="1%" colspan="1"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($drivers as $driver)
                        @if ($driver->archived == true)
                            <tr>
                                <td>{{ $driver->id }}</td>
                                <td>{{ $driver->driver_name }}</td>
                                <td>{{ $driver->vehicle_type }}</td>
                                <td>{{ $driver->plate_no }}</td>
                                <td><a href="{{route('drivers.unarchive', $driver->id)}}" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to restore this driver?')">Restore</a>
                                </td>
                                <td>
                                </td>
                            </tr>
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