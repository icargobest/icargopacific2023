@include('partials.navigation', ['employee' => 'fw-bold'])

<style>
    .primary {
        background-color: #214D94;
        color: white;
    }
</style>

<!--Employee List-->
<div class="container-fluid py-3 h-90">
    <div class="bg-white shadow" style="max-width: 100%;">
        <!-- header -->
        <div class="waybill-head p-3 ps-4 primary">
            <h3 class="mb-0">EMPLOYEE LIST</h3>
            <i>Manage your users here.</i>
        </div>
        <!-- search and dropdown group-->
        <section class="btn-wrapper p-4 pt-4">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="fw-normal">SEARCH:</h5>
                </div>
                <div class="col-sm-6">
                    <h5 class="fw-normal">FILTERS:</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">  
                    <div class="input-group">
                        <div class="form-outline">
                            <input type="search" class="form-control" style="background-color: #EAEBEE"/>
                            <label class="form-label">Search Employee</label>
                        </div>
                        <button type="button" class="btn btn-dark shadow-0" style="background-color: #214D94;">
                        <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-2">
                    <div class="input-group pb-2">
                        <select class="form-control btn shadow-0 border border-dark pb-2" style="background-color: #EAEBEE;">
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                            <option>Title</option>
                            <option>Action</option>
                            <option>Another Action</option>
                            <option>Something Else Here</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="input-group">
                        <select class="form-control btn shadow-0 border border-dark pb-2" style="background-color: #EAEBEE;">
                            <option>Status</option>
                            <option>Action</option>
                            <option>Another Action</option>
                            <option>Something Else Here</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="input-group">
                        <select class="form-control btn shadow-0 border border-dark pb-2" style="background-color: #EAEBEE;">
                            <option>Position</option>
                            <option>Action</option>
                            <option>Another Action</option>
                            <option>Something Else Here</option>
                        </select>
                    </div>
                </div>
            </div>
        </section>
        <!-- buttons -->
        <div class="row ps-4 pb-4">
            <div class="col-sm-2">
                <div>
                @include('employee.create')
                </div>
            </div>
            <div class="col-sm-2">
            <a href="{{route('viewArchive')}}">
                <button type="button" class="btn btn-warning btn-block shadow-0">
                Archive</button>
            </a>
            </div>
        </div>
        <div class="mt-2">
            @include('partials.messages')
        </div>
        <section class="mb-5 px-4 h-90 overflow-auto">
            <table class="table table-striped table-hover">
            <thead class="text-white primary">
                <tr>
                    <th scope="col" width="1%">ID</th>
                    <th scope="col" width="15%">NAME</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">ROLE</th>
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
                            <td>{{$employee->role}}</td>
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
