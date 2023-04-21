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
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

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

<div class="main-container">


    <div class="sidebar">
        <div class="wrapper">


            <div class="search-bar-container">
                <button class="search-bar-button"><i class="fa-solid fa-magnifying-glass"></i></button>
                <input class="input"id="search-input" placeholder="Tracking ID">
            </div>

            <div class="divider">
            </div>
            
            <div class="links-wrapper">
                <div class="link1">
                    <div class="links">

                        <a class="nav-link @if(isset($waybill)){{$waybill}}@endif" href="/waybill">
                        <div class="link" >
                            <i class="bi bi-cart-plus-fill link-i-3"></i>
                            <span>Order</span>
                        </div>
                        </a>
                        
                    </div>
                    <div class="links">
                        <div class="link">
                            <i class="bi bi-cart-check-fill link-i-3"></i>
                            <span>Order History </span>
                        </div>
                    </div>
                </div>
    
    <!--             <div class="divider2">
                </div> -->
    
        
                    <div class="links bottom-nav">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <div class="link ">
                                <i class="fa fa-sign-out"></i>
                                    <span>Logout</span>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <div class="content-container">
        