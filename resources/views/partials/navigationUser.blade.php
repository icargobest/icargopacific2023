<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
        <!--Bootstrap CSS-->
        <link rel="stylesheet" href="/css/bootstrap.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
        <!-- MDB -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="/css/mdb.min.css" />
        <script src="https://kit.fontawesome.com/efac33293c.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('css/main-header.css') }}">
        <link rel="stylesheet" href="/css/waybill-list.css" />
</head>
<style>
    .links .link i
    {
    padding-top: 0px!important;
    }
</style>

<body>

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
                        <div class="link">
                            <i class="bi bi-cart-plus-fill" style="margin-bottom: 5px"></i>
                            <a class="nav-link @if(isset($dashboard)){{$dashboard}}@endif" href="/dashboard"><span>Order</span></a>
                        </div>
                    </div>
                    <div class="links">
                        <div class="link">
                            <i class="bi bi-cart-check-fill" style="margin-bottom: 5px"></i>
                            <span>Order History </span>
                        </div>
                    </div>
                </div>
    
    <!--             <div class="divider2">
                </div> -->
    
                <div class="link2">
                    <div class="links">
                        <div class="link">
                            <i class="fa fa-bell"></i>
                            <span>Notifications</span>
                        </div>
                    </div>
                    
                    <div class="links">
                        <div class="link">
                            <i class="fa fa-envelope"></i>
                            <span>Messages</span>
                        </div>
                    </div>
        
                    <div class="links">
                        <div class="link">
                            <i class="fa fa-plus"></i>
                            <span>List Items</span>
                        </div>
                    </div>
        
                    <div class="links">
                        <div class="link">
                            <i class="fa fa-sign-out"></i>
                            <span>Logout</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
