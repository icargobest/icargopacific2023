<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// LOGIN PAGE
Route::get('/', function () {
    return view('random');
});

// REGISTER ACCOUNT PAGE
Route::get('/register', function () {
    return view('login/register');
});

// FORGOT PASSWORD PAGE
Route::get('/forgot-password', function () {
    return view('login/forgot-password');
});

// DASHBOARD PAGE
Route::get('/dashboard', function () {
    return view('dashboard/dashboard');
});

// WAYBILL PAGE
Route::get('/waybill', function () {
    return view('waybill/waybill');
});

//VIEW WAYBILL INFORMATION PAGE
Route::get('/waybill/viewinformation', function () {
    return view('waybill/waybillInformation');
});

//FREIGHT PAGE
Route::get('/freight', function () {
    return view('freight/freight');
});

//EMPLOYEE PAGE
Route::get('/employee', function () {
    return view('employee/employee');
});

//DRIVER PAGE
Route::get('/driver', function () {
    return view('driver/driver');
});
