<title>Driver | Profile</title>

@extends('layouts.app')
@include('partials.navigationDriver')

<link rel="stylesheet" href="{{ asset('css/profile.css') }}">

<main class="container" style="">
    <div class="mt-4">
      <h2 class="" style="border-bottom: 1px solid #adaeaf; padding-bottom: 5px; letter-spacing:1px;">MY PROFILE</h3>
    </div>
    <div class="mt-2">@include('flash-message')</div>
    <div class="profile-wrapper" style="">

      @foreach ($drivers as $driver)
      
        <div class="profileTab">
          <div class="profileBackground1">
            <button type="button" class="profileIcon" style="border: 0px !important;" data-bs-toggle="modal" data-bs-target="#editimage{{$driver->id}}"><i class="fa fa-pencil "></i></button>
            <div class="profilePicture">
              <img src="{{ url('uploads/drivers/'.$driver->profile_image) }}" height="100" width="100" alt="">
            </div>
          </div>
          <div class="profileData">
            <span class="profileName">{{ $driver->user->name }}</span>
            <div class="profileDivider"></div>
            <span class="profilePosition">Driver</span>

            <div class="profileContact">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <span>{{ $driver->contact_no }}</span>
            </div>
            <div class="profileContact">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <span>{{ $driver->user->email }}</span>
            </div>
          </div>
        </div>

        <div class="profileInfo">

              <div class="profileContent">
                <div class="titleButton">
                  <h5 style="font-weight: bolder">Personal Information</h5>
                  <button type="button" class="profileButton" style="" data-bs-toggle="modal" data-bs-target="#personalinfo{{$driver->id}}">EDIT</button>
                </div>
                <div class="profileDivider2 "></div>
                  <div class="profileInfoData">
                    <span class="data-title">Name</span>
                    <span class="data-content">{{ $driver->user->name }}</span>
                    <span class="data-title">Mobile No.</span>
                    <span class="data-content">(+63){{ $driver->contact_no }}</span>
                    <span class="data-title">Email Address</span>
                    <span class="data-content">{{ $driver->user->email }}</span>
                    <span class="data-title">License Number</span>
                    <span class="data-content">{{ $driver->license_number }}</span>
                    <span class="data-title">Plate Number</span>
                    <span class="data-content">{{ $driver->plate_no }}</span>
                    <span class="data-title">Vehicle Type</span>
                    <span class="data-content">{{ $driver->vehicle_type }}</span>
                  </div>
              </div>
              
              <div class="profileContent">
                  <div class="titleButton">
                    <h5 style="font-weight: bolder">Address</h5>
                  </div>
                  <div class="profileDivider2 "></div>
                    <div class="profileInfoData">
                      <span class="data-title">Bldg. No / Street Name</span>
                      <span class="data-content">{{ $driver->addr_street }}</span>
                      <span class="data-title">Province/City</span>
                      <span class="data-content">{{ $driver->addr_city }}</span>
                      <span class="data-title">Zip Code</span>
                      <span class="data-content">{{ $driver->addr_zipcode }}</span>
                      <span class="data-title">State/Country</span>
                      <span class="data-content">{{ $driver->addr_country }}</span>
                    </div>
              </div>


        </div>
    </div>
    @endforeach
</main>

@include('driver_panel.profile.editmod1')
@include('driver_panel.profile.imagemodal')
@include('partials.footer')	

<style>
.py-4
{
padding-top: 0px !important;
padding-bottom: 0px !important;
}

</style>

