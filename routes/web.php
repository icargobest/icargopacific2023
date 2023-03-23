<?php

use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//Route::get();
//Route::post();
//Route::put();
//Route::patch();
//Route::delete();
//Route::any();
//Route::option();;

Route::get('/', [CompanyController::class, 'index']);

Route::get('/company', [CompanyController::class, 'index']);
