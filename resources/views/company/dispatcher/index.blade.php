<title>Company | Dispatcher</title>
@include('partials.header')
@extends('layouts.app') 
@include('partials.navigationCompany', ['dispatcher' =>"nav-selected"])

<style>
    svg {
        width: 1.5rem;
        height: 1.5rem;
    }
</style>

<main class="container py-5" style="margin-top: -49px !important">
    <div class="main-wrapper border border-2" style="max-width: 100%">
        <div class="employee-header-container">
            <h3 class="">DISPATCHER LIST</h3>
        </div>

        <div class="addemployee" style="">
            <button
                type="button"
                class="btn btn-primary m-button1"
                style=""
                data-bs-toggle="modal"
                data-bs-target="#addDispatcherModal"
            >
                Add Dispatcher
            </button>
            <a href="{{route('dispatcher.viewArchive')}}">
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
                id="companydispatchers"
            >
                <thead>
                    <tr>
                        <th scope="col" style="text-align: center">#</th>
                        <th scope="col" style="text-align: center">
                            Dispatcher Name
                        </th>
                        <th scope="col" style="text-align: center">
                            Email
                        </th>
                        <th scope="col" style="text-align: center">
                            Contact No
                        </th>
                        <th
                            scope="col"
                            style="text-align: center; width: 350px"
                        >
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dispatchers as $user) @if ($user->archived == 0)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td class="capitalized">{{ $user->user->name }}</td>
                        <td>{{ $user->user->email }}</td>
                        <td class="capitalized">{{ $user->contact_no }}</td>
                        <td
                            class="td-buttons d-flex justify-content-center"
                            style="overflow: auto"
                        >
                            @include('company/dispatcher.show')
                            @include('company/dispatcher.edit')
                            @include('company/dispatcher.archive')
                            @if($user->user->status == 1)
                            <a
                                href="{{ route('dispatcher.status.update', ['user_id' => $user->user->id, 'status_code' => 0]) }}"
                                class="btn btn-danger btn-sm"
                                style="width: 80px !important"
                            >
                                Lock
                            </a>
                            @else
                            <a
                                href="{{ route('dispatcher.status.update', ['user_id' => $user->user->id, 'status_code' => 1]) }}"
                                class="btn btn-success btn-sm"
                                style="width: 85px !important"
                            >
                                unlock
                            </a>
                            @endif
                        </td>
                    </tr>
                    @endif @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script type="text/javascript">
    let companydispatchers = new DataTable("#companydispatchers");
</script>

@include('company/dispatcher.create') @include('partials.footer')
