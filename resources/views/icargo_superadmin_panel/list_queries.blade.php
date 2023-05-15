@extends('layouts.app')
@include('partials.navigationSuperAdmin')

@section('content')

<table class="table table-bordered table-striped">
                <thead>
                  <th>Email</th>
                  <th>Name</th>
                  <th>Query</th>
                </thead>

            @foreach ($cust_queries as $cust_query)
            
                <tr>
                  <td>{{$cust_query->email}}</td>
                  <td>{{$cust_query->name}}</td>
                  <td>{{$cust_query->cust_query}}</td>
                </tr>
                
            
            @endforeach
            </table>

@endsection