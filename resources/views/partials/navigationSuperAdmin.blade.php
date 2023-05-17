<header>
    
    <style>
       svg {
            width: 1.5rem;
            height: 1.5rem;
        }
    </style>
    </header>
    <div class="main-container">
                <div class="sidebar">
                    <div class="wrapper">
                        <div class="search-bar-container">
                            <button class="search-bar-button">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                            <input
                                class="input"
                                id="search-input"
                                placeholder="Tracking ID"
                            />
                        </div>
    
                        <div class="divider"></div>
    
                        <div class="links-wrapper">
                            <div class="link1">
                                <div class="links">
                                    <a class="nav-link" href="/icargo/dashboard">
                                        <div class="link @if (isset($dashboard)) {{ $dashboard }} @endif" >
                                            <i class="fa fa-tachometer link-i-1"></i>
                                            <span>Dashboard</span>
                                        </div>
                                    </a>
                                </div>
    
                                <div class="links">
                                    <a class="nav-link" href="{{route('registered_users.view')}}">
                                        <div class="link @if (isset($register)) {{ $register }} @endif">
                                            <i class="fa fa-user-plus link-i-1"></i>
                                            <span>Registered Users</span>
                                        </div>
                                    </a>
                                </div>
    
                                <div class="links">
                                    <a class="nav-link" href="{{route('companies.index')}}">
                                        <div class="link @if (isset($companies)) {{ $companies }} @endif">
                                            <i class="fa fa-building-o link-i-1"></i>
                                            <span>Companies</span>
                                        </div>
                                    </a>
                                </div>
    
                                <div class="links">
                                    <a class="nav-link" href="{{route('customers.index')}}">
                                        <div class="link @if (isset($customers)) {{ $customers }} @endif">
                                            <i class="fa fa-address-card-o link-i-1"></i>
                                            <span>Customers</span>
                                        </div>
                                    </a>
                                </div>
    
                                <div class="links">
                                    <a class="nav-link" href="">
                                        <div class="link @if (isset($Commisions)) {{ $Commisions }} @endif">
                                            <i class="fa fa-table link-i-1"></i>
                                            <span>Commisions</span>
                                        </div>
                                    </a>
                                </div>
                                
                                <div class="links">
                                    <a class="nav-link" href="">
                                        <div class="link @if (isset($Subscription)) {{ $Subscription }} @endif">
                                            <i class="fa fa-credit-card link-i-1"></i>
                                            <span>Subscription</span>
                                        </div>
                                    </a>
                                </div>
    
                                <div class="links">
                                    <a class="nav-link" href="{{route('show.queries')}}">
                                        <div class="link @if (isset($queries)) {{ $queries}} @endif">
                                            <i class="fa fa-question-circle-o link-i-1"></i>
                                            <span>Queries</span>
                                        </div>
                                    </a>
                                </div>
    
                            </div>
    
    
    
    
                            <div class="links bottom-nav">
                                <div class="link">
                                    <i class="fa fa-sign-out"></i>
                                    <span>Logout</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="content-container">
    