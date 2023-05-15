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
                            <a class="nav-link"href="/driver/dashboard">
                                <div class="link @if(isset($dashboard)){{$dashboard}}@endif">
                                    <i class="fa fa-tachometer link-i-1" ></i>
                                    <span>Dashboard</span>
                                </div>
                            </a>
                        </div>

                        <div class="links">
                            <a class="nav-link" href="{{ route('driver.order') }}">
                            <div class="link @if(isset($order)){{$order}}@endif">
                                <i class="fa fa-list link-i-1"></i>
                                <span>Order</span>
                            </div>
                            </a>
                        </div>
                        
                        <div class="links">
                            <a class="nav-link" href="{{ url('/driver/qr') }}">
                                <div class="link @if(isset($qr)){{$qr}}@endif">
                                    <i class="fa fa-qrcode link-i-1" ></i>
                                    <span>Qr Scanner</span>
                                </div>
                            </a>
                        </div>
                        <div class="links">
                            <a class="nav-link" href="/driver/history">
                                <div class="link @if(isset($history)){{$history}}@endif">
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
