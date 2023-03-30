<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DriverController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanController;


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
// Route::get('/', function () {
//     return view('login/index');
// });

// // REGISTER ACCOUNT PAGE
// Route::get('/register', function () {
//     return view('login/register');
// });



Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

// company account registration
Route::get('/registerCompany', function () {
    return view('/registerCompany');
});
Route::post('/store', [CompanyController::class, 'store']);

// User/Customer Routes
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])
    ->name('dashboard')->middleware('verified');
});

// Company Routes
Route::middleware(['auth', 'user-access:company'])->group(function () {
    Route::get('/company/dashboard', [HomeController::class, 'companyDashboard'])
    ->name('company.dashboard')->middleware('verified');
});  

// Super Admin Routes
Route::middleware(['auth', 'user-access:super-admin'])->group(function () {
    Route::get('/super-admin/dashboard', [HomeController::class, 'superAdminDashboard'])
    ->name('super.admin.dashboard')->middleware('verified');
});

// Driver Routes
Route::middleware(['auth', 'user-access:driver'])->group(function () {
    Route::get('/driver/dashboard', [HomeController::class, 'driverDashboard'])
    ->name('driver.dashboard')->middleware('verified');
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

//DRIVER PANEL
Route::resource('drivers', DriverController::class);
Route::get('/drivers/delete/{id}', [DriverController::class, 'destroy'])->name('drivers.delete');
Route::get('ArchivedUser',[DriverController::class, 'viewArchive'])->name('drivers.viewArchive');
Route::get('/drivers/archive/{id}',[DriverController::class, 'archive'])->name('drivers.archive');
Route::get('/drivers/unarchive/{id}',[DriverController::class, 'unarchive'])->name('drivers.unarchive');


Route::get('/company', [CompanyController::class, 'index']);

// Auth::routes();

//test
Route::get('/employees', [EmployeeController::class, 'index'])->name('EmployeePanel');


Route::post('/add_employee', [EmployeeController::class, 'addEmployee'])->name('addEmployee');

Route::get('/delete_employee/{id}', [EmployeeController::class, 'archiveEmployee'])->name
    ('archiveEmployee');

Route::get('/update_employee/{id}', [EmployeeController::class, 'updateEmployee'])->name
    ('updateEmployee');

Route::post('/save_updated_employee', [EmployeeController::class, 'saveUpdatedEmployee'])->name
    ('saveUpdatedEmployee');



// Plan Controller / Monthly Subscription Routes
Route::middleware("auth")->group(function() {
    Route::get('plans',[PlanController::class,'index']);
    Route::get('plans/{plan}', [PlanController::class, 'show'])->name("plans.show");
    Route::post('subscription', [PlanController::class, 'subscription'])->name("subscription.create");
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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

