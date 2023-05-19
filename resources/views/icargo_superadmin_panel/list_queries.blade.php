<title>SuperAdmin | Queries</title>
@include('partials.header')
@extends('layouts.app')
@include('partials.navigationSuperAdmin', ['queries' =>"nav-selected"])

<main class="container py-5" style="margin-top: -49px !important">
  <div class="main-wrapper border border-2" style="max-width: 100%">
      <div class="employee-header-container">
          <h3 class="">List Queries</h3>
      </div>

      <div class="addemployee" style=""></div>

      <div class="table-container">
          <table class="table table-striped table-borderless hover">
            @section('content')

                          <thead>
                            <th>Email</th>
                            <th>Name</th>
                            <th>Query</th>
                          </thead>

                          <tbody>
                      @foreach ($cust_queries as $cust_query)
                      
                          <tr>
                            <td>{{$cust_query->email}}</td>
                            <td>{{$cust_query->name}}</td>
                            <td><a href="{{ route('showQuery', $cust_query->id) }}"><button class="btn created-button mx-auto">Show</button></a></td>
                          </tr>
                          
                      
                      @endforeach
                      </tbody>
                      </table>

            @endsection
      </div>
</div>
</main>