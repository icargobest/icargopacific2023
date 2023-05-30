<title>Staff | Profile</title>

@extends('layouts.app')
@include('partials.navigationStaff', ['staff' => 'nav-selected'])

<link rel="stylesheet" href="{{ asset('css/profile.css') }}">

<main class="container" style="">
    <div class="mt-4">
        <h2 class="" style="border-bottom: 1px solid #adaeaf; padding-bottom: 5px; letter-spacing:1px;">MY PROFILE
            </h3>
    </div>
    <div class="mt-2">@include('flash-message')</div>
    <div class="profile-wrapper" style="">
        <div class="profileTab">
            <div class="profileBackground">
                <button type="button" class="profileIcon" style="border: 0px !important;" data-bs-toggle="modal"
                    data-bs-target="#editimage"><i class="fa fa-pencil "></i></button>
                <div class="profilePicture">
                    <img src="@if ($staff->photo != null) {{ asset('storage/' . $staff->photo) }} @else /img/default_dp.png @endif"
                        alt="Profile Image">
                </div>
            </div>
            <div class="profileData">
                <span class="profileName">{{ $user->name }}</span>
                <div class="profileDivider"></div>
                <span class="profilePosition">Staff</span>

                <div class="profileContact">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <span>
                        @if ($staff->contact_no != null)
                            {{ $staff->contact_no }}@else---
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
                    $facebookUrl = $staff->facebook;
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
                        @if ($staff->contact_no != null)
                            (+63) {{ $staff->contact_no }}@else---
                        @endif
                    </span>
                    <span class="data-title">Telephone</span>
                    <span class="data-content">
                        @if ($staff->tel != null)
                            {{ $staff->tel }}@else---
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
                        @if ($staff->street != null)
                            {{ $staff->street }}@else---
                        @endif
                    </span>
                    <span class="data-title">City</span>
                    <span class="data-content">
                        @if ($staff->city != null)
                            {{ $staff->city }}@else---
                        @endif
                    </span>
                    <span class="data-title">State/Country</span>
                    <span class="data-content">
                        @if ($staff->state != null)
                            {{ $staff->state }}@else---
                        @endif
                    </span>
                    <span class="data-title">Postal Code</span>
                    <span class="data-content">
                        @if ($staff->postal_code != null)
                            {{ $staff->postal_code }}@else---
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
                    @if ($staff->website != null)
                        </a>
                    @endif
                    <span class="data-title"><i class="fa fa-facebook"></i> Facebook</span>
                    @if ($staff->facebook != null)
                        <a href="{{ $staff->facebook }}" target="_blank">
                    @endif
                    <span class="data-content">
                        @if ($staff->facebook != null)
                            {{ $staff->facebook }}@else---
                        @endif
                    </span>
                    @if ($staff->facebook != null)
                        </a>
                    @endif
                    <span class="data-title"><i class="fa fa-linkedin"></i> LinkedIn</span>
                    @if ($staff->linkedin != null)
                        <a href="{{ $staff->linkedin }}" target="_blank">
                    @endif
                    <span class="data-content">
                        @if ($staff->linkedin != null)
                            {{ $staff->linkedin }}@else---
                        @endif
                    </span>
                    @if ($staff->linkedin != null)
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
                    <span class="data-content">{{ date('Y-m-d h:i:s A', strtotime($staff->created_at)) }}</span>
                    <span class="data-title">Updated At</span>
                    <span class="data-content">{{ date('Y-m-d h:i:s A', strtotime($staff->updated_at)) }}</span>
                </div>
            </div>
        </div>
    </div>
</main>

@include('staff_panel.profile.edit-modal')
@include('staff_panel.profile.imagemodal')
@include('partials.footer')

<style>
    .py-4 {
        padding-top: 0px !important;
        padding-bottom: 0px !important;
    }
</style>
