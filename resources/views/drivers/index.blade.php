@include('partials.navigation', ['drivers' => 'fw-bold'])
    <!--Employee List-->
    <div class="bg-light p-4 rounded">
        <h1>Driver List</h1>
        <div class="lead">
            <a href="{{route('drivers.viewArchive')}}" class="btn btn-primary">
              Archived Driver
            </a>
            @include('drivers.create')

            <!-- Modal -->
        <div class="mt-2">
            @include('partials.messages')
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col" width="1%">ID</th>
                <th scope="col" width="25%">Driver Name</th>
                <th scope="col">Vehicle Type</th>
                <th scope="col">Plate number</th>
                <th scope="col" width="1%" colspan="5">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                @if ($user->driverDetail->archived == false)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->driverDetail->vehicle_type }}</td>
                    <td>{{ $user->driverDetail->plate_no }}</td>
                    <td>@include('drivers.show')</td>
                    <td>@include('drivers.edit')</td>
                    <td>@include('drivers.archive')</td>
                </tr>
                @endif
            @endforeach
            </tbody>
        </table>
        {!! $users->links() !!}
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
