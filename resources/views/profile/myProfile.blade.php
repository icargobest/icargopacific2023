<title> User | Profile</title>

@extends('layouts.app')
@include('partials.navigationUser', ['staff' => 'nav-selected'])

<link rel="stylesheet" href="{{ asset('css/profile.css') }}">

<main class="container" style="">
    <div class="mt-4">
        <h2 class="" style="border-bottom: 1px solid #adaeaf; padding-bottom: 5px; letter-spacing:1px;">MY PROFILE
        </h2>
    </div>
    <div class="mt-2">@include('flash-message')</div>
    <div class="profile-wrapper" style="">
        <div class="profileTab">
            <div class="profileBackground">
                <button type="button" class="profileIcon" style="border: 0px !important;" data-bs-toggle="modal"
                    data-bs-target="#editimage"><i class="fa fa-pencil "></i></button>
                <div class="profilePicture">
                    <img src="@if ($customer->photo != null) {{ asset('storage/' . $customer->photo) }} @else /img/default_dp.png @endif"
                        alt="Profile Image">
                </div>
            </div>
            <div class="profileData">
                <span class="profileName">{{ $user->name }}</span>
                <div class="profileDivider"></div>
                <span class="profilePosition">Customer</span>

                <div class="profileContact">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <span>
                        @if ($customer->contact_no != null)
                            {{ $customer->contact_no }}@else---
                        @endif
                    </span>
                </div>
                <div class="profileContact">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <span>{{ $user->email }}</span>
                </div>
                <div class="profileContact">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                    <?php
                    $facebookUrl = $customer->facebook;
                    $facebookName = '';
                    if (!empty($facebookUrl)) {
                        $parsedUrl = parse_url($facebookUrl);
                        $path = $parsedUrl['path'] ?? '';
                        $pathParts = explode('/', $path);
                        $facebookName = end($pathParts);
                    }
                    ?>
                    <span>{{ $facebookName }}</span>
                </div>

            </div>
        </div>

        <div class="profileInfo">

            <div class="profileContent">
                <div class="titleButton">
                    <h5 style="font-weight: bolder">Personal Information</h5>
                    <button type="button" class="profileButton" style="" data-bs-toggle="modal"
                        data-bs-target="#personalinfo">EDIT</button>
                </div>
                <div class="profileDivider2 "></div>
                <div class="profileInfoData">
                    <span class="data-title">Name</span>
                    <span class="data-content">{{ $user->name }}</span>
                    <span class="data-title">Mobile No.</span>
                    <span class="data-content">
                        @if ($customer->contact_no != null)
                            (+63) {{ $customer->contact_no }}@else---
                        @endif
                    </span>
                    <span class="data-title">Telephone</span>
                    <span class="data-content">
                        @if ($customer->tel != null)
                            {{ $customer->tel }}@else---
                        @endif
                    </span>
                    <span class="data-title">Email Address</span>
                    <span class="data-content">{{ $user->email }}</span>
                </div>
            </div>

            <div class="profileContent">
                <div class="titleButton">
                    <h5 style="font-weight: bolder">Address</h5>
                </div>
                <div class="profileDivider2 "></div>
                <div class="profileInfoData">
                    <span class="data-title">Street Name</span>
                    <span class="data-content">
                        @if ($customer->street != null)
                            {{ $customer->street }}@else---
                        @endif
                    </span>
                    <span class="data-title">City</span>
                    <span class="data-content">
                        @if ($customer->city != null)
                            {{ $customer->city }}@else---
                        @endif
                    </span>
                    <span class="data-title">State/Country</span>
                    <span class="data-content">
                        @if ($customer->state != null)
                            {{ $customer->state }}@else---
                        @endif
                    </span>
                    <span class="data-title">Postal Code</span>
                    <span class="data-content">
                        @if ($customer->postal_code != null)
                            {{ $customer->postal_code }}@else---
                        @endif
                    </span>
                </div>
            </div>

            <div class="profileContent">
                <div class="titleButton">
                    <h5 style="font-weight: bolder">Social</h5>
                </div>
                <div class="profileDivider2 "></div>
                <div class="profileInfoData">
                    <span class="data-title"><i class="fa fa-globe"></i> Website</span>
                    @if ($customer->website != null)
                        <a href="{{ $customer->website }}" target="_blank">
                    @endif
                    <span class="data-content">
                        @if ($customer->website != null)
                            {{ $customer->website }}@else---
                        @endif
                    </span>
                    @if ($customer->website != null)
                        </a>
                    @endif
                    <span class="data-title"><i class="fa fa-facebook"></i> Facebook</span>
                    @if ($customer->facebook != null)
                        <a href="{{ $customer->facebook }}" target="_blank">
                    @endif
                    <span class="data-content">
                        @if ($customer->facebook != null)
                            {{ $customer->facebook }}@else---
                        @endif
                    </span>
                    @if ($customer->facebook != null)
                        </a>
                    @endif
                    <span class="data-title"><i class="fa fa-linkedin"></i> LinkedIn</span>
                    @if ($customer->linkedin != null)
                        <a href="{{ $customer->linkedin }}" target="_blank">
                    @endif
                    <span class="data-content">
                        @if ($customer->linkedin != null)
                            {{ $customer->linkedin }}@else---
                        @endif
                    </span>
                    @if ($customer->linkedin != null)
                        </a>
                    @endif
                </div>
            </div>
            <div class="profileContent">
                <div class="titleButton">
                    <h5 style="font-weight: bolder">Joined At</h5>
                </div>
                <div class="profileDivider2"></div>
                <div class="profileInfoData">
                    <span class="data-title">Joined At</span>
                    <span class="data-content">{{ date('Y-m-d h:i:s A', strtotime($customer->created_at)) }}</span>
                    <span class="data-title">Updated At</span>
                    <span class="data-content">{{ date('Y-m-d h:i:s A', strtotime($customer->updated_at)) }}</span>
                </div>
            </div>
        </div>
    </div>
</main>

@include('profile.edit-modal')
@include('profile.imagemodal')
@include('partials.footer')

<style>
    .py-4 {
        padding-top: 0px !important;
        padding-bottom: 0px !important;
    }
</style>
