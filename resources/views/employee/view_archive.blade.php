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
                    @foreach ($employees as $employee)
                        @if ($employee->archived == true)
                            <tr>
                                <td>{{$employee->id}}</td>
                                <td>{{$employee->name}}</td>
                                <td>{{$employee->email}}</td>
                                <td>{{$employee->role}}</td>
                                <td>@include('employee.restore')</td>
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
    </div>  
</main>

@include('partials.footer')	
