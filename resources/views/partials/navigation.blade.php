<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="/css/bootstrap.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <!-- MDB -->
    <link rel="stylesheet" href="/css/mdb.min.css" />
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg sidebar-sm navbar-light bg-light">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>

      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navbar brand -->
        <a class="navbar-brand mt-2 mt-lg-0" href="#">
          <img
            src="/img/icargo-logo-1.jpg"
            height="30"
            alt="MDB Logo"
            loading="lazy"
          />
        </a>
        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li><input type="text" value="{{Auth::user()->name}}"disabled></li>
            @if(Auth::user()->type == 'user')
              <li class="nav-item">
                <a class="nav-link" href="/home">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if(isset($dashboard)){{$dashboard}}@endif" href="/dashboard">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if(isset($waybill)){{$waybill}}@endif" href="/waybill">Waybill</a>
              </li>
              @elseif(Auth::user()->type == 'company')
                <li class="nav-item">
                    <a class="nav-link" href="/company/dashboard">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link @if(isset($freight)){{$freight}}@endif" href="/freight">Freight</a>
                </li>
                <li class="nav-item">
                <li class="nav-item">
                    <a class="nav-link @if(isset($waybill)){{$waybill}}@endif" href="/waybill">Waybill</a>
                </li>
                    <a class="nav-link" href="">Dispatcher</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(isset($employee)){{$employee}}@endif" href="/employees">Employee</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link @if(isset($driver)){{$driver}}@endif" href="/driver">Driver</a>
                </li>
              @endif
        </ul>
        <!-- Left links -->
      </div>
      <!-- Collapsible wrapper -->

      <!-- Right elements -->
      <div class="d-flex align-items-center">
        <!-- Icon -->
        <a class="text-reset me-3" href="#">
            <i class="fas fa-bell"></i>
        </a>
        <a class="text-reset me-3" href="#">
          <i class="fas fa-list"></i>
        </a>

        <!-- Notifications -->
        <div class="dropdown">
          <a
            class="text-reset me-3 dropdown-toggle hidden-arrow"
            href="#"
            id="navbarDropdownMenuLink"
            role="button"
            data-mdb-toggle="dropdown"
            aria-expanded="false"
          >
            <i class="fas fa-envelope"></i>
            <span class="badge rounded-pill badge-notification bg-danger">1</span>
          </a>
          <ul
            class="dropdown-menu dropdown-menu-end"
            aria-labelledby="navbarDropdownMenuLink"
          >
            <li>
              <a class="dropdown-item" href="#">Some news</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Another news</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Something else here</a>
            </li>
          </ul>
        </div>






        <!-- Avatar -->
        <div class="dropdown">
          <a
            class="dropdown-toggle d-flex align-items-center hidden-arrow"
            href="#"
            id="navbarDropdownMenuAvatar"
            role="button"
            data-mdb-toggle="dropdown"
            aria-expanded="false"
          >
            <img
              src="https://static.displate.com/857x1200/displate/2020-08-20/caef8affe15b0147e9fb6eb59fd2ae79_2f8e1c0ad8bd2378c2e4a07103f6579d.jpg"
              class="rounded-circle"
              height="25"
              alt="Loli"
              loading="lazy"
            />
          </a>
          <ul
            class="dropdown-menu dropdown-menu-end"
            aria-labelledby="navbarDropdownMenuAvatar"
          >
            <li class="dropdown-header bg-light">
                <strong>Account</strong>
            </li>
            <li>
                <a href="/updates.html" class="dropdown-item">Updates</a>
            </li>
            <li>
                <a href="/messages.html" class="dropdown-item">Messages</a>
            </li>
            <li>
                <a href="/task.html" class="dropdown-item">Tasks</a>
            </li>
            <li>
                <a href="/comments.html" class="dropdown-item">Comments</a>
            </li>
            <li class="dropdown-header bg-light">
                <strong>Setting</strong>
            </li>
            <li>
                <a href="#" class="dropdown-item">My profile</a>
            </li>
            <li>
                <a href="#" class="dropdown-item">Settings</a>
            </li>
            <li>
                  <a href="#" class="dropdown-item">Payments</a>
            </li>
            <li>
                  <a href="#" class="dropdown-item">Projects</a>
            </li>
            <li class="dropdown-divider"></li>
            <li>
                  <a href="#" class="dropdown-item">Lock Account</a>
            </li>
            <li>
                <a href="./" class="dropdown-item">Logout</a>
            </li>
          </ul>
        </div>
      </div>
      <!-- Right elements -->
    </div>
    <!-- Navigation Container wrapper -->
  </nav>
