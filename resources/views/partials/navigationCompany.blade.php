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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

    {{--  BOX ICON --}}
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- MDB -->
    <link rel="stylesheet" href="/css/mdb.min.css" />
    <script src="https://kit.fontawesome.com/efac33293c.js" crossorigin="anonymous"></script>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/main-header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/employee.css') }}">
    <link rel="stylesheet" href="{{ asset('css/driver&dispatcher.css') }}">
    <link rel="stylesheet" href="/css/waybill-list.css" />

    {{-- ICONS --}}
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

                            <a class="nav-link" href="/company/dashboard">
                                <div class="link @if (isset($dashboard)) {{ $dashboard }} @endif">
                                    <i class="fa fa-tachometer link-i-1"></i>
                                    <span>Dashboard</span>
                                </div>
                            </a>

                        </div>
                        <div class="links">
                            <a class="nav-link" href="{{ route('company.order') }}">
                                <div class="link @if (isset($order)) {{ $order }} @endif">
                                    <i class="fa fa-list link-i-1"></i>
                                    <span>Order</span>
                                </div>
                            </a>
                        </div>

                        <div class="links">
                            <a class="nav-link" href="{{ route('orderHistory_Company') }}">
                                <div class="link @if (isset($history)) {{ $history }} @endif">
                                    <i class="fa fa-history link-i-1"></i>
                                    <span>Order History</span>
                                </div>
                            </a>
                        </div>

                        <div class="links">
                            <a class="nav-link" href="{{ route('freightPanel') }}">
                                <div class="link  @if (isset($freight)) {{ $freight }} @endif">
                                    <i class="fa fa-truck link-i-1"></i>
                                    <span>Freight</span>
                                </div>
                            </a>
                        </div>

                        <div class="links">
                            <a class="nav-link" href="{{ route('company.advFreightPanel') }}">
                                <div class="link @if (isset($advance)) {{ $advance }} @endif">
                                    <i class="fa fa-forward link-i-1"></i>
                                    <span>Adv. Freight Forwarding</span>
                                </div>
                            </a>
                        </div>




                        <div class="links">
                            <a class="nav-link" href="/company/stations">
                                <div class="link @if (isset($station)) {{ $station }} @endif">
                                    <i class="fa fa-charging-station link-i-1"></i>
                                    <span>Stations</span>
                                </div>
                            </a>
                        </div>

                        <div id="toggle-icon" class="links">
                            <div class="link "style="display: flex;justify-content: space-between;">
                                <i class="fa fa-history link-i-1"><span>Employees</span></i>
                                <i id="" class="bx bxs-chevron-down"></i>
                            </div>
                        </div>
                        <div id="toggle-div1" class="links none">
                            <a class="nav-link" href="/company/staff">
                                <div class="link @if (isset($staff)) {{ $staff }} @endif">
                                    <i class="fa fa-user link-i-1 ml-30px"></i>
                                    <span>Staff </span>
                                </div>
                            </a>
                        </div>

                        <div id="toggle-div2" class="links none">
                            <a class="nav-link" href="/company/dispatcher">
                                <div class="link  @if (isset($dispatcher)) {{ $dispatcher }} @endif">
                                    <i class="fa fa-id-card link-i-1 ml-30px"></i>
                                    <span>Dispatcher</span>
                                </div>
                            </a>
                        </div>

                        <div id="toggle-div3" class="links none">
                            <a class="nav-link" href="/company/drivers ">
                                <div class="link @if (isset($drivers)) {{ $drivers }} @endif">
                                    <i class="fa fa-id-card-o link-i-1 ml-30px"></i>
                                    <span>Driver</span>
                                </div>
                            </a>
                        </div>

                        <div class="links">
                            <a class="nav-link" href="/company/subscriptions/plans">
                                <div class="link">
                                    <i class="fa fa-credit-card link-i-1"></i>
                                    <span>Subscription</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="links bottom-nav">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <div class="link ">
                                <i class="fa fa-sign-out"></i>
                                <span>Logout</span>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </a>

                        {{-- Dropdown TRIAL --}}


                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="content-container">
