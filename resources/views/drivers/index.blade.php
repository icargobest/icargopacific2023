@include('partials.navigation', ['drivers' => 'fw-bold'])
    <!--Employee List-->
    <div class="bg-light p-4 rounded">
        <h1>Driver List</h1>
        <div class="lead">
            <a href="{{route('drivers.viewArchive')}}" class="btn btn-primary"">
              Archive Driver
            </a>
            @include('drivers.create')
            
            <!-- Modal -->
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
                <th scope="col" width="1%" colspan="5"></th>
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
                        <td>@include('drivers.show')</td>
                        <td>@include('drivers.edit')</td>
                        <td>@include('drivers.archive')</td>
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
