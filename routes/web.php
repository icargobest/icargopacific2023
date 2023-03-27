<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
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
    return view('login/index');
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
Route::get('/employees', function () {
    return view('employees/employees');
});

//DRIVER PAGE
Route::get('driver', ['uses' => 'App\Http\Controllers\QrScannerController@index']);
Route::post('driver', ['uses' => 'App\Http\Controllers\QrScannerController@checkUser']);

Route::get('/company', [CompanyController::class, 'index']);

Auth::routes();

//test
Route::get('/employees', [EmployeeController::class, 'index'])->name('EmployeePanel');


Route::post('/add_employee', [EmployeeController::class, 'addEmployee'])->name('addEmployee');

Route::get('/delete_employee/{id}', [EmployeeController::class, 'archiveEmployee'])->name
    ('archiveEmployee');

Route::get('/update_employee/{id}', [EmployeeController::class, 'updateEmployee'])->name
    ('updateEmployee');

Route::post('/save_updated_employee', [EmployeeController::class, 'saveUpdatedEmployee'])->name
    ('saveUpdatedEmployee');




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        /*Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

        /**
         * User Routes
         */
        /*Route::group(['prefix' => 'users'], function() {
            Route::get('/', 'UsersController@index')->name('users.index');
            Route::get('/create', 'UsersController@create')->name('users.create');
            Route::post('/create', 'UsersController@store')->name('users.store');
            Route::get('/{user}/show', 'UsersController@show')->name('users.show');
            Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
            Route::patch('/{user}/update', 'UsersController@update')->name('users.update');
            Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
        });

    });*/
