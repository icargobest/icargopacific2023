<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>iCargo</title>
    {{-- Login style --}}
    <link rel="stylesheet" href="/css/curr-login.css">
    {{-- bootstrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    {{-- POPPINS FONT --}}
    <link href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&family=Josefin+Sans:wght@600&family=Poppins:wght@200;300;600&display=swap" rel="stylesheet">

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
<style>
li
{
  list-style: none;
  margin: 0px 10px
}
</style>

<body>
    <div class="header-container">
        <div class="logo">
            <span>
                <img src="/img/Frame 1.png" alt="">
            </span>
        </div>


        
        <div class="user-container">
            
            @guest
            @if (Route::has('login'))
                <li class=" ">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @endif

            @if (Route::has('register'))
                <li class="">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif

            @else
           <a><span class="spanUser">
            {{ Auth::user()->name }}
            </span>
           </a>
            
            <div class="button-container dropdown ">
                <button class="userButton" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"  style="">
                        <span>Admin</span>
                </button>



                <ul class="header-dropdown dropdown-menu " aria-labelledby="dropdownMenuButton1">
                    <li class="d-flex align-items-center" style="height:30px; background-color:#D9D9D9; padding-left:10px; font-weight:bolder">Settings</li>
                    <li>
                        <a><span class="spanUser2">
                        {{ Auth::user()->name }}
                        </span>
                        </a>
                    </li>
                    <li><div class="dividerBlack1"></div></li>
                    
                    <li><a class="dropdown-item" href="#"><i class="fa fa-user"></i>Profile</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fa fa-gear"></i>Settings</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fa fa-credit-card"></i>Payments</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fa fa-folder-open"></i>Projects</a></li>
                    <li><div class="dividerBlack"></div></li>
                    
                    <li><a class="dropdown-item" href="#" data-mdb-toggle="modal" data-mdb-target="#confirmModal" ><i class="fa fa-lock"></i>{{ __('Lock Account') }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-lock"></i>Logout</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                            </form>
                </ul>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h4>Are you sure?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-mdb-dismiss="modal">Close</button>
                        <a href="{{ route('users.status.update', ['user_id' => auth()->user()->id, 'status_code' => 0]) }}" class="btn btn-danger">
                            Confirm
                        </a>
                    </div>
                  </div>
                </div>
            </div>
            @endguest
        </div>
    </div> 
        <main class="py-4">
             @yield('content')
        </main>

@include('partials.footer')	