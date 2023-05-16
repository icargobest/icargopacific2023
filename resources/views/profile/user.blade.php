<title>Company | Staff</title>

@extends('layouts.app')
@include('partials.navigationUser',['staff' => "nav-selected"])

<link rel="stylesheet" href="{{ asset('css/profile.css') }}">

<main class="container" style="">
    <div class="mt-4">
      <h2 class="" style="border-bottom: 1px solid #adaeaf; padding-bottom: 5px; letter-spacing:1px;">MY PROFILE</h3>
    </div>
    <div class="profile-wrapper" style="">

        <div class="profileTab">
          <div class="profileBackground">
            <button type="button" class="profileIcon" style="border: 0px !important;" data-bs-toggle="modal" data-bs-target="#editimage"><i class="fa fa-pencil "></i></button>
            <div class="profilePicture">
              <img src="@if($customer->photo != null) {{ asset('storage/photos/' . $customer->photo) }} @else https://cdn.donmai.us/original/a7/d9/__nakiri_ayame_and_nakiri_ayame_hololive_drawn_by_kakinotane_e__a7d97d0312f20a4f5a65126d16c87caf.jpg @endif" alt="HTML tutorial">
            </div>
          </div>
          <div class="profileData">
            <span class="profileName">{{$user->name}}</span>
            <div class="profileDivider"></div>
            <span class="profilePosition">Customer</span>

            <div class="profileContact">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <span>{{$customer->mobile}}</span>
            </div>
            <div class="profileContact">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <span>{{$user->email}}</span>
            </div>
            <div class="profileContact">
              <i class="fa fa-facebook" aria-hidden="true"></i>
              <span>{{$customer->facebook}}</span>
            </div>
          </div>
        </div>

        <div class="profileInfo">

              <div class="profileContent">
                <div class="titleButton">
                  <h5 style="font-weight: bolder">Personal Information</h5>
                  <button type="button" class="profileButton" style="" data-bs-toggle="modal" data-bs-target="#personalinfo">EDIT</button>
                </div>
                <div class="profileDivider2 "></div>
                  <div class="profileInfoData">
                    <span class="data-title">Name</span>
                    <span class="data-content">{{$user->name}}</span>
                    <span class="data-title">Mobile No.</span>
                    <span class="data-content">(+63) {{$customer->mobile}}</span>
                    <span class="data-title">Telephone</span>
                    <span class="data-content">{{$customer->tel}}</span>
                    <span class="data-title">Email Address</span>
                    <span class="data-content">{{$user->email}}</span>
                  </div>
              </div>

              <div class="profileContent">
                  <div class="titleButton">
                    <h5 style="font-weight: bolder">Address</h5>
                    <button type="button" class="profileButton" style="" data-bs-toggle="modal" data-bs-target="#address">EDIT</button>
                  </div>
                  <div class="profileDivider2 "></div>
                    <div class="profileInfoData">
                      <span class="data-title">Street Name</span>
                      <span class="data-content">{{$customer->street}}</span>
                      <span class="data-title">City</span>
                      <span class="data-content">{{$customer->city}}</span>
                      <span class="data-title">State/Country</span>
                      <span class="data-content">{{$customer->state}}</span>
                      <span class="data-title">Postal Code</span>
                      <span class="data-content">{{$customer->postal_code}}</span>
                    </div>
              </div>

              <div class="profileContent">
                <div class="titleButton">
                  <h5 style="font-weight: bolder">Social</h5>
                  <button type="button" class="profileButton" style="" data-bs-toggle="modal" data-bs-target="#social">EDIT</button>
                </div>
                <div class="profileDivider2 "></div>
                  <div class="profileInfoData">
                    <span class="data-title"><i class="fa fa-facebook"></i> Facebook</span>
                    {{-- <a href="https://www.facebook.com/{{$customer->facebook}}" target="_blank">--}}<span class="data-content">{{$customer->facebook}}</span>{{--</a>--}}
                    <span class="data-title"><i class="fa fa-twitter"></i> Twitter</span>
                    {{-- <a href="https://www.twitter.com/{{$customer->twitter}}" target="_blank">--}}<span class="data-content">{{$customer->twitter}}</span>{{--</a>--}}
                    <span class="data-title"><i class="fa fa-instagram"></i> Instagram</span>
                    {{-- <a href="https://www.instagram.com/{{$customer->instagram}}" target="_blank">--}}<span class="data-content">{{$customer->instagram}}</span>{{--</a>--}}
                    <span class="data-title"><i class="fa fa-linkedin"></i> LinkedIn</span>
                    {{-- <a href="https://www.linkedin.com/in/{{$customer->linkedin}}" target="_blank">--}}<span class="data-content">{{$customer->linkedin}}</span>{{--</a>--}}
                  </div>
              </div>
        </div>
    </div>
</main>

@include('profile.editmod1')
@include('profile.editmod2')
@include('profile.editmod3')
@include('profile.imagemodal')
@include('profile.companymodal')
@include('partials.footer')

<style>
.py-4
{
padding-top: 0px !important;
padding-bottom: 0px !important;
}

</style>

