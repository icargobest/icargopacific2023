<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    {{-- Data Table --}}
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"
    />
    <link
        rel="stylesheet"
        href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css"
    />

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <script src="https://kit.fontawesome.com/efac33293c.js" crossorigin="anonymous"></script>
    {{--  BOX ICON --}}
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- MDB -->
    <link rel="stylesheet" href="/css/mdb.min.css" />

    {{-- Backend Css --}}
    <link href="{{ asset('assets\css\app.css') }}" type="text/css" rel="stylesheet">

    {{-- Navigation Css --}}
    <link rel="stylesheet" href="{{ asset('css/main-header.css') }}">
    {{-- CSS Navigation User --}}
    <link rel="stylesheet" href="{{ asset('css/driver&dispatcher.css') }}">
    <link rel="stylesheet" href="/css/waybill-list.css" />
    <link rel="stylesheet" href="{{ asset('css/style_order.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_waybillForm.css') }}">
    {{-- CSS Navigation Company --}}
    <link rel="stylesheet" href="{{ asset('css/employee.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_order.css') }}" />
    {{-- CSS Navigation Driver --}}
    {{-- CSS Navigation Dispatcher --}}
    {{-- CSS Navigation Staff --}}
    {{--  ICONS --}}
    <link rel="shortcut icon" href="{{ asset('ICARGOicon.ico') }}">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
