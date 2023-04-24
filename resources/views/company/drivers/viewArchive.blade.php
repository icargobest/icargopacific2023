@include('partials.navigation', ['drivers' => 'fw-bold'])
    <!--Employee List-->
    <div class="bg-light p-4 rounded">
        <h1>Archived Drivers</h1>
        <div class="lead">
            <a href="{{route('drivers.index')}}" class="btn btn-primary">Back</a>
            <div class="mt-2">
                @include('flash-message')
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" width="1%">#</th>
                        <th scope="col" width="25%">Driver Name</th>
                        <th scope="col">Vehicle Type</th>
                        <th scope="col">Plate No.</th>
                        <th scope="col">Action</th>
                        <th scope="col" width="1%" colspan="1"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    @if ($user->driverDetail->archived == true)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->driverDetail->vehicle_type }}</td>
                        <td>{{ $user->driverDetail->plate_no }}</td>
                        <td>@include('company/drivers.show')</td>
                        <td>@include('company/drivers.restore')</td>
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