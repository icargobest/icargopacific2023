<title>SuperAdmin | Dispatchers</title>
@include('partials.header') @extends('layouts.app')
@include('partials.navigationSuperAdmin', ['dispatchers' =>"nav-selected"])

<main class="container py-5" style="margin-top: -49px !important">
    <div class="main-wrapper border border-2" style="max-width: 100%">
        <div class="employee-header-container">
            <h3 class="">Registered Dispatchers</h3>
        </div>

        <div class="addemployee" style="">
            <a href="{{ route('viewArchive.dispatchers') }}">
                <button
                    type="button"
                    class="btn btn-success btn-sm m-button2"
                    style="height: 32.8px"
                >
                    Archived
                </button>
            </a>
        </div>
        <div class="mt-2">@include('flash-message')</div>

        <div class="table-container">
            <table
                class="table table-striped table-borderless hover"
                id="registeredUsers"
            >
                <thead>
                    <tr>
                        <th scope="col" style="text-align: center">Dispatcher ID</th>
                        <th scope="col" style="text-align: center !Important">Icon</th>
                        <th scope="col" style="text-align: center">Name</th>
                        <th scope="col" style="text-align: center">Email</th>
                        <th scope="col" style="text-align: center">
                            Contact No
                        </th>
                        <th scope="col" style="text-align: center">Company</th>
                        <th
                            scope="col"
                            style="text-align: center !important; width: 250px"
                        >
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dispatchers as $dispatcher)
                    <tr>
                        <td>{{ $dispatcher->id}}</td>
                        <td><img src="@if ($dispatcher->image != null) {{ asset('storage/images/dispatcher/'.$dispatcher->user_id.'/'.$dispatcher->image) }} @else /img/default_dp.png @endif" style="width: 30px" alt="profile image"></td>
                        <td class="capitalized">
                            {{ $dispatcher->user->name }}
                        </td>
                        <td>{{ $dispatcher->user->email }}</td>
                        <td>{{ $dispatcher->contact_no}}</td>
                        <td>
                            @if ($dispatcher->company &&
                            $dispatcher->company->user) {{
                            $dispatcher->company->user->name }} @endif
                        </td>
                        <td
                            class="td-buttons d-flex justify-content-center"
                            style="overflow: auto"
                        >
                            @if ($dispatcher->user->type == "dispatcher")
                            @include('icargo_superadmin_panel.dispatcher.show')
                            @include('icargo_superadmin_panel.dispatcher.edit')
                            @include('icargo_superadmin_panel.dispatcher.archive')
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        let table = new DataTable("#registeredUsers", {
            order: [[0, "desc"]], // Sort by the first column in ascending order
        });
    });
</script>

@include('partials.footer')
