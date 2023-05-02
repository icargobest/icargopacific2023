@include('partials.navigationCompany')
@include('layouts.app')

<head>
    <title>CUSTOMER | HISTORY</title>
</head>

    <div class="container me-0">
        <div class="ms-4" {{-- style="overflow-x: auto; max-width: 100%;" --}}>
            <div class="border-bottom">
                <h3>HISTORY</h3>
            </div>
                
                <!-- table starts here -->
                <section class="mt-5 mb-5 h-90">
                    <table class="table table-striped table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>COMPANY</th>
                            <th>DATE ORDERED</th>
                            <th>DATE DELIVERED</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>

                    <tbody>
                        {{-- @foreach ($users as $user) --}}
                        <tr>
                          <td>HART MORINS COMPANY</td>
                          <td>2023-04-29</td>
                          <td>2023-05-02</td>
                          <td>
                            <a href="{{-- {{ route('users.edit', $user->id) }} --}}" class="btn btn-primary">DELIVERED</a>
                            <a href="{{-- {{ route('users.delete', $user->id) }} --}}" class="btn btn-danger">CANCELLED</a>
                          </td>
                        </tr>
                      {{-- @endforeach --}}

                    </tbody>
                    </table>
                </section>
                <!-- table end -->
        </div>
    </div>

@include('partials.footer') 