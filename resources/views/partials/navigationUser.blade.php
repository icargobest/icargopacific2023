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
                        <a class="nav-link"href="{{ route('dashboard') }}">
                            <div class="link @if (isset($dashboard)) {{ $dashboard }} @endif">
                                <i class="fa fa-tachometer link-i-1"></i>
                                <span>Dashboard</span>
                            </div>
                        </a>
                    </div>
                    <div class="links">
                        <a class="nav-link" href="{{ route('userOrderPanel') }}">
                            <div class="link @if (isset($order)) {{ $order }} @endif">
                                <i class="bi bi-cart-plus-fill link-i-3"></i>
                                <span class="link-i-span">Order</span>
                            </div>
                        </a>
                    </div>
                    <div class="links">
                        <a class="nav-link" href="{{ route('orderHistory.user') }}">
                            <div class="link">
                                <i class="bi bi-cart-check-fill link-i-3"></i>
                                <span class="link-i-span">Order History </span>
                            </div>
                        </a>
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
