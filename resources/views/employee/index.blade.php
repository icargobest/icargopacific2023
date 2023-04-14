@include('partials.navigation', ['employee' => 'fw-bold'])
    <!--Employee List-->
    <div class="bg-light p-4 rounded">
        <h1>Staff</h1>
        <div class="lead">
            <a href="{{route('viewArchive')}}" class="btn btn-success">
                Archive
            </a>
            @include('employee.create')
        </div>

        <div class="mt-2">
            @include('partials.messages')
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col" width="5%">#</th>
                <th scope="col" width="25%">Name</th>
                <th scope="col">Email</th>
                <th scope="col" width="1%" colspan="5">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    @if ($employee->archived == 0)
                        <tr>
                            <td>{{$employee->id}}</td>
                            <td>{{$employee->name}}</td>
                            <td>{{$employee->email}}</td>
                            <td>@include('employee.view')</td>
                            <td>@include('employee.edit')</td>
                            <td>@include('employee.archive')</td>
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
