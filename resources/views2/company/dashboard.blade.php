<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

            <link rel="dns-prefetch" href="//fonts.gstatic.com">
            <link href="{{ asset('assets\css\app.css') }}" type="text/css" rel="stylesheet">
            <!--Bootstrap CSS-->
            <link rel="stylesheet" href="/css/bootstrap.css">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

            <!-- Font Awesome -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
            <!-- MDB -->
            <link rel="stylesheet" href="/css/mdb.min.css" />
            <script src="https://kit.fontawesome.com/efac33293c.js" crossorigin="anonymous"></script>
            
            {{-- CSS --}}
            <link rel="stylesheet" href="{{ asset('css/main-header.css') }}">
            <link rel="stylesheet" href="{{ asset('css/employee.css') }}">
            <link rel="stylesheet" href="/css/waybill-list.css" />

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
</head>


@extends('partials.navigationCompany')
@extends('layouts.app')

