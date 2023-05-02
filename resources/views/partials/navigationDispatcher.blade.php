<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="dns-prefetch" href="//fonts.gstatic.com">
            <link href="{{ asset('assets\css\app.css') }}" type="text/css" rel="stylesheet">
            <!--Bootstrap CSS-->
            <link rel="stylesheet" href="/css/bootstrap.css">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

            <!-- Font Awesome -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
            <script src="https://kit.fontawesome.com/efac33293c.js" crossorigin="anonymous"></script>

           {{--  BOX ICON --}}
            <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
            
            <!-- MDB -->
            <link rel="stylesheet" href="/css/mdb.min.css" />

            {{-- CSS --}}
            <link rel="stylesheet" href="{{ asset('css/main-header.css') }}">

           {{--  ICONS --}}
            <link rel="stylesheet" href="{{ asset('css/style_order.css') }}">
            <link rel="shortcut icon" href="{{ asset('ICARGOicon.ico') }}">
            <!-- Scripts -->
            @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
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
                            <a class="nav-link">
                                <div class="link">
                                    <i class="fa fa-qrcode link-i-1" ></i>
                                    <span>Qr Scanner</span>
                                </div>
                            </a>
                        </div>
                        <div class="links">
                            <a class="nav-link">
                                <div class="link">
                                    <i class="fa fa-history link-i-1" ></i>
                                    <span>History</span>
                                </div>
                            </a>
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
