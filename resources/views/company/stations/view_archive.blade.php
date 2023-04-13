@include('partials.navigation', ['stations' => 'fw-bold'])
    <!--Archived Stations -->
    <div class="bg-light p-4 rounded">
        <h1>Stations Archive</h1>
        <div class="lead">
            <a href="{{route('stations.view')}}" class="btn btn-primary">
                Back
            </a>
            <div class="mt-2">
                @include('partials.messages')
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" width="1%">ID</th>
                        <th scope="col" width="1%">Station Number</th>
                        <th scope="col" width="15%">Station Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Contact No.</th>
                        <th scope="col">Email</th>
                        <th scope="col" width="1%" colspan="3"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($stations as $station)
                            @if ($station->archived == 1)
                                <tr>
                                    <th scope="col" width="1%">{{$station->id}}</th>
                                    <td>{{$station->station_number}}</td>
                                    <td>{{$station->station_name}}</td>
                                    <td>{{$station->station_address}}</td>
                                    <td>{{$station->station_contact_no}}</td>
                                    <td>{{$station->station_email}}</td>
                                    <td>@include('company.stations.view')</td>
                                    <td>@include('company.stations.restore')</td>
                                </tr>
                            @endif
                        @endforeach
                </tbody>
            </table>

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
