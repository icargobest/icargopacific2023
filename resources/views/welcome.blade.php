
<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>iCargo Pacific</title>
        <link rel="shortcut icon" href="{{ asset('ICARGOicon.ico') }}">

        <!-- Fonts -->

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/css/curr-login.css">
        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>


        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

        
        <link rel="shortcut icon" href="{{ asset('ICARGOicon.ico') }}">

        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="{{ asset('assets\css\app.css') }}" type="text/css" rel="stylesheet">
        <!--Bootstrap CSS-->
        <link rel="stylesheet" href="/css/bootstrap.css">
        {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" /> --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
        <!-- MDB -->
        <link rel="stylesheet" href="/css/mdb.min.css" />
        <script src="https://kit.fontawesome.com/efac33293c.js" crossorigin="anonymous"></script>
        
        {{-- CSS --}}
        <link rel="stylesheet" href="{{ asset('css/main-header.css') }}">
        <link rel="stylesheet" href="{{ asset('css/employee.css') }}">
        <link rel="stylesheet" href="/css/waybill-list.css" />
        <link rel="stylesheet" href="{{ asset('css/style_landingPage.css') }}">


        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&family=Josefin+Sans:wght@600&family=Poppins:wght@200;300;600&display=swap" rel="stylesheet">
        
    </head>

    <style>
        li
        {
          list-style: none;
          margin: 0px 10px
        }
    </style>
        
    <body>
{{--  --}}
{{--         <h1>test</h1> --}}

<div class="header-container vw-100 shadow-sm">
    <div class="logo">
        <span>
            <img src="/img/Frame 1.png" alt="">
        </span>
    </div>

    <nav class="mobileNav shadow-sm">
        <i class="bi bi-list"></i>

        <div class="mobileNavlist shadow-sm">
            <ul>
                <div class="mainNav">
                    <a href="#Home"><li>Home</li></a> 
                    <a href="#Services"><li>Services</li></a> 
                    <a href="#Pricing"><li>Pricing</li></a> 
                    <a href="#contactUS"><li>Contact Us</li></a> 
                </div>
                
                <div class="accessNav">
                    {{-- @if (Route::has('login')) --}}
                    <li class="loginBtn border-top pt-3">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    {{-- @endif --}}

                    {{-- @if (Route::has('register')) --}}
                    <li class="registerBtn">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    {{-- @endif --}}
                </div>
                
            </ul>
        </div>
    </nav>

    

    
    <div class="user-container ">


        <nav class="navBar-menu">
            
            <li class="active"><a href="#Home">Home</a> </li>
            <li><a href="#Services">Services</a></li>
            <li><a href="#Pricing">Pricing</a> </li>
            <li><a href="#contactUS">Contact Us</a></li>
            
        </nav>
        
        {{-- @guest --}}

        <div class="accessBtns ">
            {{-- @if (Route::has('login')) --}}
            <li class="loginBtn">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            {{-- @endif --}}

            {{-- @if (Route::has('register')) --}}
            <li class="registerBtn">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            {{-- @endif --}}
        </div>

    </div>        

</div>
        {{-- @include('layouts.landingPageNav') --}}

        {{-- HERO SECTION --}}

        <div id="carouselExampleIndicators" class="carousel slide heroCarousel mt-5" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="/img/slide1.png" class="d-block w-100" alt="slide">
              </div>
              <div class="carousel-item">
                <img src="/img/slide2.png" class="d-block w-100" alt="slide">
              </div>
              <div class="carousel-item">
                <img src="/img/slide3.png" class="d-block w-100" alt="slide">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="imgControls" aria-hidden="true"><i class="bi bi-caret-left-fill"></i></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="imgControls" aria-hidden="true"><i class="bi bi-caret-right-fill"></i></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>

        {{-- <div class="hero-container mt-4 d-flex" id="Home">       
            <div class="text-wrapper w-100">
                <span>
                    <h1><span>HIGH QUALITY <span class="andText">AND</span></span> <span>RELIABLE</span></h1>
                    <h1 class="freightText">SOFTWARE SOLUTION</h1>
                </span>
                

                <p>With iCargo Pacific, you can rest assured that your freight delivery needs are in capable hands. Experience the difference that our expertise and commitment can make in your supply chain today!</p>

                <div class="button-holder">
                    <a href="#contactUS">
                        <button>CONTACT US</button>
                    </a>
                </div>
            </div>
        </div> --}}
        <div class="exploreBtn p-4 d-flex justify-content-center mt-2 mb-2">
            <a href="#Services"><button>EXPLORE ICARGO PACIFIC   <i class="bi bi-globe"></i></button></a>
        </div>
        
        {{-- END OF HERO SECTION --}}

        {{-- SERVICES --}}
        @include('services')

        {{-- PRICING --}}
        @include('pricing')

        {{-- CONTACT US --}}
        @include('contactus')

        {{-- FOOTER --}}
        <footer class="footerLandingPage p-5">
            <div class="footerNav container">
                <div class="row">
                    <div class="col d-flex justify-content-center mb-5">
                        <img src="/img/Frame 1.png" alt="iCargoLogo">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col d-flex justify-content-center">
                        <nav class="navBar-menu">
                            <ul class="d-flex gap-4 fw-bold">
                                <li><a href="#Home">Home</a> </li>
                                <li><a href="#Services">Services</a></li>
                                <li><a href="#Pricing">Pricing</a> </li>
                                <li><a href="#contactUS">Contact Us</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-12 d-flex flex-column pb-3 align-items-center gap-3">
                        <span class="fw-bold">Follow us in:</span>
                        <div class="socialIcons d-flex gap-5">
                            <a href="https://www.facebook.com/icargotech?mibextid=ZbWKwL" target="_blank"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-youtube"></i></a>
                            <a href="https://www.tiktok.com/@icargopacific" target="_blank"><i class="bi bi-tiktok" target="_blank"></i></a>
                            <a href="https://www.linkedin.com/company/icargopacific/" target="_blank"><i class="bi bi-linkedin"></i></a>
                        </div>
                        <div class="contactD d-flex flex-column gap-3 mt-4">
                            <h6 class="d-flex gap-3 align-items-center"><i class="bi bi-envelope-fill"></i><span class="fw-bold">techicargo@gmail.com</span></h6>
                            <h6 class="d-flex gap-3 align-items-center"><i class="bi bi-telephone-fill"></i><span class="fw-bold">+63 917 692 4203</span></h6>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 d-flex flex-column pb-3 align-items-center gap-3"">
                        <span class="fw-bold">In Partnership with:</span>
                        <div class="partnersIcons d-flex justify-content-center gap-5">
                            <img src="/img/lbc.png" alt="Logo">
                            <img src="/img/fedex.png" alt="Logo">
                            <img src="/img/jrslogo.png" alt="Logo">
                            <img src="/img/transportify.png" alt="Logo">
                            <img src="/img/apcargologo.png" alt="Logo">
                            <img src="/img/capex.png" alt="Logo">
                            

                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div class="container">
            <div class="foot row">
                <div class="col d-flex justify-content-center"><h6>2023 iCARGO PACIFIC. All Rights Reserve</h6></div>
            </div>
        </div>
        

        <script type="text/javascript">
            const menuBtn = document.querySelector(".mobileNav");
            const menuMobile = document.querySelector(".mobileNavlist");
            menuBtn.addEventListener('click', () => {
            menuMobile.classList.toggle("displayItem")
            });
        </script>   
        
        
        @include('partials.footer')	

    </body>
</html>
