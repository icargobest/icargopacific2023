<title>Staff | Dispatcher</title>
@extends('layouts.app')
@include('partials.navigationStaff',['dispatcher' => "nav-selected"])
<main class="container py-5" style="margin-top:-49px !important">
    <div class="main-wrapper border border-2" style=" max-width: 100%;">
        <div class="employee-header-container">
            <h3 class="">DISPATCHER LIST</h3>
        </div>

        <div class="addemployee" style="" >
            <button type="button" class="btn btn-primary m-button1" style="" data-bs-toggle="modal" data-bs-target="#addDispatchersModal">Add Dispatcher</button>
            <a href="{{route('dispatchers.viewArchive')}}">
                <button type="button" class="btn btn-success btn-sm m-button2" style="height:32.8px">
                    Archived
                 </button>
            </a>
        </div>

        <section class="search-filter-container">

            <div class="top-container1" style="max-width: 800px;">
                <h5 class="fw-normal mb-2 d-inline">SEARCH:</h5>
                <div class="input-group rounded">
                    <input type="search" class="form-control rounded" placeholder="Search Employee" aria-label="Search" aria-describedby="search-addon" />
                    <span class="input-group-text border-0" id="search-addon">
                      <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>
        </section>

        <div class="mt-2">
            @include('flash-message')
        </div>


        <div class="table-container">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col"style="text-align:center;">#</th>
                    <th scope="col"style="text-align:center;">Dispatcher Name</th>
                    <th scope="col"style="text-align:center; width:350px;">Action</th>

                </tr>
                </thead>
                <tbody>
                    @foreach ($dispatchers as $user)
                        @if ($user->archived == 0)
                            <tr>
                                <td >{{ $user->id }}</td>
                                <td class="capitalized">{{ $user->user->name }}</td>
                                <td class="td-buttons d-flex justify-content-center" style="overflow:auto;">
                                    @include('staff_panel/dispatcher.show')
                                    @include('staff_panel/dispatcher.edit')
                                    @include('staff_panel/dispatcher.archive')
                                    @if($user->user->status == 1)
                                    <a href="{{ route('dispatcher.status.update', ['user_id' => $user->user->id, 'status_code' => 0]) }}" class="btn btn-danger btn-sm" style="width:80px !important;">
                                        Lock
                                    </a>
                                    @else
                                     <a href="{{ route('dispatcher.status.update', ['user_id' => $user->user->id, 'status_code' => 1]) }}" class="btn btn-success btn-sm" style="width:85px !important;">
                                        unlock
                                     </a>
                                    @endif  
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
</main>


@include('staff_panel/dispatcher.create')
@include('partials.footer')	