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
              <img src="{{ url('images/company/drivers/'.$driver->image) }}" height="100" width="100" alt="">
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
                    <span class="data-title">Tel No.</span>
                    <span class="data-content">{{ $driver->tel }}</span>
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
                      <span class="data-content">{{ $driver->street }}</span>
                      <span class="data-title">Province/City</span>
                      <span class="data-content">{{ $driver->city }}</span>
                      <span class="data-title">Postal Code</span>
                      <span class="data-content">{{ $driver->postal_code }}</span>
                      <span class="data-title">State/Country</span>
                      <span class="data-content">{{ $driver->state }}</span>
                    </div>
              </div>

              <div class="profileContent">
                <div class="titleButton">
                  <h5 style="font-weight: bolder">Social</h5>
                </div>
                <div class="profileDivider2 "></div>
                  <div class="profileInfoData">
                    <i class="fa fa-facebook" aria-hidden="true">
                    <span class="data-content"><a href="{{ $driver->facebook }}" target="_blank">{{ $driver->facebook }}</a></span></i>
                    <i class="fa fa-linkedin" aria-hidden="true">
                    <span class="data-content"><a href="{{ $driver->linkedin }}" target="_blank">{{ $driver->linkedin ?? '-'}}</a></span></i>
                  </div>
              </div>

              <div class="profileContent">
                <div class="titleButton">
                    <h5 style="font-weight: bolder">Joined At</h5>
                </div>
                <div class="profileDivider2"></div>
                <div class="profileInfoData">
                    <span class="data-title">Joined At</span>
                    <span class="data-content"
                        >{{$driver->user->created_at}}</span
                    >
                    <span class="data-title">Updated At</span>
                    <span class="data-content">{{$driver->updated_at}}</span>
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

