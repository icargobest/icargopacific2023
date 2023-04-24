@include('partials.navigation', ['dispatcher' => 'fw-bold'])
    <!--Employee List-->
    <div class="bg-light p-4 rounded">
        <h1>Dispatcher List</h1>
        <div class="lead">
            <a href="{{route('dispatcher.viewArchive')}}" class="btn btn-primary">
                Archived Dispatcher
            </a>
            @include('company/dispatcher.create')
            
            <!-- Modal -->
        <div class="mt-2">
            @include('flash-message')
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col" width="5%">ID</th>
                <th scope="col" width="25%">Dispatcher Name</th>
                <th scope="col" width="1%" colspan="5">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                @if ($user->dispatcherDetail->archived == false)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>@include('company/dispatcher.show')</td>
                    <td>@include('company/dispatcher.edit')</td>
                    <td>@include('company/dispatcher.archive')</td>
                    <td>
                        @if($user->status == 1)
                        <a href="{{ route('dispatcher.status.update', ['user_id' => $user->id, 'status_code' => 0]) }}" class="btn btn-danger btn-sm">
                            Lock
                        </a>
                        @else
                         <a href="{{ route('dispatcher.status.update', ['user_id' => $user->id, 'status_code' => 1]) }}" class="btn btn-success btn-sm">
                            unlock
                         </a>
                        @endif
                    </td>
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
