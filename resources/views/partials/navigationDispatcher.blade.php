<body>
    <div class="main-container">
        <div class="sidebar">
            <div class="wrapper">
                <div class="search-bar-container">
                    <form action="{{ url('/dispatcher/track_parcel') }}" method="GET">
                        <div class="search-input-wrapper">
                            <button class="search-bar-button"><i class="fa-solid fa-magnifying-glass"></i></button>
                            <input class="input" name="tracking_number" placeholder="Tracking ID">
                        </div>
                    </form>
                </div>
                <div class="divider">
                </div>
                <div class="links-wrapper">
                    <div class="link1">

                        <div class="links">
                            <a class="nav-link"href="/dispatcher/dashboard">
                                <div class="link @if (isset($dashboard)) {{ $dashboard }} @endif">
                                    <i class="fa fa-tachometer link-i-1"></i>
                                    <span>Dashboard</span>
                                </div>
                            </a>
                        </div>
                        <div class="links">
                            <a class="nav-link" href="{{ url('/dispatcher/track_parcel') }}">
                                <div class="link @if (isset($qr)) {{ $qr }} @endif">
                                    <i class="fa fa-qrcode link-i-1"></i>
                                    <span>Qr Scanner</span>
                                </div>
                            </a>
                        </div>
                        <div id="toggle-icon" class="links">
                            <div class="link "style="display: flex;justify-content: space-between;">
                                <i class="fa fa-history link-i-1"><span>Order</span></i>
                                <i id="" class="bx bxs-chevron-down"></i>
                            </div>
                        </div>
                        <div id="toggle-div1" class="links none">
                            <a class="nav-link" href="{{route('toPickUp_view')}}">
                                <div class="link ">
                                    <i class="fa fa-truck-ramp-box link-i-1 ml-30px"></i>
                                    <span>To Pick-Up </span>
                                </div>
                            </a>
                        </div>

                        <div id="toggle-div2" class="links none">
                            <a class="nav-link" href="{{route('toDispatch_view')}}">
                                <div class="link">
                                    <i class="fa fa-truck-arrow-right link-i-1 ml-30px"></i>
                                    <span>To Dispatch</span>
                                </div>
                            </a>
                        </div>
                        <div class="links">
                            <a class="nav-link" href="/dispatcher/history">
                                <div class="link @if (isset($history)) {{ $history }} @endif">
                                    <i class="fa fa-history link-i-1"></i>
                                    <span>History</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!--             <div class="divider2">
                    </div> -->

                <div class="links bottom-nav">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
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
