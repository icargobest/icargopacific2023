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
      
                            <a class="nav-link" href="/company/dashboard">
                            <div class="link" >
                                <i class="fa fa-tachometer link-i-1" ></i>
                                <span>Dashboard</span>
                            </div>
                            </a>
                            
                        </div>
                        <div class="links">
                            <div class="link">
                                <i class="fa fa-list link-i-1"></i>
                                <span>Order List </span>
                            </div>
                        </div>
      
                        <div class="links">
      
                          <a class="nav-link @if(isset($freight)){{$freight}}@endif" href="/freight">
                          <div class="link" >
                              <i class="fa fa-truck link-i-1"></i>
                              <span>Freight</span>
                          </div>
                          </a>
                          
                      </div>
                      <div class="links">
                          <div class="link">
                              <i class="fa fa-history link-i-1"></i>
                              <span>Order History </span>
                          </div>
                      </div>
      
                      <div class="links">
      
                        <a class="nav-link @if(isset($waybill)){{$waybill}}@endif" href="/waybill">
                        <div class="link" >
                            <i class="fa fa-forward link-i-1"></i>
                            <span>Adv. Freight Forwarding</span>
                        </div>
                        </a>
                        
                    </div>
                    <div class="links">
                      <a class="nav-link @if(isset($employee)){{$employee}}@endif" href="/employees">
                        <div class="link">
                            <i class="fa fa-user link-i-1"></i>
                            <span>Staff </span>
                        </div>
                      </a>
                    </div>
      
                    <div class="links">
      
                      <a class="nav-link @if(isset($employee)){{$employee}}@endif" href="/employees">
                          <div class="link" >
                              <i class="fa fa-id-card link-i-1"></i>
                              <span>Dispatcher</span>
                          </div>
                      </a>
                      
                  </div>
                  <div class="links">
                      <a class="nav-link" href="/company/drivers">
                          <div class="link">
                              <i class="fa fa-id-card-o link-i-1"></i>
                              <span>Driver</span>
                          </div>
                      </a>
                  </div>
      
                  <div class="links">
                    <div class="link">
                        <i class="fa fa-history link-i-1"></i>
                        <span>Order History</span>
                    </div>
                  </div>
      
                  <div class="links">
                    <div class="link">
                        <i class="fa fa-envelope-o link-i-1"></i>
                        <span>Subscription</span>
                    </div>
                  </div>
                    </div>
        
        <!--             <div class="divider2">
                    </div> -->
        
                    <div class="link2">
                        <div class="links">
                            <div class="link">
                                <i class="fa fa-bell link-i-2"></i>
                                <span>Notifications</span>
                            </div>
                        </div>
                        
                        <div class="links">
                            <div class="link">
                                <i class="fa fa-envelope link-i-2"></i>
                                <span>Messages</span>
                            </div>
                        </div>
            
                        <div class="links">
                            <div class="link">
                                <i class="fa fa-plus link-i-2"></i>
                                <span>List Items</span>
                            </div>
                        </div>
            
                        <div class="links">
                          <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                              <div class="link">
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
            