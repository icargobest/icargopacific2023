<title>Dispatcher | Profile</title>

@extends('layouts.app')
@include('partials.navigationDispatcher')

<link rel="stylesheet" href="{{ asset('css/profile.css') }}">

<main class="container" style="">
    <div class="mt-4">
      <h2 class="" style="border-bottom: 1px solid #adaeaf; padding-bottom: 5px; letter-spacing:1px;">MY PROFILE</h3>
    </div>
    <div class="mt-2">@include('flash-message')</div>
    <div class="profile-wrapper" style="">

      @foreach ($dispatchers as $dispatcher)
      
        <div class="profileTab">
          <div class="profileBackground1">
            <button type="button" class="profileIcon" style="border: 0px !important;" data-bs-toggle="modal" data-bs-target="#editimage{{$dispatcher->id}}"><i class="fa fa-pencil "></i></button>
            <div class="profilePicture">
              <img src="@if ($dispatcher->image != null) {{ url('images/company/dispatchers/'.$dispatcher->image) }} @else /img/default_dp.png @endif" height="100" width="100" alt="">
            </div>
          </div>
          <div class="profileData">
            <span class="profileName">{{ $dispatcher->user->name }}</span>
            <div class="profileDivider"></div>
            <span class="profilePosition">Driver</span>

            <div class="profileContact">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <span>{{ $dispatcher->contact_no }}</span>
            </div>
            <div class="profileContact">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <span>{{ $dispatcher->user->email }}</span>
            </div>
          </div>
        </div>

        <div class="profileInfo">

              <div class="profileContent">
                <div class="titleButton">
                  <h5 style="font-weight: bolder">Personal Information</h5>
                  <button type="button" class="profileButton" style="" data-bs-toggle="modal" data-bs-target="#personalinfo{{$dispatcher->id}}">EDIT</button>
                </div>
                <div class="profileDivider2 "></div>
                  <div class="profileInfoData">
                    <span class="data-title">Name</span>
                    <span class="data-content">{{ $dispatcher->user->name }}</span>
                    <span class="data-title">Mobile No.</span>
                    <span class="data-content">(+63){{ $dispatcher->contact_no }}</span>
                    <span class="data-title">Tel No.</span>
                    <span class="data-content">{{ $dispatcher->tel }}</span>
                    <span class="data-title">Email Address</span>
                    <span class="data-content">{{ $dispatcher->user->email }}</span>
                  </div>
              </div>
              
              <div class="profileContent">
                  <div class="titleButton">
                    <h5 style="font-weight: bolder">Address</h5>
                  </div>
                  <div class="profileDivider2 "></div>
                    <div class="profileInfoData">
                      <span class="data-title">Bldg. No / Street Name</span>
                      <span class="data-content">{{ $dispatcher->street }}</span>
                      <span class="data-title">Province/City</span>
                      <span class="data-content">{{ $dispatcher->city }}</span>
                      <span class="data-title">Postal Code</span>
                      <span class="data-content">{{ $dispatcher->postal_code }}</span>
                      <span class="data-title">State/Country</span>
                      <span class="data-content">{{ $dispatcher->state }}</span>
                    </div>
              </div>

              <div class="profileContent">
                <div class="titleButton">
                  <h5 style="font-weight: bolder">Social</h5>
                </div>
                <div class="profileDivider2 "></div>
                  <div class="profileInfoData">
                    <i class="fa fa-facebook" aria-hidden="true">
                    <span class="data-content"><a href="{{ $dispatcher->facebook }}" target="_blank">{{ $dispatcher->facebook }}</a></span></i>
                    <i class="fa fa-linkedin" aria-hidden="true">
                    <span class="data-content"><a href="{{ $dispatcher->linkedin }}" target="_blank">{{ $dispatcher->linkedin ?? '-'}}</a></span></i>
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
                        >{{$dispatcher->user->created_at}}</span
                    >
                    <span class="data-title">Updated At</span>
                    <span class="data-content">{{$dispatcher->updated_at}}</span>
                </div>
            </div>


        </div>
    </div>
    @endforeach
</main>

@include('dispatcher_panel.profile.editmod1')
@include('dispatcher_panel.profile.imagemodal')
@include('partials.footer')	

<style>
.py-4
{
padding-top: 0px !important;
padding-bottom: 0px !important;
}

</style>

