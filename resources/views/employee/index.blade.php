@include('partials.navigation', ['employee' => 'fw-bold'])
    <!--Employee List-->
    <div class="bg-light p-4 rounded">
        <h1>Users</h1>
        <div class="lead">
            Manage your users here.
            <a href="{{route('viewArchive')}}" class="btn btn-success">
                Archive
            </a>
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
        </section>
        <div class="d-flex">
        </div>
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
