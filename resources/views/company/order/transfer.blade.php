@extends('layouts.app')
@include('partials.navigationCompany')

<head>
    {{-- <link rel="stylesheet" href="{{ asset('css/style_order.css') }}"> --}}
    <title>Orders</title>
    <style>
        #main-con{
            background-color: #E5E4E2 !important;
            padding-top: 25px;
            padding-bottom: 40px;
            padding-left: 10px;
        }
        #main-wrap{
            background-color: #F0EAD6 !important;
            max-height: 100%;
            max-width: 100%;
            margin-top: 20px;
            margin-bottom: 10px;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            border-bottom-right-radius: 10px;
            border-bottom-left-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
        #transfer-header{
            background-color: #214D94;
            color: white;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }
        #form-title{
            display: block;
        }
        #form-div{
            font-weight: 300;
        }
        #trans-btn{
            width: 50%;
            background-color: #214D94 !important;
        }
        #trans-btn :hover{
            background-color: white;
        }
        @media (min-width: 667px) {
            #main-wrap{
                width: 40%;
                margin: auto;
                justify-content: center;
                align-items: center;
            }
            /* #form-title{
                display: flex;
                flex-direction: column;
                
            } */
            #form-div{
                display: flex;
                flex-direction: column;
                
            }
            #trans-btn{
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<main class="container" id="main-con">
    <div class="main-wrapper" id="main-wrap">
            <div class="transfer-header-container pt-3 border border-2" id="transfer-header">
                <h3 class="ms-2">TRANSFER</h3>
            </div>
            <div class="ms-2 text-center" id="form-div">
                <form  method="POST" action="{{-- {{route('shipment.transfer')}} --}}">
                    @csrf
                    <input type="hidden" name="id" value="{{-- {{$shipments['id']}} --}}">
                    <div class="my-4">
                        <label class="form-label mb-0" for="trackingNum" id="form-title">Tracking Number:</label>
                        <input type="text" name="trackingNum" value="1656465151651{{--  {{$shipments['tracking_number']}} --}}" disabled>
                    </div>
                    <div class="my-4">
                        <label class="form-label mb-0" for="stationfromID" id="form-title">Transfer from Station#: </label>
                        <input type="text" name="stationfromID" value="56464645458{{-- {{$shipments['station_id']}} --}}" disabled>
                    </div>
                    <div class="my-4">
                        <label class="form-label mb-0" for="stationfromName" id="form-title">Station Name: </label>
                        <input type="text" name="stationfromName" value="SOC3{{-- {{$shipments['station_name']}} --}}" disabled>
                    </div>
                    <div class="my-4">
                        <label class="form-label mb-0" for="transferto_station_id" id="form-title">Transfer To:</label>
                        <input type="text" name="transferto_station_id" placeholder="Enter Station ID" required >
                    </div> 
                    <div class="my-4">
                        <label class="form-label mb-0" for="transferto_station" id="form-title">Station Name:</label>
                        <input type="text" name="transferto_station" placeholder="Enter Station Name" required >
                    </div>
                    <div class="text-center">
                    <button type="submit" class="btn btn-dark btn-sm" id="trans-btn">Transfer</button>
                    </div>
                </form>
            </div>
    </div>
</main>


@include('partials.footer')	