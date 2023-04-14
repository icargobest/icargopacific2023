@include('partials.navigation', ['dispatcher' => 'fw-bold'])
    <!--Employee List-->
    <div class="bg-light p-4 rounded">
        <h1>Dispatcher List</h1>
        <div class="lead">
            <a href="{{route('dispatcher.viewArchive')}}" class="btn btn-primary">
                Archived Dispatcher
            </a>
            @include('dispatcher.create')
            
            <!-- Modal -->
        <div class="mt-2">
            @include('partials.messages')
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
                    <td>@include('dispatcher.show')</td>
                    <td>@include('dispatcher.edit')</td>
                    <td>@include('dispatcher.archive')</td>
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
