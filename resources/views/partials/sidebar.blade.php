@extends('partials.header')

<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .sidebar{
        position: absolute;
        top: 0;
        left: 0;
        height: 100vh;
        width: 80px;
        background-color: #12171e;
        padding: .4rem .8rem;
        transition: all 0.5s ease;
    }

    .sidebar.active{
        width: 200px;
    }

    .sidebar #btn{
        position: absolute;
        color: #fff;
        top: .4rem;
        left: 50%;
        font-size: 1.2rem;
        line-height: 50px;
        transform: translateX(-50%);
        cursor: pointer;
    }

    .sidebar.active #btn{
        left: 90%;
    }

    .sidebar ul li p{
        opacity: 0;
      }

      .sidebar.active ul li p{
        opacity: 1;
      }

    .sidebar .top .logo{
        color: #fff;
        height: 150px;
        width: 170px;
        display: flex;
        align-items: center;
        pointer-events: none;
        opacity: 0;
    }

    .sidebar.active .top .logo{
        opacity: 1;
        transition: all 0.5s ease;
    }

    .bold{
        font-weight: 600;
    }

    .sidebar ul li{
        position: relative;
        list-style-type: none;
        height: 50px;
        width: 90%;
        margin: 0.8rem auto;
        line-height: 50px;
    }

    .sidebar ul li img{
        height: 50px;
        width: 50px;
        margin-top: -100px;
        opacity: 1;
        transition: all 0.5s ease;
    }

    .sidebar.active ul li img{
        opacity: 0;
    }

    .sidebar ul li a{
        color: #fff;
        display: flex;
        align-items: center;
        text-decoration: none;
        border-radius: 0.8rem;
    }

    .sidebar ul li a:hover{
        background-color: #fff;
        color: #12171e;
    }

    .sidebar ul li a i{
        text-align: center;
        height: 50px;
        border-radius: 12px;
        line-height: 50px;
    }

    .sidebar .nav-item {
        opacity: 0;
    }

    .sidebar.active .nav-item{
        opacity: 1;
    }

    .sidebar ul li .tooltip{
        position: absolute;
        left: 125px;
        top: 50%;
        transform: translate(-50%, -50%);
        box-shadow: 0 0.5rem 0.8rem rgba(0, 0, 0, 0.2);
        border-radius: .6rem;
        padding: .4rem 1.2rem;
        line-height: 1.8rem;
        z-index: 20;
        opacity: 0;
    }

    .sidebar ul li:hover .tooltip{
        opacity: 1;
    }

    .sidebar.active ul li .tooltip{
        display: none;
    }

    .main-content {
        position: relative;
        background-color: #eee;
        min-height: 100vh;
        top: 0;
        left: 80px;
        transition: all 0.5s ease;
        width: calc(100% - 80px);
        padding: 1rem;
    }

    .container{
        display: flex;
        justify-content: space-between;
    }

    @media only screen and (max-width: 768px) {
    .sidebar {
    width: 100%;
    }
    .sidebar.active {
    width: 100%;
    }
    .sidebar.active #btn {
    left: 95%;
    }
    .main-content {
    left: 0;
    width: 100%;
    }
    }

    /* Media query for screens smaller than 576px */
    @media screen and (max-width: 575px) {
      .sidebar {
        width: 100%;
        padding: .4rem;
        transition: none;
        position: static;
        height: auto;
      }

      .sidebar.active {
        width: 100%;
      }

      .sidebar #btn {
        left: 0;
        top: 0;
        font-size: 1.4rem;
        line-height: normal;
        transform: none;
      }

      .sidebar.active #btn {
        left: 90%;
      }

      .sidebar ul li {
        height: auto;
        margin: 0.4rem 0;
        text-align: center;
      }

      .sidebar ul li img {
        height: 30px;
        width: 30px;
        margin-top: 0;
      }

      .sidebar ul li a {
        display: block;
        border-radius: 0;
        padding: 0.8rem;
      }

      .sidebar ul li a i {
        min-width: 30px;
        height: 30px;
        line-height: 30px;
      }

      .sidebar ul li .tooltip {
        display: none;
      }

      .main-content {
        left: 0;
        width: 100%;
        padding: 0.4rem;
      }

      .container {
        flex-direction: column;
      }
    }

    /* Media query for screens between 576px and 767px */
    @media screen and (min-width: 576px) and (max-width: 767px) {
      .sidebar {
        width: 120px;
        padding: .4rem .8rem;
      }

      .sidebar.active {
        width: 250px;
      }

      .sidebar #btn {
        font-size: 1.4rem;
        line-height: normal;
      }

      .sidebar.active #btn {
        left: 90%;
      }

      .sidebar ul li {
        height: auto;
        margin: 0.4rem 0;
        text-align: center;
      }

      .sidebar ul li img {
        height: 40px;
        width: 40px;
        margin-top: 0;
      }

      .sidebar ul li a {
        display: block;
        border-radius: 0;
        padding: 0.8rem;
      }

      .sidebar ul li a i {
        min-width: 40px;
        height: 40px;
        line-height: 40px;
      }

      .main-content {
        left: 120px;
        width: calc(100% - 120px);
        padding: 0.8rem;
      }
    }
</style>

  <div class="sidebar">
      <div class="top">
          <div class="logo">
              <img src="../../../public/img/icargo.png" alt="" class="logo">
          </div>
          <i class="fa fa-bars" id="btn"></i>
      </div>
      <ul>
          <img src="../../../public/img/icargo.png" alt="" class="logo"></li>
          <li><a href=""><i class="fas fa-dashboard"></i><span class="nav-item">Dashboard</a><span class="tooltip">Dashboard</span></li>
          @if(Auth::user()->type == '1' || Auth::user()->type == '2')
          <li><a href=""><i class="fas fa-user-tie"></i><span class="nav-item">Admin</a><span class="tooltip">Admin</span></li>
          <li><a href=""><i class="fas fa-address-card"></i><span class="nav-item">Employees</a><span class="tooltip">Employees</span></li>
          <li><a href=""><i class="fas fa-envelope"></i><span class="nav-item">Feedbacks</span></a><span class="tooltip">Feedbacks</span></li>
          @endif
          <li><a href="{{route('waybillPanel')}}"><i class="fas fa-truck"></i><span class="nav-item">Transactions</span></a><span class="tooltip">Transactions</span></li>
          <li><a href="" class="logout"><i class="fas fa-power-off"></i><span class="nav-item">Logout</span></a></li>
          @if(Auth::user()->type == '0' || Auth::user()->type == '1' || Auth::user()->type == '2')
          <li><p>Logged in as:</p><p>{{Auth::user()->name}}</p></li>
          @endif
      </ul>
  </div>

  <script>
      let btn = document.querySelector('#btn')
      let sidebar = document.querySelector('.sidebar')

      btn.onclick = function () {
          sidebar.classList.toggle('active');
      };
  </script>
