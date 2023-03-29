@include('partials.navigation', ['employee' => 'fw-bold'])
    <!--Employee List-->
    <div class="bg-light p-4 rounded">
        <h1>Archive</h1>
        <div class="lead">
            Manage your users here.
            <a href="{{route('EmployeePanel')}}" class="btn btn-primary">
                Back
            </a>
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
                        @if ($emp->archived == true)
                            <tr>
                                <td>{{$emp->id}}</td>
                                <td>{{$emp->name}}</td>
                                <td>{{$emp->email}}</td>
                                <td>{{$emp->role}}</td>
                                <td><a href="{{route('unarchiveEmployee', $emp->id)}}" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to restore this employee?')">Restore</a>
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
    <!-- MDB -->
    <script type="text/javascript" src="/js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
    <!--Bootstrap JS-->
    <script src="/js/bootstrap.bundle.js"></script>
</body>
</html>
