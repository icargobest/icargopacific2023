<title>Company | Dispatcher Archived</title>
@extends('layouts.app')
@include('partials.header')
@include('partials.navigationCompany', ['dispatcher' =>"nav-selected"])
<style>
    svg{
        width:  1.5rem;
        height: 1.5rem;
    }
    table {
    border-color: transparent !important;
    }
</style>
<main class="container py-5" style="margin-top:-49px !important">
    <div class="main-wrapper border border-2" style=" max-width: 100%;">
            <div class="employee-header-container">
                <h3 class="">Dispatchers Archived</h3>
            </div>
        
        <div class="addemployee" style="height:75.6px;" >
            <a href="{{route('dispatcher.index')}}">
                <button type="button" class="btn btn-primary m-button1" style="height:32.8px">
                    Back
                </button>
            </a>
        </div>

        <div class="mt-2">
            @include('flash-message')
        </div>

        <div class="table-container">
            <table
            class="table table-striped table-bordered table-hover table-borderless hover"
            id="companydispatchers"
            >
                <thead>
                <tr>
                    <th scope="col" style="text-align:center;">#</th>
                    <th scope="col" style="text-align:center;">Dispatcher Name</th>
                    <th scope="col" style="text-align:center;">Email</th>
                    <th scope="col" style="text-align:center; width:250px">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($dispatchers as $user)
                        @if ($user->archived == true)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="td-buttons d-flex justify-content-center"style="overflow:auto">@include('company/dispatcher.show')@include('company/dispatcher.restore')</td>
                            </tr>
                        @endif
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
    let companydispatchers = new DataTable("#companydispatchers");
</script>
@include('partials.footer')	
