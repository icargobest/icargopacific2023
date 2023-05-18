<title>Company | Profile</title>

@extends('layouts.app') @include('partials.navigationCompany',['staff' =>
"nav-selected"])

<link rel="stylesheet" href="{{ asset('css/profile.css') }}" />

<main class="container" style="">
    <div class="mt-4">
        <h2
            class=""
            style="
                border-bottom: 1px solid #adaeaf;
                padding-bottom: 5px;
                letter-spacing: 1px;
            "
        >
            MY PROFILE
        </h2>
    </div>
    <div class="mt-2">@include('flash-message')</div>
    <div class="profile-wrapper" style="">
        <div class="profileTab">
            <div class="profileBackground">
                <button
                type="button"
                class="profileIcon"
                style="border: 0px !important"
                data-bs-toggle="modal"
                data-bs-target="#editimageCompany"
                >
                <i class="fa fa-pencil"></i>
                </button>
                <div class="profilePicture">
                    <img src="{{ asset($company->image 
                                ? 'storage/images/company/' . $company->user->id . '/' . $company->image 
                                : 'img/default_dp.png') }}"
                    alt="Profile Image">
                </div>
            </div>
            <div class="profileData">
                <span class="profileName">{{$company->user->name}}</span>
                <div class="profileDivider"></div>
                <span class="profilePosition">Company</span>

                <div class="profileContact">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <span>{{$company->contact_no}}</span>
                </div>

                <div class="profileContact">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <span>{{$company->user->email}}</span>
                </div>
            </div>
        </div>

        <div class="profileInfo">
            <div class="profileContent">
                <div class="titleButton">
                    <h5 style="font-weight: bolder">Personal Information</h5>
                    <button
                        type="button"
                        class="profileButton"
                        style=""
                        data-bs-toggle="modal"
                        data-bs-target="#editCompanyProfile"
                    >
                        EDIT
                    </button>
                </div>
                <div class="profileDivider2"></div>
                <div class="profileInfoData">
                    <span class="data-title">Name</span>
                    <span class="data-content">{{$company->user->name}}</span>
                    <span class="data-title">Mobile No.</span>
                    <span class="data-content">{{$company->contact_no}}</span>
                    <span class="data-title">Contact Name</span>
                    <span class="data-content">{{$company->contact_name}}</span>
                    <span class="data-title">Telephone</span>
                    <span class="data-content">{{$company->tel}}</span>
                    <span class="data-title">Email Address</span>
                    <span class="data-content">{{$company->user->email}}</span>
                </div>
            </div>

            <div class="profileContent">
                <div class="titleButton">
                    <h5 style="font-weight: bolder">Address</h5>
                </div>
                <div class="profileDivider2"></div>
                <div class="profileInfoData">
                    <span class="data-title">Street Name</span>
                    <span class="data-content">{{$company->street}}</span>
                    <span class="data-title">City</span>
                    <span class="data-content">{{$company->city}}</span>
                    <span class="data-title">State/Country</span>
                    <span class="data-content">{{$company->state}}</span>
                    <span class="data-title">Postal Code</span>
                    <span class="data-content">{{$company->postal_code}}</span>
                </div>
            </div>

            <div class="profileContent">
                <div class="titleButton">
                    <h5 style="font-weight: bolder">Social</h5>
                </div>
                <div class="profileDivider2"></div>
                <div class="profileInfoData">
                    <span class="data-title">Website</span>
                    <span class="data-content"
                        >{{$company->website ?? '-'}}</span
                    >
                    <span class="data-title">Facebook</span>
                    <span class="data-content">{{$company->facebook}}</span>
                    <span class="data-title">LinkedIn</span>
                    <span class="data-content"
                        >{{$company->linkedin ?? '-'}}</span
                    >
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
                        >{{$company->user->created_at}}</span
                    >
                    <span class="data-title">Updated At</span>
                    <span class="data-content">{{$company->updated_at}}</span>
                </div>
            </div>
        </div>
    </div>
</main>

@include('company.profile.edit') @include('company.profile.image')
@include('partials.footer')

<style>
    .py-4 {
        padding-top: 0px !important;
        padding-bottom: 0px !important;
    }
</style>
