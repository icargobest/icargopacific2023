<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    


    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="/css/bootstrap.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <!-- MDB -->
    <link rel="stylesheet" href="/css/mdb.min.css" />
    




    <script src="https://kit.fontawesome.com/efac33293c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/main-header.css') }}">
    <link rel="stylesheet" href="/css/waybill-list.css" />
    
    <title>Document</title>
</head>

<style>

</style>

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
                        <div class="link">
                            <i class="fa fa-gauge"></i>
                            <span>Dashboard</span>
                        </div>
                    </div>
                    <div class="links">
                        <div class="link">
                            <i class="fa fa-plus"></i>
                            <span>Create Waybill List</span>
                        </div>
                    </div>
                    <div class="links">
                        <div class="link">
                            <i class="fa fa-table"></i>
                            <span>Waybill List</span>
                        </div>
                    </div>
                    
                    <div class="links">
                        <div class="link">
                            <i class="fa fa-user"></i>
                            <span>Add. Freight Forwarding</span>
                        </div>
                    </div>
        
                    <div class="links">
                        <div class="link">
                            <i class="fa fa-user"></i>
                            <span>Transfer to Forwarding</span>
                        </div>
                    </div>
        
                    <div class="links">
                        <div class="link">
                            <i class="fa fa-user"></i>
                            <span>Employee</span>
                        </div>
                    </div>
                </div>
    
    <!--             <div class="divider2">
                </div> -->
    
                <div class="link2">
                    <div class="links">
                        <div class="link">
                            <i class="fa fa-bell"></i>
                            <span>Notifications</span>
                        </div>
                    </div>
                    
                    <div class="links">
                        <div class="link">
                            <i class="fa fa-envelope"></i>
                            <span>Messages</span>
                        </div>
                    </div>
        
                    <div class="links">
                        <div class="link">
                            <i class="fa fa-plus"></i>
                            <span>List Items</span>
                        </div>
                    </div>
        
                    <div class="links">
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
        <div class="header-container ">
            <div class="logo">
                <span>
                    <img src="img/Frame 1.png" alt="">
                </span>
            </div>

            <div class="user-container">
                <span class="spanUser">
                    Jhony Simpson James
            </span>
                
                <div class="button-container dropdown ">
                    <button class="userButton" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"  style="">
                            <span>Admin</span>
                    </button>
                    <ul class="header-dropdown dropdown-menu " aria-labelledby="dropdownMenuButton1">
                        <li class="d-flex align-items-center" style="height:30px; background-color:#D9D9D9; padding-left:10px; font-weight:bolder">Settings</li>
                        <li>
                            <span class="spanUser2">
                                Jhony Simpson James
                            </span>
                        </li>
                        <li><div class="dividerBlack1"></div></li>
                        
                        <li><a class="dropdown-item" href="#"><i class="fa fa-user"></i>Profile</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fa fa-gear"></i>Settings</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fa fa-credit-card"></i>Payments</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fa fa-folder-open"></i>Projects</a></li>
                        <li><div class="dividerBlack"></div></li>
                        <li><a class="dropdown-item" href="#"><i class="fa fa-lock"></i>Lock Accounts</a></li>

                    </ul>
                </div>
            </div>

        </div> 
        
      