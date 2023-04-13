<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>iCargo</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="{{ asset('assets\css\app.css') }}" type="text/css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/efac33293c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/main-header.css') }}">
    <link rel="stylesheet" href="/css/waybill-list.css" />


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<style scoped>
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
                <img src="img/Frame 1.png" alt="">
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
                    <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-lock"></i>Lock Accounts</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                            </form>
                </ul>
            </div>
            @endguest
        </div>
    </div> 
        <main class="py-4">
             @yield('content')
        </main>
</body>
</html>
