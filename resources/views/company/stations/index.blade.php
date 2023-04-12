@include('partials.navigation', ['stations' => 'fw-bold'])
    <!--Employee List-->
    <div class="bg-light p-4 rounded">
        <h1>Stations</h1>
        <div class="lead">
            <a href="{{route('viewArchive')}}" class="btn btn-success">
                Archive
            </a>
            @include('company/stations.create')
        </div>

        <div class="mt-2">
            @include('partials.messages')
            @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col" width="1%">#</th>
                <th scope="col" width="1%">Station ID</th>
                <th scope="col" width="15%">Station Name</th>
                <th scope="col">Address</th>
                <th scope="col">Contact</th>
                <th scope="col">Email</th>
                <th scope="col" width="1%" colspan="3"></th>
            </tr>
            </thead>
            <tbody>
                @foreach ($stations as $station)
                    @if ($station->archived == 0)
                        <tr>
                            <th scope="col" width="1%">#</th>
                            <td>{{$station->station_id}}</td>
                            <td>{{$station->station_name}}</td>
                            <td>{{$station->station_address}}</td>
                            <td>{{$station->station_contact_no}}</td>
                            <td>{{$station->station_email}}</td>
                            {{-- <td>{{$station->created_at}}</td>
                            <td>{{$station->updated_at}}</td> --}}
                            <td>@include('company.stations.view')</td>
                            {{-- <td>@include('company.stations.edit')</td> --}}
                            <td>@include('company.stations.archive')</td>
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
    <!--Popper-->

</body>
</html>
{{-- @include('partials.footer') --}}
